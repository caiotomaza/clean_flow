@extends('layouts.app')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/relatorios/style.css') }}">

<main>
    <h1 class="title">Relatórios</h1>

    <div class="controle-topo">
        <div class="entrada-saida">
            <button class="relatorio">+ Novo Relatório</button>
            <button class="rascunho">Rascunhos</button>
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
                <th>Movimentação</th>
                <th>Responsável</th>
                <th>Data</th>
                <th>Local</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="tabela-corpo">
            <!-- Conteúdo dinâmico inserido por JavaScript -->
        </tbody>
    </table>
</main>

<script src="{{ asset('js/relatorios/rows.js') }}"></script>
<script src="{{ asset('js/relatorios/script.js') }}"></script>
@endsection
