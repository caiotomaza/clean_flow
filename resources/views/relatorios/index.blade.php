@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6">Relatórios</h1>

    <div class="mb-8 p-6 border border-gray-200 rounded-lg bg-white shadow-sm">
        <h2 class="text-xl font-semibold mb-2">Relatório Completo</h2>
        <p class="text-gray-700 mb-4">Este relatório gera dados baseados na data atual (hoje, semana atual, mês atual).</p>
        <a href="{{ route('relatorio.completo') }}"
           class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
           Gerar Relatório Completo (Baseado em Hoje)
        </a>
    </div>

    <hr class="my-8">

    <div class="mb-8 p-6 border border-gray-200 rounded-lg bg-white shadow-sm">
        <h2 class="text-xl font-semibold mb-4">Relatório Diário</h2>
        <form action="{{ route('relatorio.diario') }}" method="GET" class="space-y-4">
            <div>
                <label for="data_diario" class="block font-medium text-gray-800">Escolha o dia:</label>
                <input type="date" id="data_diario" name="data"
                    value="{{ old('data', \Carbon\Carbon::today()->format('Y-m-d')) }}"
                    required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <button type="submit"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                Gerar Relatório Diário
            </button>
        </form>
    </div>

    <div class="mb-8 p-6 border border-gray-200 rounded-lg bg-white shadow-sm">
        <h2 class="text-xl font-semibold mb-4">Relatório Semanal</h2>
        <form action="{{ route('relatorio.semanal') }}" method="GET" class="space-y-4">
            <div>
                <label for="data_semanal" class="block font-medium text-gray-800">Escolha uma data na semana desejada:</label>
                <input type="date" id="data_semanal" name="data"
                    value="{{ old('data', \Carbon\Carbon::today()->format('Y-m-d')) }}"
                    required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <button type="submit"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                Gerar Relatório Semanal
            </button>
        </form>
    </div>

    <div class="mb-8 p-6 border border-gray-200 rounded-lg bg-white shadow-sm">
        <h2 class="text-xl font-semibold mb-4">Relatório Mensal</h2>
        <form action="{{ route('relatorio.mensal') }}" method="GET" class="space-y-4">
            <div>
                <label for="mes_mensal" class="block font-medium text-gray-800">Escolha o mês:</label>
                <input type="month" id="mes_mensal" name="mes"
                    value="{{ old('mes', \Carbon\Carbon::today()->format('Y-m')) }}"
                    required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <button type="submit"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                Gerar Relatório Mensal
            </button>
        </form>
    </div>
</div>

@endsection
