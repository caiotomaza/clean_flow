@extends('layouts.app')

@section('head')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/cadastros/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/cadastros/modal.css')}}">
@endsection

@section('content')
    <main>
        <h1 class="title">Cadastros</h1>

        {{-- Botões para cadastrar itens --}}
        <div class="entrada-saida">
            <button class="button-veiculos" onclick="AbrirPopupVeiculo()">Cadastrar Veículo</button>
            <button class="button-filial" onclick="AbrirPopupFilial()">Cadastrar Filial</button>
            <button class="button-empresa" onclick="AbrirPopupEmpresa()">Cadastrar Empresa</button>
        </div>

        {{-- Filtros das tabelas --}}
        <div class="visualizacao-tabelas">
            <button onclick="MostrarTabela('veiculo')">Veículos</button>
            <button onclick="MostrarTabela('filial')">Filiais</button>
            <button onclick="MostrarTabela('empresa')">Empresas</button>
        </div>

        {{-- Tabela de veículos --}}
        <div id="tabela-veiculo" class="tabela-secao">
            <h2>Veículos</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nº de registro</th>
                        <th>Empresa</th>
                        <th>Filial</th>
                        <th>Placa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($veiculos as $veiculo)
                        <tr>
                            <td>{{ $veiculo->id_vec }}</td>
                            <td>
                                @if($veiculo->filial)
                                {{ $veiculo->filial->empresa->nome }}
                                @else
                                <span style="color: red;">N/A</span>
                                @endif
                            </td>
                            <td>
                                @if($veiculo->filial)
                                {{ $veiculo->filial->nome }}
                                @else
                                <span style="color: red;">N/A</span>
                                @endif
                            </td>
                            <td>{{ $veiculo->placa }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Tabela de filiais --}}
        <div id="tabela-filial" class="tabela-secao" style="display:none;">
            <h2>Filiais</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nº de registro</th>
                        <th>Nome</th>
                        <th>Logradouro</th>
                        <th>Municipio</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($filiais as $filial)
                        <tr>
                            <td>{{ $filial->id_fil }}</td>
                            <td>{{ $filial->nome }}</td>
                            <td>{{ $filial->Endereco?->nome ?? 'N/A' }}</td>
                            <td>{{ $filial->Municipio?->nome ?? 'N/A' }}</td>
                            <td>{{ $filial->Estado?->uf ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Tabela de empresas --}}
        <div id="tabela-empresa" class="tabela-secao" style="display:none;">
            <h2>Empresas</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nº de registro</th>
                        <th>Tipo de empresa</th>
                        <th>Nome fantasia</th>
                        <th>Razão social</th>
                        <th>CNPJ</th>
                        <th>Inscrição estadual</th>
                        <th>Inscrição municipal</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empresas as $empresa)
                        <tr>
                            <td>{{ $empresa->id_emp }}</td>
                            <td>
                                @if($empresa->tipo_empresa)
                                {{$empresa->tipo_empresa->nome }}
                                @else
                                <span style="color: red;">N/A</span>
                                @endif
                            </td>
                            <td>{{ $empresa->nome_fans }}</td>
                            <td>{{ $empresa->razao_social }}</td>
                            <td>{{ $empresa->cnpj }}</td>
                            <td>{{ $empresa->ie }}</td>
                            <td>{{ $empresa->im }}</td>
                            <td>{{ $empresa->email }}</td>
                            <td>{{ $empresa->telefone }}</td>
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
                <h2>Cadastrar Veículo</h2>
                <input type="hidden" name="tipo_registro" value="veiculo">

                {{-- Selecionar a filial que o veiculo pertence --}}
                <div class="form-group">
                    <label for="id_filial_input">Filial: </label> 

                    <select name="id_filial_input" id="id_filial_input" required> 
                        <option value="">Selecione uma filial.</option>
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
                <h2>Cadastrar Filial</h2>
                <input type="hidden" name="tipo_registro" value="filial">

                {{-- Selecionar a filial que o veiculo pertence --}}
                <div class="form-group">
                    <label for="id_filial_input">Filial: </label> 

                    <select name="id_filial_input" id="id_filial_input" required> 
                        <option value="">Selecione uma filial.</option>
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
                <h2>Cadastrar Empresa</h2>
                <input type="hidden" name="tipo_registro" value="empresa">

                {{-- Selecionar a filial que o veiculo pertence --}}
                <div class="form-group">
                    <label for="id_filial_input">Filial: </label> 

                    <select name="id_filial_input" id="id_filial_input" required> 
                        <option value="">Selecione uma filial.</option>
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
                    <button  type="button" class="submit-btn" onclick="FecharPopupEmpresa()">Cancelar</button>
                    <button type="submit" class="submit-btn">Concluir</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/cadastros/script.js') }}"></script>
    <script src="{{ asset('js/cadastros/modalsButtons.js') }}"></script>
    <script src="{{ asset('js/cadastros/tabelas.js') }}"></script>
@endsection