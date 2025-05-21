<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Armazenamento;
use App\Models\ResiduosChe;
use App\Models\ResiduosSai;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;

class RelatorioController extends Controller
{

    public function index()
    {
        return view('relatorios.index');
    }
    
    // O Relatório Completo continua como antes, baseado na data atual.
    // Se precisar que ele use uma data selecionada, você precisará adicionar um seletor de data
    // e passar o valor para este método via Request.
    public function gerarRelatorioCompleto(Request $request) // Adicionado Request para consistência, mas não usado ainda
    {
        // Se você quiser que o relatório completo use uma data específica:
        // $dataSelecionada = $request->input('data');
        // $referencia = $dataSelecionada ? Carbon::parse($dataSelecionada) : Carbon::today();
        
        $referencia = Carbon::today(); // Mantendo a lógica original por enquanto

        // Dados Diários
        $entradasDiarias = ResiduosChe::whereDate('data_hora', $referencia)->get();
        $armazenamentosDiarios = Armazenamento::whereDate('data_hora', $referencia)->get();
        $saidasDiarias = ResiduosSai::whereDate('data_hora', $referencia)->get();

        // Dados Semanais
        $semanaInicio = $referencia->copy()->startOfWeek();
        $semanaFim = $referencia->copy()->endOfWeek();
        $entradasSemanais = ResiduosChe::whereBetween('data_hora', [$semanaInicio, $semanaFim])->get();
        $armazenamentosSemanais = Armazenamento::whereBetween('data_hora', [$semanaInicio, $semanaFim])->get();
        $saidasSemanais = ResiduosSai::whereBetween('data_hora', [$semanaInicio, $semanaFim])->get();

        // Dados Mensais
        $mesInicio = $referencia->copy()->startOfMonth();
        $mesFim = $referencia->copy()->endOfMonth();
        $entradasMensais = ResiduosChe::whereBetween('data_hora', [$mesInicio, $mesFim])->get();
        $armazenamentosMensais = Armazenamento::whereBetween('data_hora', [$mesInicio, $mesFim])->get();
        $saidasMensais = ResiduosSai::whereBetween('data_hora', [$mesInicio, $mesFim])->get();

        $pdf = PDF::loadView('relatorios.completo', compact(
            'entradasDiarias', 'armazenamentosDiarios', 'saidasDiarias',
            'entradasSemanais', 'armazenamentosSemanais', 'saidasSemanais',
            'entradasMensais', 'armazenamentosMensais', 'saidasMensais',
            'referencia' // Opcional: passar a data de referência para o PDF
        ));

        return $pdf->download('relatorio-completo-' . $referencia->format('Y-m-d') . '.pdf');
    }

    public function gerarRelatorioDiario(Request $request)
    {
        $dataSelecionada = $request->input('data');
        // Validação básica da data (pode ser mais robusta)
        try {
            $dia = $dataSelecionada ? Carbon::parse($dataSelecionada) : Carbon::today();
        } catch (\Exception $e) {
            // Se a data for inválida, usa o dia de hoje como fallback
            $dia = Carbon::today();
            // Opcional: adicionar uma mensagem de erro para o usuário
            // return redirect()->back()->withErrors(['data_diario' => 'Data inválida.']);
        }

        $entradas = ResiduosChe::whereDate('data_hora', $dia)->get();
        $armazenamentos = Armazenamento::whereDate('data_hora', $dia)->get();
        $saidas = ResiduosSai::whereDate('data_hora', $dia)->get();

        $pdf = PDF::loadView('relatorios.simples', [
            'titulo' => 'Diário - ' . $dia->format('d/m/Y'),
            'data_referencia' => $dia->format('d/m/Y'),
            'entradas' => $entradas,
            'armazenamentos' => $armazenamentos,
            'saidas' => $saidas,
        ]);

        return $pdf->download('relatorio-diario-' . $dia->format('Y-m-d') . '.pdf');
    }

    public function gerarRelatorioSemanal(Request $request)
    {
        $dataSelecionada = $request->input('data');
        try {
            $diaDeReferencia = $dataSelecionada ? Carbon::parse($dataSelecionada) : Carbon::today();
        } catch (\Exception $e) {
            $diaDeReferencia = Carbon::today();
        }
        
        $inicioSemana = $diaDeReferencia->copy()->startOfWeek(Carbon::MONDAY); // Considera segunda como início da semana
        $fimSemana = $diaDeReferencia->copy()->endOfWeek(Carbon::SUNDAY);   // Considera domingo como fim da semana

        $entradas = ResiduosChe::whereBetween('data_hora', [$inicioSemana, $fimSemana])->get();
        $armazenamentos = Armazenamento::whereBetween('data_hora', [$inicioSemana, $fimSemana])->get();
        $saidas = ResiduosSai::whereBetween('data_hora', [$inicioSemana, $fimSemana])->get();
        
        $titulo = sprintf(
            'Semanal (Semana de %s a %s)',
            $inicioSemana->format('d/m/Y'),
            $fimSemana->format('d/m/Y')
        );

        $pdf = PDF::loadView('relatorios.simples', [
            'titulo' => $titulo,
            'data_referencia' => $diaDeReferencia->format('d/m/Y') . " (Semana de " . $inicioSemana->format('d/m') . " a " . $fimSemana->format('d/m') . ")",
            'entradas' => $entradas,
            'armazenamentos' => $armazenamentos,
            'saidas' => $saidas,
        ]);

        return $pdf->download('relatorio-semanal-' . $inicioSemana->format('Y-m-d') . '_a_' . $fimSemana->format('Y-m-d') . '.pdf');
    }

    public function gerarRelatorioMensal(Request $request)
    {
        $mesSelecionado = $request->input('mes'); // Formato esperado: YYYY-MM
        
        try {
            // Se o mês foi selecionado, usa o primeiro dia daquele mês. Senão, usa o mês atual.
            $dataDeReferencia = $mesSelecionado ? Carbon::createFromFormat('Y-m', $mesSelecionado)->startOfMonth() : Carbon::today()->startOfMonth();
        } catch (\Exception $e) {
            $dataDeReferencia = Carbon::today()->startOfMonth();
        }

        $inicioMes = $dataDeReferencia->copy()->startOfMonth();
        $fimMes = $dataDeReferencia->copy()->endOfMonth();

        $entradas = ResiduosChe::whereBetween('data_hora', [$inicioMes, $fimMes])->get();
        $armazenamentos = Armazenamento::whereBetween('data_hora', [$inicioMes, $fimMes])->get();
        $saidas = ResiduosSai::whereBetween('data_hora', [$inicioMes, $fimMes])->get();
        
        $titulo = 'Mensal - ' . $inicioMes->format('m/Y');

        $pdf = PDF::loadView('relatorios.simples', [
            'titulo' => $titulo,
            'data_referencia' => $inicioMes->format('F Y'), // Ex: Maio 2024
            'entradas' => $entradas,
            'armazenamentos' => $armazenamentos,
            'saidas' => $saidas,
        ]);

        return $pdf->download('relatorio-mensal-' . $inicioMes->format('Y-m') . '.pdf');
    }
}