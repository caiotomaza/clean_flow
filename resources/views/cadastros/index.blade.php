@extends('layouts.app')

@section('head')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
@endsection

@section('content')
<style>
.popup-container {
  display: none;
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background-color: rgba(0,0,0,0.5);
  justify-content: center;
  align-items: center;
  z-index: 1000;
}

.popup {
  background: white;
  padding: 20px;
  border-radius: 10px;
  width: 90%;
  max-width: 600px;
}

</style>
    <main class="max-w-7xl mx-auto px-4 py-8 space-y-10">
        <h1 class="text-4xl font-bold text-gray-800 mb-6">Cadastros</h1>

        {{-- Botões para cadastrar itens --}}
        <div class="flex flex-col sm:flex-row justify-left gap-4 mb-6">
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded" onclick="AbrirPopupVeiculo()">Cadastrar Veículo</button>
            <button class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded" onclick="AbrirPopupFilial()">Cadastrar Filial</button>
            <button class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded" onclick="AbrirPopupEmpresa()">Cadastrar Empresa</button>
        </div>

        {{-- Filtros das tabelas --}}
        <div class="flex justify-left gap-4 mb-6">
            <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded" onclick="MostrarTabela('veiculo')">Veículos</button>
            <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded" onclick="MostrarTabela('filial')">Filiais</button>
            <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded" onclick="MostrarTabela('empresa')">Empresas</button>
        </div>

        {{-- Tabela de veículos --}}
        <div id="tabela-veiculo" class="overflow-x-auto mb-10">
            <h2 class="text-2xl font-semibold text-gray-700 mt-8 mb-4">Veículos</h2>
            <table class="min-w-full border border-gray-200 rounded shadow">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="border px-4 py-2">Nº de registro</th>
                        <th class="border px-4 py-2">Empresa</th>
                        <th class="border px-4 py-2">Filial</th>
                        <th class="border px-4 py-2">Placa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($veiculos as $veiculo)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $veiculo->id_vec }}</td>
                            <td class="border px-4 py-2">
                                @if($veiculo->id_fil)
                                    {{ $veiculo->filial->empresa?->nome_fans }}
                                @else
                                    <span class="text-red-600">N/A</span>
                                @endif
                            </td>
                            <td class="border px-4 py-2">
                                @if($veiculo->filial)
                                    {{ $veiculo->filial->nome }}
                                @else
                                    <span class="text-red-600">N/A</span>
                                @endif
                            </td>
                            <td class="border px-4 py-2">{{ $veiculo->placa }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Tabela de filiais --}}
        <div id="tabela-filial" class="overflow-x-auto mb-10 hidden">
            <h2 class="text-2xl font-semibold text-gray-700 mt-8 mb-4">Filiais</h2>
            <table class="min-w-full border border-gray-200 rounded shadow">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left">Nº de registro</th>
                        <th class="px-4 py-2 text-left">Nome</th>
                        <th class="px-4 py-2 text-left">Logradouro</th>
                        <th class="px-4 py-2 text-left">Município</th>
                        <th class="px-4 py-2 text-left">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($filiais as $filial)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $filial->id_fil }}</td>
                            <td class="px-4 py-2">{{ $filial->nome }}</td>
                            <td class="px-4 py-2">{{ $filial->Endereco?->nome ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $filial->Municipio?->nome ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $filial->Estado?->uf ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Tabela de empresas --}}
        <div id="tabela-empresa" class="overflow-x-auto mb-10 hidden">
            <h2 class="text-2xl font-semibold text-gray-700 mt-8 mb-4">Empresas</h2>
            <table class="min-w-full border border-gray-200 rounded shadow">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="border px-4 py-2">Nº de registro</th>
                        <th class="border px-4 py-2">Tipo de empresa</th>
                        <th class="border px-4 py-2">Nome fantasia</th>
                        <th class="border px-4 py-2">Razão social</th>
                        <th class="border px-4 py-2">CNPJ</th>
                        <th class="border px-4 py-2">Inscrição estadual</th>
                        <th class="border px-4 py-2">Inscrição municipal</th>
                        <th class="border px-4 py-2">E-mail</th>
                        <th class="border px-4 py-2">Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empresas as $empresa)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $empresa->id_emp }}</td>
                            <td class="border px-4 py-2">
                                @if($empresa->tipo_empresa)
                                    {{$empresa->tipo_empresa->nome }}
                                @else
                                    <span class="text-red-600">N/A</span>
                                @endif
                            </td>
                            <td class="border px-4 py-2">{{ $empresa->nome_fans }}</td>
                            <td class="border px-4 py-2">{{ $empresa->razao_social }}</td>
                            <td class="border px-4 py-2">{{ $empresa->cnpj }}</td>
                            <td class="border px-4 py-2">{{ $empresa->ie }}</td>
                            <td class="border px-4 py-2">{{ $empresa->im }}</td>
                            <td class="border px-4 py-2">{{ $empresa->email }}</td>
                            <td class="border px-4 py-2">{{ $empresa->telefone }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    {{---- Popup's -----}}

    {{-- Popup de cadastro de veiculo --}}
    <div class="popup-container" id="PopupVeiculo">
        <div class="popup">
            <form action="{{ route('veiculo.store') }}" method="POST" id="FormVeiculo">
                @csrf
                <h2>Cadastrar um veículo</h2>
                <input type="hidden" name="tipo_registro" value="veiculo">

                {{-- Selecionar a filial que o veiculo pertence --}}
                <div class="form-group">
                    <label for="id_filial_input">Filial: </label> 

                    <select name="id_filial_input" id="id_filial_input" required> 
                        <option value="">Selecione uma filial</option>
                            @foreach($filiais as $fill)
                                <option value="{{ $fill->id_fil }}">{{ $fill->nome }}</option>
                            @endforeach
                    </select>
                </div>
                
                {{-- Diga a placa do veiculo --}}
                <div class="form-group">
                    <label for="placa_veiculo">Placa: </label>
                    <input type="text" id="placa_veiculo" name="placa_veiculo" placeholder="BRA2E19" required>
                </div>

                {{-- Botões para ações do popup --}}
                <div class="actions">
                    <button  type="button" class="submit-btn" onclick="FecharPopupVeiculo()">Cancelar</button>
                    <button type="submit" class="submit-btn">Concluir</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Popup de cadastro de filial --}}
    <div class="popup-container" id="PopupFilial">
        <div class="popup">
            <form action="{{ route('filial.store') }}" method="POST" id="FormFilial">
                @csrf
                <h2>Cadastrar uma filial</h2>
                <input type="hidden" name="tipo_registro" value="filial">

                {{-- Selecionar a filial que o veiculo pertence --}}
                <div class="form-group">
                    <label for="id_filial_input">Filial: </label> 

                    <select name="id_filial_input" id="id_filial_input" required> 
                        <option value="">Selecione a empresa que pertence</option>
                            @foreach($empresas as $emp)
                                <option value="{{ $emp->id_emp }}">{{ $emp->nome_fans }}</option>
                            @endforeach
                    </select>
                </div>
                
                {{-- Nome --}}
                <div class="form-group">
                    <label for="nome_filial">Nome: </label>
                    <input type="text" id="nome_filial" name="nome_filial" placeholder="Unidade Juazeiso do Norte" required>
                </div>

                {{-- Logradouro --}}
                <div class="form-group">
                    <label for="log_filial">Logradouro: </label>
                    <input type="text" id="log_filial" name="log_filial" placeholder="Av. Padre Cicero" required>
                </div>


                {{-- Numero --}}
                <div class="form-group">
                    <label for="numero_filial">Numero: </label>
                    <input type="number" id="numero_filial" name="numero_filial" placeholder="100" required>
                </div>

                {{-- Municipio --}}
                <div class="form-group">
                    <label for="mun_filial">Municipio: </label>

                    <select name="mun_filial" id="mun_filial" required> 
                        <option value="">Selecione o municipio</option>
                            @foreach($municipios as $municipio)
                                <option value="{{ $municipio->id_mun }}">{{ $municipio->nome }}</option>
                            @endforeach
                    </select>
                </div>

                {{-- Estado --}}
                <div class="form-group">
                    <label for="uf_filial">Estado: </label>
                    <select name="uf_filial" id="uf_filial" required> 
                        <option value="">Selecione o estado</option>
                            @foreach($estados as $uf)
                                <option value="{{ $uf->id_est }}">{{ $uf->uf }}</option>
                            @endforeach
                    </select>
                </div>

                {{-- Botões para ações do popup --}}
                <div class="actions">
                    <button  type="button" class="submit-btn" onclick="FecharPopupFilial()">Cancelar</button>
                    <button type="submit" class="submit-btn">Concluir</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Popup de cadastro de empresa --}}
    <div class="popup-container" id="PopupEmpresa">
        <div class="popup">
            <form action="{{ route('empresa.store') }}" method="POST" id="FormEmpresa">
                @csrf
                <h2>Cadastrar uma empresa</h2>
                <input type="hidden" name="tipo_registro" value="empresa">

                {{-- Tipo de empresa --}}
                <div class="form-group">
                    <label for="tipo_empresa">Tipo de empresa: </label>

                    <select name="tipo_empresa" id="tipo_empresa" required> 
                        <option value="">Selecione o tipo de empresa</option>
                            @foreach($tipo_empresas as $tipo)
                                <option value="{{ $tipo->id_temp }}">{{ $tipo->nome }}</option>
                            @endforeach
                    </select>
                </div>
                
                {{-- Nome fantasia --}}
                <div class="form-group">
                    <label for="nome_empresa">Nome fantasia: </label>
                    <input type="text" id="nome_empresa" name="nome_empresa" placeholder="Vértice Soluções" required>
                </div>

                {{-- Razão social --}}
                <div class="form-group">
                    <label for="razao_empresa">Razão social: </label>
                    <input type="text" id="razao_empresa" name="razao_empresa" placeholder="Alpha Inovação Digital Ltda." required>
                </div>

                {{-- CNPJ --}}
                <div class="form-group">
                    <label for="cnpj_empresa">CNPJ: </label>
                    <input type="number" id="cnpj_empresa" name="cnpj_empresa" placeholder="12.345.678/0001-99" required>
                </div>

                {{-- IE --}}
                <div class="form-group">
                    <label for="ie_empresa">IE: </label>
                    <input type="number" id="ie_empresa" name="ie_empresa" placeholder="234567895467" required>
                </div>

                {{-- IM --}}
                <div class="form-group">
                    <label for="im_empresa">IM: </label>
                    <input type="number" id="im_empresa" name="im_empresa" placeholder="234567895467" required>
                </div>

                {{-- E-mail --}}
                <div class="form-group">
                    <label for="email_empresa">E-mail: </label>
                    <input type="email" id="email_empresa" name="email_empresa" placeholder="contato@empresa.com.br" required>
                </div>

                {{-- Telefone --}}
                <div class="form-group">
                    <label for="tel_empresa">Telefone: </label>
                    <input type="number" id="tel_empresa" name="tel_empresa" placeholder="5588982332134" required>
                </div>

                {{-- Botões para ações do popup --}}
                <div class="actions">
                    <button  type="button" class="submit-btn" onclick="FecharPopupEmpresa()">Cancelar</button>
                    <button type="submit" class="submit-btn">Concluir</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function AbrirPopupVeiculo() {
        document.getElementById("PopupVeiculo").style.display = "block";
    }

    function FecharPopupVeiculo() {
        document.getElementById("PopupVeiculo").style.display = "none";
    }

    function AbrirPopupFilial() {
        document.getElementById("PopupFilial").style.display = "block";
    }

    function FecharPopupFilial() {
        document.getElementById("PopupFilial").style.display = "none";
    }

    function AbrirPopupEmpresa() {
        document.getElementById("PopupEmpresa").style.display = "block";
    }

    function FecharPopupEmpresa() {
        document.getElementById("PopupEmpresa").style.display = "none";
    }
</script>

    <script src="{{ asset('js/cadastros/script.js') }}"></script>
    <script src="{{ asset('js/cadastros/modalsButtons.js') }}"></script>
    <script src="{{ asset('js/cadastros/tabelas.js') }}"></script>
@endsection