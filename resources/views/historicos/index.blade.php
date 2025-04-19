@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/historicos/style.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

<main>
    <h1 class="title">Histórico</h1>

    <div class="controle-topo">
        <div class="entrada-saida">
            <button class="entrada">Entrada de Carga</button>
            <button class="entrada-material" style="border-width: 1px;">Entrada de Material</button>
            <button class="saida">Saída de Material</button>
        </div>

        <div class="pagination">
            <p>Páginas</p>
            <button onclick="changePage(-1)">&laquo;</button>
            <div id="page-numbers"></div>
            <button onclick="changePage(1)">&raquo;</button>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nº de Registro</th>
                <th>Usuário</th>
                <th>Material</th>
                <th>Detalhes</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody id="tabela-corpo">
            <!-- Conteúdo preenchido via JavaScript -->
        </tbody>
    </table>
</main>

<script src="{{ asset('js/historico/script.js') }}"></script>
<script src="{{ asset('js/historico/status_randomizer.js') }}"></script>
@endsection
