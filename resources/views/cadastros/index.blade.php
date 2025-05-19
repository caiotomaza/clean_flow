@extends('layouts.app')

@section('head')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/relatorios/style2.css')}}">
    <link rel="stylesheet" href="{{asset('css/relatorios/modal.css')}}">
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
                    {{-- Linhas da tabela serão preenchidas via JS (script.js/row.js) --}}
                </tbody>
            </table>
        </div>
    </main>

    {{-- O Modal --}}
    <div id="relatorioModal" class="modal" role="dialog" aria-labelledby="modalTitle" aria-modal="true">
        <div class="modal-content">
            <span class="close" title="Fechar" aria-label="Fechar">&times;</span>
            <form id="formRelatorio">
                <h2 id="modalTitle">Relatório Diário</h2>

                {{-- Campos Gerais --}}
                <label for="data">Data</label>
                <input type="date" id="data" name="data" required>

                <label for="unidade">Unidade</label>
                <select id="unidade" name="unidade" required>
                    <option value="">Selecione</option>
                    <option value="Unidade A">Unidade A</option>
                    <option value="Unidade B">Unidade B</option>
                    {{-- Adicione mais unidades conforme necessário --}}
                </select>

                <label for="responsavel">Responsável</label>
                <input type="text" id="responsavel" name="responsavel" placeholder="Nome do responsável" required>

                {{-- Seção 1 --}}
                <h3>1. Resíduos Coletados</h3>
                <label for="reciclaveis">Recicláveis (Kg)</label>
                <input type="number" id="reciclaveis" name="reciclaveis" step="0.01" min="0" placeholder="0.00">

                <label for="organicos">Orgânicos (Kg)</label>
                <input type="number" id="organicos" name="organicos" step="0.01" min="0" placeholder="0.00">

                <label for="rejeitos">Rejeitos (Kg)</label>
                <input type="number" id="rejeitos" name="rejeitos" step="0.01" min="0" placeholder="0.00">

                <label for="total">Total (Kg)</label>
                <input type="number" id="total" name="total" readonly class="total" step="0.01">

                {{-- Seção 2 --}}
                <h3>2. Indicadores de Não Conformidade</h3>
                <label for="nao_conformidades">Não conformidades identificadas</label>
                <input type="text" id="nao_conformidades" name="nao_conformidades" placeholder="Ex: descarte irregular, contaminação">

                <label for="reclamacoes">Reclamações</label>
                <input type="text" id="reclamacoes" name="reclamacoes" placeholder="Descreva brevemente as reclamações">

                {{-- Seção 3 --}}
                <h3>3. Dados Ambientais</h3>
                <label for="reducao_consumo">Redução de consumo</label>
                <input type="text" id="reducao_consumo" name="reducao_consumo" placeholder="Ex: Ações para reduzir água/energia">

                <label for="residuos_aterro">Resíduos para o aterro (Kg)</label>
                {{-- Considerar se este campo deve ser calculado (Rejeitos?) ou preenchido manualmente --}}
                <input type="number" id="residuos_aterro" name="residuos_aterro" step="0.01" min="0" placeholder="0.00">

                {{-- Seção 4 --}}
                <h3>4. Incidentes e Ocorrências</h3>
                <label for="acidentes">Acidente de Trabalho</label>
                <input type="text" id="acidentes" name="acidentes" placeholder="Descreva acidentes ou quase acidentes">

                <label for="problemas_operacionais">Problemas Operacionais</label>
                <input type="text" id="problemas_operacionais" name="problemas_operacionais" placeholder="Ex: veículo quebrado, falta de EPI">

                <label for="observacoes">Observações Gerais</label>
                <textarea id="observacoes" rows="4" name="observacoes" placeholder="Detalhes adicionais, sugestões, etc."></textarea>

                <label for="anexos">Anexar Documentos/Fotos</label>
                <input type="file" id="anexos" name="anexos[]" multiple> {{-- Adicionado [] para múltiplos arquivos --}}

                {{-- Botões de Ação --}}
                <div class="button-row">
                    <button type="button" class="btn-limpar">Limpar</button>
                    <button type="button" class="btn-salvar">Salvar Rascunho</button>
                    <button type="submit" class="btn-enviar">Enviar</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        // Get the modal
        var modal = document.getElementById("relatorioModal");

        // Get the button that opens the modal
        var btn = document.getElementById("openModalBtn");

        // Get the <span> element that closes the modal
        var span = document.querySelector(".close");

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Script para calcular o total (opcional, dependendo se você quer isso no frontend)
        const reciclaveisInput = document.getElementById('reciclaveis');
        const organicosInput = document.getElementById('organicos');
        const rejeitosInput = document.getElementById('rejeitos');
        const totalInput = document.getElementById('total');

        function calcularTotal() {
            const reciclaveis = parseFloat(reciclaveisInput.value) || 0;
            const organicos = parseFloat(organicosInput.value) || 0;
            const rejeitos = parseFloat(rejeitosInput.value) || 0;
            totalInput.value = (reciclaveis + organicos + rejeitos).toFixed(2);
        }

        reciclaveisInput.addEventListener('input', calcularTotal);
        organicosInput.addEventListener('input', calcularTotal);
        rejeitosInput.addEventListener('input', calcularTotal);

        // Adicione aqui qualquer outro script que você tenha em 'script.js' e 'row.js'
    </script>
    <script src="{{asset('js/relatorios/row.js')}}"></script>
@endsection