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
    <h1 class="title">Histórico</h1>

    <div class="controle-topo">
        <div class="entrada-saida">
            <button class="entrada" id="btnAbrirModalEntradaCarga">Entrada de Carga</button>
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
            </tbody>
    </table>
</main>

{{-- ========= INÍCIO DO MODAL DE ENTRADA DE CARGA ========= --}}
<div id="modalEntradaCarga" class="modal">

    {{-- Conteúdo do Modal --}}
    <div class="modal-content">
        {{-- Botão de Fechar --}}
        <span class="close-btn" id="btnCloseModalEntradaCarga">&times;</span>
        <div class="card">
            <form action="#" method="POST"> 
                @csrf
                <h2>Entrada de Carga</h2> 
                <div class="box">
                    <div class="form-group">
                        <label for="placa_veiculo">Placa de Veiculo</label>
                        <input type="text" id="placa_veiculo" name="placa_veiculo" placeholder="ABC-1234" required>
                    </div>
                    <div class="form-group">
                        <label for="peso_inicial">Peso Inicial (Tara)</label>
                        <input type="text" id="peso_inicial" name="peso_inicial" placeholder="1500kg" required>
                    </div>
                    <div class="form-group">
                        <label for="material">Material</label>
                        <input type="text" id="material" name="material" placeholder="Papelão" required>
                    </div>
                    <div class="form-group">
                        <label for="subtitulo_material">Subtítulo do Material</label>
                        <input type="text" id="subtitulo_material" name="subtitulo_material" placeholder="Reciclado">
                    </div>
                    <div class="form-group">
                        <label for="peso_final">Peso Final (Bruto)</label> {{-- Assumi que este é o peso final --}}
                        <input type="text" id="peso_final" name="peso_final" placeholder="3500kg" required>
                    </div>
                     {{-- Se precisar calcular o peso líquido, pode fazer no backend ou com JS --}}
                    <div class="form-group">
                        <label for="responsavel">Responsável</label>
                        <input type="text" id="responsavel" name="responsavel" placeholder="Nome do Responsável" required>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" id="descricao" name="descricao" placeholder="Detalhes adicionais">
                    </div>
                    <div class="form-group">
                        <label for="tipo">Tipo</label>
                        <input type="text" id="tipo" name="tipo" placeholder="Tipo A">
                    </div>
                    <div class="form-group">
                        <label for="id_container">ID do Contêiner</label>
                        <input type="text" id="id_container" name="id_container" placeholder="CT-001">
                    </div>
                    <div class="form-group">
                        <label for="data_armazenamento">Data de Entrada</label> {{-- Ajustei o label --}}
                        <input type="date" id="data_armazenamento" name="data_armazenamento" required>
                    </div>
                </div>
                <div class="buttons">
                    <button type="reset" class="btn-danger">Limpar</button>
                    <button type="submit" class="btn-sucess">Concluir Entrada</button>
                </div>
            </form>
        </div>
    </div>

</div>
{{-- ========= FIM DO MODAL DE ENTRADA DE CARGA ========= --}}

{{-- scripts --}}
<script src="{{ asset('js/historico/script.js') }}"></script>
<script src="{{ asset('js/historico/status_randomizer.js') }}"></script>
<script src="{{ asset('js/historico/entradaCarga.js') }}"></script>
@endsection