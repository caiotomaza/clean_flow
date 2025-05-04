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
                <th>Peso (kg)</th>
                <th>Tipo de registro</th>
            </tr>
        </thead>
        <tbody id="tabela-corpo">
            @foreach ($registros as $registro)
                <tr>
                    <td>{{ $registro->id_entrada }}</td>
                    <td>{{ $registro->responsavel?->name ?? 'N/A' }}</td>
                    <td>{{ $registro->residuo?->nome ?? 'N/A' }}</td>
                    <td>{{ $registro->subresiduo?->nome ?? 'N/A' }}</td>
                    <td>{{ $registro->peso }}</td>
                    <td>
                        @switch($registro->tipo_registro)
                            @case('entrada')
                                Entrada de resíduos
                                @break
                            @case('armazenamento')
                                Resíduo armazenado
                                @break
                            @case('saida')
                                Saída de resíduos
                                @break
                            @default
                                Não especificado
                        @endswitch
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
        
    </table>
</main>

<!--Popup de registro de entrada de resíduos-->
<div id="modalEntradaCarga" class="modal">
    <div class="modal-content">
        <span class="close-btn" id="btnCloseModalEntradaCarga">&times;</span>
        <div class="card">
            <form action="{{ route('residuos.store') }}" method="POST"> 
                @csrf
                <h2>Entrada de resíduos</h2> 
                <input type="hidden" name="tipo_registro" value="entrada">
                <div class="box">
                    <div class="form-group">
                        <!-- Placa do veículo -->
                        <label for="placa_veiculo">Placa do veículo</label>
                        <input list="placas" id="placa_veiculo" name="placa_veiculo" placeholder="ABC-1234">
                        <datalist id="placas">
                            @foreach($placas as $veiculo)
                                <option value="{{ $veiculo->placa }}">{{ $veiculo->placa }}</option>
                            @endforeach
                        </datalist>
                    </div>                    
                    <div class="form-group">
                        <label for="peso_inicial">Peso (kg)</label>
                        <input type="text" id="peso_inicial" name="peso_inicial" placeholder="1500kg" required>
                    </div>
                    <div class="form-group">
                        <!-- Tipo de resíduo -->
                        <label for="material">Selecione o tipo de resíduo</label>
                        <select name="material" id="material">
                            @foreach($residuos as $residuo)
                                <option value="{{ $residuo->id_resd }}">{{ $residuo->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="subtitulo_material">Selecione o subtipo</label>
                        <select name="subtitulo_material" id="subtitulo_material">
                            @foreach($subresiduos as $sub)
                                <option value="{{ $sub->id_sub_resd }}">{{ $sub->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="responsavel">Responsável</label>
                        <select name="id_responsavel" id="id_responsavel">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>                        
                    </div>
                    <div class="form-group">
                        <label for="id_container">ID do armazenamento</label>
                        <input type="text" id="id_container" name="id_container" placeholder="ERP0001">
                    </div>
                    <div class="form-group">
                        <label for="data_armazenamento">Data e hora da entrada</label> {{-- Ajustei o label --}}
                        <input type="datetime-local" id="data_armazenamento" name="data_armazenamento" required>
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
<!--Popup de registro de Armazenamento-->
<div id="ArmazenamentoDeReseduos" class="modal">
    <div class="modal-content">
        <span class="close-btn" id="btnCloseModalEntradaCarga">&times;</span>
        <input type="hidden" name="tipo_registro" value="armazenamento">
    </div>
</div>
<!--Popup de registro de saida de resíduos-->
<div id="saidaDeReseduos" class="modal">
    <div class="modal-content">
        <span class="close-btn" id="btnCloseModalEntradaCarga">&times;</span>
        <input type="hidden" name="tipo_registro" value="armazenamento">
    </div>
</div>

<script src="{{ asset('js/historico/script.js') }}"></script>
<script src="{{ asset('js/historico/entradaCarga.js') }}"></script>
@endsection