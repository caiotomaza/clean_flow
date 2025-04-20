@extends('layouts.app')

@section('head')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/relatorios/modal.css')}}">
<link rel="stylesheet" href="{{asset('css/relatorios/style.css')}}">

@endsection

@section('content')


<main>
    <h1 class="title">Relatórios</h1>
    <div class="controle-topo">
        <div class="entrada-saida">
            <button id="openModalBtn" class="btn-cadastrar">+ Novo Relatório Diário</button>
            <button class="btn-rascunho">Rascunhos</button>
        </div>
        <div class="pagination">
            <p>Páginas</p>
            <button onclick="changePage(-1)">&laquo;</button>
            <div id="page-numbers"></div>
            <button onclick="changePage(1)">&raquo;</button>
        </div>
    </div>
    
    <div>
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
                
    </div>
</main>
<!-- Modal -->
<div id="relatorioModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <form id="formRelatorio">
            <h2>Relatório Diário</h2>

            <label for="data">Data</label>
            <input type="date" id="data" name="data" required>

            <label for="unidade">Unidade</label>
            <select id="unidade" name="unidade" required>
                <option value="">Selecione</option>
                <option value="Unidade A">Unidade A</option>
                <option value="Unidade B">Unidade B</option>
            </select>

            <label for="responsavel">Responsável</label>
            <input type="text" id="responsavel" name="responsavel" placeholder="Nome do responsável" required>

            <h3>1. Resíduos Coletados</h3>
            <label>Recicláveis (Kg)</label>
            <input type="number" name="reciclaveis" step="0.1">
            
            <label>Orgânicos (Kg)</label>
            <input type="number" name="organicos" step="0.1">
            
            <label>Rejeitos (Kg)</label>
            <input type="number" name="rejeitos" step="0.1">
            
            <label>Total (Kg)</label>
            <input type="number" name="total" readonly class="total">

            <h3>2. Indicadores de Não Conformidade</h3>
            <label>Não conformidades identificadas</label>
            <input type="text" name="nao_conformidades" placeholder="Ex: descarte irregular">
            
            <label>Reclamações</label>
            <input type="text" name="reclamacoes" placeholder="xxxxxxxxxxxxxxx">

            <h3>3. Dados Ambientais</h3>
            <label>Redução de consumo</label>
            <input type="text" name="reducao_consumo" placeholder="xxxxxxxxxxxxxxx">
            
            <label>Resíduos para o aterro</label>
            <input type="text" name="residuos_aterro" placeholder="xxxxxxxxxxxxxxx">

            <h3>4. Incidentes e Ocorrências</h3>
            <label>Acidente de Trabalho</label>
            <input type="text" name="acidentes" placeholder="xxxxxxxxxxxxxxx">
            
            <label>Problemas Operacionais</label>
            <input type="text" name="problemas_operacionais" placeholder="xxxxxxxxxxxxxxx">

            <label>Observações</label>
            <textarea rows="4" name="observacoes" placeholder="xxxxxxxxxxxxxxx"></textarea>

            <label>Anexar Documentos</label>
            <input type="file" name="anexos" multiple>

            <div class="button-row">
                <button type="button" class="btn-limpar">Limpar</button>
                <button type="button" class="btn-salvar">Salvar Rascunho</button>
                <button type="submit" class="btn-enviar">Enviar</button>
            </div>
        </form>
    </div>
</div>
<script src="{{asset('js/relatorios/modal.js')}}"></script>
<script src="{{asset('js/relatorios/script.js')}}"></script>
<script src="{{asset('js/relatorios/row.js')}}"></script>
@endsection