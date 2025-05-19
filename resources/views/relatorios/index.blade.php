@extends('layouts.app')

@section('content')

<h1>Relatórios</h1>

<div class="botoes-relatorios">
    <h2>Relatório Completo</h2>
    {{-- O relatório completo atual busca dados do dia, semana e mês correntes. 
         Se desejar torná-lo dinâmico com base em uma data, você precisará de uma lógica similar 
         às outras seções ou definir um comportamento específico. 
         Por enquanto, manteremos o comportamento original ou você pode adicionar um seletor de data aqui também. --}}
    <p>Este relatório gera dados baseados na data atual (hoje, semana atual, mês atual).</p>
    <a href="{{ route('relatorio.completo') }}" class="botao-pdf">Gerar Relatório Completo (Baseado em Hoje)</a>
</div>

<hr>

<div class="botoes-relatorios">
    <h2>Relatório Diário</h2>
    <form action="{{ route('relatorio.diario') }}" method="GET" class="form-relatorio">
        <label for="data_diario">Escolha o dia:</label>
        <input type="date" id="data_diario" name="data" value="{{ old('data', \Carbon\Carbon::today()->format('Y-m-d')) }}" required>
        <button type="submit" class="botao-pdf">Gerar Relatório Diário</button>
    </form>
</div>

<div class="botoes-relatorios">
    <h2>Relatório Semanal</h2>
    <form action="{{ route('relatorio.semanal') }}" method="GET" class="form-relatorio">
        <label for="data_semanal">Escolha uma data na semana desejada:</label>
        <input type="date" id="data_semanal" name="data" value="{{ old('data', \Carbon\Carbon::today()->format('Y-m-d')) }}" required>
        <button type="submit" class="botao-pdf">Gerar Relatório Semanal</button>
    </form>
</div>

<div class="botoes-relatorios">
    <h2>Relatório Mensal</h2>
    <form action="{{ route('relatorio.mensal') }}" method="GET" class="form-relatorio">
        <label for="mes_mensal">Escolha o mês:</label>
        <input type="month" id="mes_mensal" name="mes" value="{{ old('mes', \Carbon\Carbon::today()->format('Y-m')) }}" required>
        <button type="submit" class="botao-pdf">Gerar Relatório Mensal</button>
    </form>
</div>

<style>
    .form-relatorio {
        margin-top: 10px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: flex-start;
    }
    .form-relatorio label {
        font-weight: bold;
    }
    .form-relatorio input[type="date"],
    .form-relatorio input[type="month"] {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .botao-pdf {
        /* Seus estilos existentes */
        padding: 10px 15px;
        /* ... outros estilos ... */
    }
    .botoes-relatorios {
        margin-bottom: 20px;
        padding: 15px;
        border: 1px solid #eee;
        border-radius: 5px;
    }
    hr {
        margin-top: 30px;
        margin-bottom: 30px;
    }
</style>

@endsection