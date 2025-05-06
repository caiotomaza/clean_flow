@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/historicos/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/historicos/modalArmazenamento.css') }}">
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
            <button class="button-entrada" onclick="abrirPopupResiduos()">Registrar Entrada</button>
            <button class="button-armazenamento" onclick="abrirPopup()">Registrar armazenamento</button>
            <button class="button-saida" onclick="abrirPopupResiduoSaida()">Registrar saída</button>

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

<!-- Popup de registro de entrada de resíduos -->
<div class="popup-container" id="popupResiduos">
    <div class="popup">
      <form action="{{ route('residuos.store') }}" method="POST" id="formEntrada">
        @csrf
        <h2>Registrar Entrada</h2>
        <input type="hidden" name="tipo_registro" value="entrada">
        
        <div class="form-group">
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
          <label for="material">Tipo de resíduo</label>
          <select name="material" id="material">
            @foreach($residuos as $residuo)
              <option value="{{ $residuo->id_resd }}">{{ $residuo->nome }}</option>
            @endforeach
          </select>
        </div>
  
        <div class="form-group">
          <label for="subtitulo_material">Subtipo</label>
          <select name="subtitulo_material" id="subtitulo_material">
            @foreach($subresiduos as $sub)
              <option value="{{ $sub->id_sub_resd }}">{{ $sub->nome }}</option>
            @endforeach
          </select>
        </div>
  
        <div class="form-group">
          <label for="id_responsavel">Responsável</label>
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
          <label for="data_armazenamento">Data e hora da entrada</label>
          <input type="datetime-local" id="data_armazenamento" name="data_armazenamento" required>
        </div>
  
        <div class="actions">
            <button  type="button" class="submit-btn" onclick="fecharPopupResiduos()">Cancelar</button>
            <button type="submit" class="submit-btn">Concluir</button>
        </div>
      </form>
    </div>
  </div>
<!--Popup de registro de Armazenamento-->
<div class="popup-container" id="popupContainer">
    <div class="popup">
        <form action="{{ route('armazenamentos.store')}}" method="POST" id="formArmazenamento">
            @csrf
            <input type="hidden" name="tipo_registro" value="armazenamento">
        
            <!-- ID do Armazenamento -->
            <h2>Registrar Armazamento</h2>
            <label for="container">ID Armazenamento:</label>
            <input type="text" name="container" id="container" required><br><br>
        
            <div class="form-group">
                <label for="material">Tipo de resíduo</label>
                <select name="material" id="material">
                    @foreach($residuos as $residuo)
                    <option value="{{ $residuo->id_resd }}">{{ $residuo->nome }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="form-group">
                <label for="subtitulo_material">Subtipo</label>
                <select name="subtitulo_material" id="subtitulo_material">
                    @foreach($subresiduos as $sub)
                    <option value="{{ $sub->id_sub_resd }}">{{ $sub->nome }}</option>
                    @endforeach
                </select>
            </div>
        
            <!-- Peso -->
            <label for="peso">Peso (kg):</label>
            <input type="number" name="peso" id="peso" step="0.01" required><br><br>
        
            <!-- Data e Hora -->
            <label for="data_hora">Data e Hora:</label>
            <input type="datetime-local" name="data_hora" id="data_hora" required><br><br>
        
            <div class="actions">
                <button  type="button" class="submit-btn" onclick="fecharPopup()">Cancelar</button>
                <button type="submit" class="submit-btn">Salvar</button>
            </div>
        </form>
    </div>
</div>
<!--Popup de registro de saida de resíduos-->
<div class="popup-container" id="popupResiduosSaida">
    <div class="popup">
        <form action="" id="formSaida">
            @csrf
            <input type="hidden" name="tipo_registro" value="saida">
            <h1>Registrar saida</h1>
            <button  type="button" class="submit-btn" onclick="fecharPopupResiduoSaida()">Cancelar</button>
        </form>
    </div>
</div>

<script src="{{ asset('js/historico/script.js') }}"></script>
<script src="{{ asset('js/historico/modalsButtons.js') }}"></script>
@endsection