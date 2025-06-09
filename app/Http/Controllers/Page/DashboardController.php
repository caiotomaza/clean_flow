<?php

    namespace App\Http\Controllers\Page;

    use App\Http\Controllers\Controller;
use App\Models\ResiduosChe;
use Illuminate\Http\Request;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Facades\DB;

    class DashboardController extends Controller
    {
        public function index()
        {
            $agora = Carbon::now();
            $h8 = $agora->copy()->subHours(8);
            $h12 = $agora->copy()->subHours(12);
            $h24 = $agora->copy()->subHours(24);

            // ENTRADAS
            $entradas = DB::table('residuos_ches')
                ->where('tipo_registro', 'entrada')
                ->where('data_hora', '>=', $h24)
                ->get();

            $dadosche = [
                '8' => $entradas->where('data_hora', '>=', $h8)->count(),
                '12' => $entradas->where('data_hora', '>=', $h12)->count(),
                '24' => $entradas->count(),
                'total' => $entradas->count()
            ];

            $pesosEntrada = [
                '8' => $entradas->where('data_hora', '>=', $agora->copy()->subHours(8))->sum('peso'),
                '12' => $entradas->where('data_hora', '>=', $agora->copy()->subHours(12))->sum('peso'),
                '24' => $entradas->sum('peso'),
                'total' => $entradas->sum('peso')
            ];

            // SAÍDAS
            $saidas = DB::table('residuos_sais')
                ->where('tipo_registro', 'saida')
                ->where('data_hora', '>=', $h24)
                ->get();

            $dadosSai = [
                '8' => $saidas->where('data_hora', '>=', $h8)->count(),
                '12' => $saidas->where('data_hora', '>=', $h12)->count(),
                '24' => $saidas->count(),
                'total' => $saidas->count()
            ];

            // ARMAZENAMENTO
            $armazenamento = DB::table('armazenamentos')
                ->where('tipo_registro', 'armazenamento')
                ->where('data_hora', '>=', $h24)
                ->get();

            $dadosArm = [
                '8' => $armazenamento->where('data_hora', '>=', $h8)->count(),
                '12' => $armazenamento->where('data_hora', '>=', $h12)->count(),
                '24' => $armazenamento->count(),
                'total' => $armazenamento->count()
            ];

            // Veiculos

            $veiculosAtivos = DB::table('veiculos')->count();

            $dadosGrafico = ResiduosChe::select('residuos.nome as categoria', DB::raw('COUNT(*) as total'))
            ->join('residuos', 'residuos.id_resd', '=', 'residuos_ches.id_resd')
            ->groupBy('residuos.nome')
            ->orderByDesc('total')
            ->get();

            return view("dashboard.index", compact('dadosche', 'dadosSai', 'dadosArm', 'pesosEntrada', 'veiculosAtivos', 'dadosGrafico'));
        }

        public function page()
        {
            return view("dashboard.index");
        }
    }
?>