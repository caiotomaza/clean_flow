@extends('layouts.app')

@section('head')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/relatorios/style2.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/relatorios/modal.css')}}"> --}}
    <script src="https://cdn.tailwindcss.com"></script> {{-- Para demonstração --}}
    <style>
        body {
            font-family: 'Inter', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        /* Para o modal, se o JS apenas altera display, as transições CSS não funcionarão.
           Uma abordagem com classes (ex: opacity-0 -> opacity-100) seria melhor para animações.
           No entanto, estarei configurando o modal com 'hidden' e o JS fornecido o tornará visível. */
        #relatorioModal.hidden {
            display: none;
        }
    </style>
@endsection

@section('content')
<main class="bg-slate-100 min-h-screen p-4 sm:p-6 lg:p-8">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-slate-800 mb-8">Relatórios</h1>

        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4 p-4">
            <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3 w-full md:w-auto">
                <button id="openModalBtn" class="flex items-center justify-center space-x-2 w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-5 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    <span>Novo Relatório Diário</span>
                </button>
                <button class="w-full sm:w-auto bg-slate-500 hover:bg-slate-600 text-white font-semibold py-2.5 px-5 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-opacity-50">
                    Rascunhos
                </button>
            </div>
            <div class="flex items-center space-x-2 text-sm text-slate-600 w-full md:w-auto justify-center md:justify-end mt-4 md:mt-0">
                {{-- @if ($usuarios->hasPages())
                    <div class="mt-8">
                        <div class="flex justify-center">
                            {{ $usuarios->links('pagination::tailwind') }} 
                        </div>
                    </div>
                @endif --}}
            </div>
        </div>

        <div class="bg-white shadow-xl rounded-lg overflow-x-auto">
            <table class="w-full text-left min-w-full">
                <thead class="bg-slate-200 text-slate-600 uppercase text-xs sm:text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-4 sm:px-6">Movimentação</th>
                        <th class="py-3 px-4 sm:px-6">Responsável</th>
                        <th class="py-3 px-4 sm:px-6">Data</th>
                        <th class="py-3 px-4 sm:px-6">Local</th>
                        <th class="py-3 px-4 sm:px-6 text-center">Ações</th>
                    </tr>
                </thead>
                <tbody id="tabela-corpo" class="text-slate-700 text-sm font-light">
                    {{-- Linhas da tabela serão preenchidas via JS (script.js/row.js)
                         Exemplo de linha que o JS poderia gerar:
                    <tr class="border-b border-slate-200 hover:bg-slate-50 transition duration-150 ease-in-out">
                        <td class="py-3 px-6">Entrada Material XPTO</td>
                        <td class="py-3 px-6">João Silva</td>
                        <td class="py-3 px-6">25/05/2024</td>
                        <td class="py-3 px-6">Unidade A</td>
                        <td class="py-3 px-6 text-center">
                            <button class="text-blue-600 hover:text-blue-800 mr-2" title="Ver Detalhes">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z" /><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.022 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" /></svg>
                            </button>
                            <button class="text-yellow-600 hover:text-yellow-800 mr-2" title="Editar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" /><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" /></svg>
                            </button>
                            <button class="text-red-600 hover:text-red-800" title="Excluir">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                            </button>
                        </td>
                    </tr>
                    --}}
                     <tr>
                        <td colspan="5" class="text-center py-10 text-slate-500">
                            Nenhum relatório encontrado ou carregando dados...
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- O Modal --}}
    <div id="relatorioModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4 hidden" role="dialog" aria-labelledby="modalTitle" aria-modal="true">
        <div class="bg-white p-6 sm:p-8 rounded-xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h2 id="modalTitle" class="text-2xl font-semibold text-slate-800">Relatório Diário</h2>
                <button class="close text-slate-400 hover:text-slate-600" title="Fechar" aria-label="Fechar">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form id="formRelatorio" class="space-y-6">
                {{-- Campos Gerais --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                    <div>
                        <label for="data" class="block text-sm font-medium text-slate-700 mb-1">Data</label>
                        <input type="date" id="data" name="data" required class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    </div>
                    <div>
                        <label for="unidade" class="block text-sm font-medium text-slate-700 mb-1">Unidade</label>
                        <select id="unidade" name="unidade" required class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white">
                            <option value="">Selecione</option>
                            <option value="Unidade A">Unidade A</option>
                            <option value="Unidade B">Unidade B</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label for="responsavel" class="block text-sm font-medium text-slate-700 mb-1">Responsável</label>
                        <input type="text" id="responsavel" name="responsavel" placeholder="Nome do responsável" required class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    </div>
                </div>

                {{-- Seção 1 --}}
                <fieldset class="border border-slate-300 p-4 rounded-md">
                    <legend class="text-lg font-semibold text-slate-700 px-2">1. Resíduos Coletados</legend>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-4 mt-2">
                        <div>
                            <label for="reciclaveis" class="block text-sm font-medium text-slate-700 mb-1">Recicláveis (Kg)</label>
                            <input type="number" id="reciclaveis" name="reciclaveis" step="0.01" min="0" placeholder="0.00" class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                        <div>
                            <label for="organicos" class="block text-sm font-medium text-slate-700 mb-1">Orgânicos (Kg)</label>
                            <input type="number" id="organicos" name="organicos" step="0.01" min="0" placeholder="0.00" class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                        <div>
                            <label for="rejeitos" class="block text-sm font-medium text-slate-700 mb-1">Rejeitos (Kg)</label>
                            <input type="number" id="rejeitos" name="rejeitos" step="0.01" min="0" placeholder="0.00" class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                        <div>
                            <label for="total" class="block text-sm font-medium text-slate-700 mb-1">Total (Kg)</label>
                            <input type="number" id="total" name="total" readonly class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm bg-slate-100 cursor-not-allowed" step="0.01">
                        </div>
                    </div>
                </fieldset>

                {{-- Seção 2 --}}
                <fieldset class="border border-slate-300 p-4 rounded-md">
                    <legend class="text-lg font-semibold text-slate-700 px-2">2. Indicadores de Não Conformidade</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 mt-2">
                        <div>
                            <label for="nao_conformidades" class="block text-sm font-medium text-slate-700 mb-1">Não conformidades identificadas</label>
                            <input type="text" id="nao_conformidades" name="nao_conformidades" placeholder="Ex: descarte irregular" class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                        <div>
                            <label for="reclamacoes" class="block text-sm font-medium text-slate-700 mb-1">Reclamações</label>
                            <input type="text" id="reclamacoes" name="reclamacoes" placeholder="Descreva brevemente" class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                    </div>
                </fieldset>

                {{-- Seção 3 --}}
                <fieldset class="border border-slate-300 p-4 rounded-md">
                    <legend class="text-lg font-semibold text-slate-700 px-2">3. Dados Ambientais</legend>
                     <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 mt-2">
                        <div>
                            <label for="reducao_consumo" class="block text-sm font-medium text-slate-700 mb-1">Redução de consumo</label>
                            <input type="text" id="reducao_consumo" name="reducao_consumo" placeholder="Ex: Ações para reduzir água/energia" class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                        <div>
                            <label for="residuos_aterro" class="block text-sm font-medium text-slate-700 mb-1">Resíduos para o aterro (Kg)</label>
                            <input type="number" id="residuos_aterro" name="residuos_aterro" step="0.01" min="0" placeholder="0.00" class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                    </div>
                </fieldset>

                {{-- Seção 4 --}}
                <fieldset class="border border-slate-300 p-4 rounded-md">
                    <legend class="text-lg font-semibold text-slate-700 px-2">4. Incidentes e Ocorrências</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 mt-2">
                        <div>
                            <label for="acidentes" class="block text-sm font-medium text-slate-700 mb-1">Acidente de Trabalho</label>
                            <input type="text" id="acidentes" name="acidentes" placeholder="Descreva acidentes ou quase acidentes" class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                        <div>
                            <label for="problemas_operacionais" class="block text-sm font-medium text-slate-700 mb-1">Problemas Operacionais</label>
                            <input type="text" id="problemas_operacionais" name="problemas_operacionais" placeholder="Ex: veículo quebrado" class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                    </div>
                </fieldset>

                <div>
                    <label for="observacoes" class="block text-sm font-medium text-slate-700 mb-1">Observações Gerais</label>
                    <textarea id="observacoes" rows="4" name="observacoes" placeholder="Detalhes adicionais, sugestões, etc." class="w-full min-h-[100px] px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"></textarea>
                </div>

                <div>
                    <label for="anexos" class="block text-sm font-medium text-slate-700 mb-1">Anexar Documentos/Fotos</label>
                    <input type="file" id="anexos" name="anexos[]" multiple class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200 cursor-pointer">
                </div>

                <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-3 mt-8 pt-6 border-t border-slate-200">
                    <button type="button" class="btn-limpar py-2 px-5 bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300 transition duration-150">Limpar</button>
                    <button type="button" class="btn-salvar py-2 px-5 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition duration-150 shadow-sm">Salvar Rascunho</button>
                    <button type="submit" class="btn-enviar py-2 px-5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-150 shadow-sm">Enviar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Script do modal existente (mantido para funcionalidade básica)
        var modal = document.getElementById("relatorioModal");
        var btn = document.getElementById("openModalBtn");
        var span = document.querySelector("#relatorioModal .close"); // Escopo mais específico para o span

        if (btn) {
            btn.onclick = function() {
                modal.classList.remove('hidden'); // Usando classes Tailwind
                // modal.style.display = "block"; // Alternativa
            }
        }
        if (span) {
            span.onclick = function() {
                modal.classList.add('hidden'); // Usando classes Tailwind
                // modal.style.display = "none"; // Alternativa
            }
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.classList.add('hidden'); // Usando classes Tailwind
                // modal.style.display = "none"; // Alternativa
            }
        }

        // Script para calcular o total
        const reciclaveisInput = document.getElementById('reciclaveis');
        const organicosInput = document.getElementById('organicos');
        const rejeitosInput = document.getElementById('rejeitos');
        const totalInput = document.getElementById('total');

        function calcularTotal() {
            const reciclaveis = parseFloat(reciclaveisInput.value) || 0;
            const organicos = parseFloat(organicosInput.value) || 0;
            const rejeitos = parseFloat(rejeitosInput.value) || 0;
            if(totalInput) { // verificar se o elemento existe
                totalInput.value = (reciclaveis + organicos + rejeitos).toFixed(2);
            }
        }

        if(reciclaveisInput && organicosInput && rejeitosInput) { // verificar se os elementos existem
            reciclaveisInput.addEventListener('input', calcularTotal);
            organicosInput.addEventListener('input', calcularTotal);
            rejeitosInput.addEventListener('input', calcularTotal);
        }

        // Script para paginação (exemplo, você precisará da sua lógica completa)
        let currentPage = 1;
        const totalPages = 5; // Exemplo, isso viria dos seus dados

        function renderPageNumbers() {
            const pageNumbersDiv = document.getElementById('page-numbers');
            if (!pageNumbersDiv) return;
            pageNumbersDiv.innerHTML = ''; // Limpa números antigos
            for (let i = 1; i <= totalPages; i++) {
                const pageButton = document.createElement('button');
                pageButton.textContent = i;
                pageButton.className = `px-3 py-1 border rounded-md transition ${i === currentPage ? 'bg-blue-500 text-white border-blue-500' : 'hover:bg-slate-100 border-slate-300'}`;
                pageButton.onclick = () => {
                    currentPage = i;
                    // Aqui você chamaria a função para carregar os dados da página 'i'
                    console.log("Carregar dados da página: " + i);
                    renderPageNumbers(); // Re-renderiza os botões para atualizar o estilo do ativo
                };
                pageNumbersDiv.appendChild(pageButton);
            }
            // Habilitar/desabilitar botões de navegação
            document.querySelector('button[onclick="changePage(-1)"]').disabled = currentPage === 1;
            document.querySelector('button[onclick="changePage(1)"]').disabled = currentPage === totalPages;
        }

        function changePage(offset) {
            const newPage = currentPage + offset;
            if (newPage >= 1 && newPage <= totalPages) {
                currentPage = newPage;
                // Aqui você chamaria a função para carregar os dados da nova página
                console.log("Carregar dados da página: " + currentPage);
                renderPageNumbers();
            }
        }
        // Chamada inicial para renderizar os números da página
        // Se o JS externo já faz isso, essa chamada pode ser removida daqui.
        if (document.getElementById('page-numbers')) { // Apenas se o container existir
             renderPageNumbers();
        }

        // Adicione aqui qualquer outro script que você tenha em 'row.js' ou outros arquivos
        // Lembre-se que o row.js precisará gerar HTML com as classes Tailwind para as linhas da tabela.
    </script>
    {{-- Mantenha seu script row.js se ele for responsável por popular a tabela --}}
    <script src="{{asset('js/relatorios/row.js')}}"></script>
</main>
@endsection