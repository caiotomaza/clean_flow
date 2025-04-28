@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/historicos/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/historicos/modal_carga.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
@endsection

@section('content')

<main>
    <h1 class="title">Registros</h1>

    <div class="controle-topo">
        <div class="entrada-saida">
            <button class="entrada" id="btnAbrirModalEntradaCarga">Registrar entrada</button>
            <button class="entrada-material" style="border-width: 1px;">Registrar armazenamento</button>
            <button class="saida">Registrar saída</button>
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
                <th>Nº de registro</th>
                <th>Responsável</th>
                <th>Tipo de resíduos</th>
                <th>Subtipo de resíduos</th>
                <th>Detalhes</th>
                <th>Tipo de registro</th>
            </tr>
        </thead>
        <tbody id="tabela-corpo">
            </tbody>
    </table>
</main>

<!--Popup de registro de entrada de resíduos-->
<div id="modalEntradaCarga" class="modal">
    <div class="modal-content">
        <span class="close-btn" id="btnCloseModalEntradaCarga">&times;</span>
        <div class="card">
            <form action="#" method="POST"> 
                @csrf
                <h2>Entrada de resíduos</h2> 
                <div class="box">
                    <div class="form-group">
                        <label for="placa_veiculo">Placa do veículo</label>
                        <input type="text" id="placa_veiculo" name="placa_veiculo" placeholder="ABC-1234" required>
                    </div>
                    <div class="form-group">
                        <label for="peso_inicial">Peso (kg)</label>
                        <input type="text" id="peso_inicial" name="peso_inicial" placeholder="1500kg" required>
                    </div>
                    <div class="form-group">
                        <label for="material">Tipo de resíduos</label>
                        <input type="text" id="material" name="material" placeholder="Plástico" required>
                    </div>
                    <div class="form-group">
                        <label for="subtitulo_material">Subtipo de resíduos</label>
                        <input type="text" id="subtitulo_material" name="subtitulo_material" placeholder="Pet">
                    </div>
                    <div class="form-group">
                        <label for="responsavel">Responsável</label>
                        <input type="text" id="responsavel" name="responsavel" placeholder="Nome completo" required>
                    </div>
                    <div class="form-group">
                        <label for="id_container">ID do armazenamento</label>
                        <input type="text" id="id_container" name="id_container" placeholder="ERP0001">
                    </div>
                    <div class="form-group">
                        <label for="data_armazenamento">Data e hora da entrada</label> {{-- Ajustei o label --}}
                        <input type="datetime" id="data_armazenamento" name="data_armazenamento" required>
                    </div>
                </div>
                <div class="buttons">
                    <button type="reset" class="btn-danger">Limpar</button>
                    <button type="submit" class="btn-sucess">Concluir</button>
                </div>
            </form>
        </div>
    </div>

</div>

<script src="{{ asset('js/historico/script.js') }}"></script>
<script src="{{ asset('js/historico/status_randomizer.js') }}"></script>
<script src="{{ asset('js/historico/entradaCarga.js') }}"></script>
@endsection