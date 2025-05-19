@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/registros/styleRegistro.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registros/modalArmazenamento.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registros/modal_carga.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
@endsection

@section('content')

<main>
  <h1 class="title">Registros</h1>

  <div class="entrada-saida">
      <button class="button-entrada" onclick="abrirPopupResiduos()">Registrar entrada</button>
      <button class="button-armazenamento" onclick="abrirPopup()">Registrar armazenamento</button>
      <button class="button-saida" onclick="abrirPopupResiduoSaida()">Registrar saída</button>
  </div>
  <div class="visualizacao-tabelas">
    <!-- Adicione este botão em sua view existente -->
    <button onclick="mostrarTabela('entrada')">Ver Entradas</button>
    <button onclick="mostrarTabela('armazenamento')">Ver Armazenamentos</button>
    <button onclick="mostrarTabela('saida')">Ver Saídas</button>
  </div>

  {{-- Seção: Entrada --}}
  <div id="tabela-entrada" class="tabela-secao">
      <h2>Entradas de Resíduos</h2>
      <table>
          <thead>
              <tr>
                  <th>Nº de registro</th>
                  <th>Filial</th>
                  <th>Responsável</th>
                  <th>Tipo de resíduos</th>
                  <th>Subtipo de resíduos</th>
                  <th>Peso (kg)</th>
                  <th>Tipo de registro</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($entradas as $entrada)
                  <tr>
                      <td>{{ $entrada->id_entrada }}</td>
                      <td>
                        @if($entrada->filial)
                          {{ $entrada->filial->nome }}
                        @else
                          <span style="color: red;">Sem filial</span>
                        @endif
                      </td>
                      <td>{{ $entrada->responsavel?->name ?? 'N/A' }}</td>
                      <td>{{ $entrada->residuo?->nome ?? 'N/A' }}</td>
                      <td>{{ $entrada->subresiduo?->nome ?? 'N/A' }}</td>
                      <td>{{ $entrada->peso }}</td>
                      <td>Entrada de resíduos</td>
                  </tr>
              @endforeach
          </tbody>
      </table>
  </div>

  {{-- Seção: Armazenamento --}}
  <div id="tabela-armazenamento" class="tabela-secao" style="display:none;">
      <h2>Resíduos Armazenados</h2>
      <table>
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Container</th>
                  <th>Tipo</th>
                  <th>Subtipo</th>
                  <th>Peso</th>
                  <th>Data</th>
                  <th>Tipo de registro</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($armazenamentos as $arm)
                  <tr>
                      <td>{{ $arm->id_arm }}</td>
                      <td>{{ $arm->container }}</td>
                      <td>{{ $arm->residuo?->nome ?? 'N/A' }}</td>
                      <td>{{ $arm->subresiduo?->nome ?? 'N/A' }}</td>
                      <td>{{ $arm->peso }}</td>
                      <td>{{ $arm->data_hora }}</td>
                      <td> Resíduo armazenado</td>
                  </tr>
              @endforeach
          </tbody>
      </table>
  </div>

  {{-- Seção: Saída --}}
  <div id="tabela-saida" class="tabela-secao" style="display:none;">
      <h2>Saídas de Resíduos</h2>
      <table>
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Filial</th>
                  <th>Armazenamento</th>
                  <th>Veículo</th>
                  <th>Data</th>
                  <th>Tipo de registro</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($saidas as $saida)
                  <tr>
                      <td>{{ $saida->id_saida }}</td>
                      <td>
                          {{-- CORREÇÃO AQUI --}}
                          @if($saida->filial)
                              {{ $saida->filial->nome }}
                          @else
                              <span style="color: red;">Sem filial</span>
                          @endif
                      </td>
                      <td>{{ $saida->armazenamento?->container ?? 'N/A' }}</td> {{-- Presumo que 'container' seja um atributo do modelo Armazenamento --}}
                      <td>{{ $saida->veiculo?->placa ?? 'N/A' }}</td>
                      <td>{{ $saida->data_hora }}</td>
                      <th> Saída de resíduos </th>
                  </tr>
              @endforeach
              @if(count($saidas) == 0)
              <tr>
                  <td colspan="6" style="text-align:center;">Nenhuma saída registrada.</td> {{-- Ajustado colspan para 6 colunas --}}
              </tr>
              @endif
          </tbody>
      </table>
  </div>
</main>

<div class="popup-container" id="popupResiduos">
    <div class="popup">
      <form action="{{ route('residuos.store') }}" method="POST" id="formEntrada">
        @csrf
        <h2>Registrar Entrada</h2>
        <input type="hidden" name="tipo_registro" value="entrada">
        <div class="form-group">
        <label for="id_filial_input">Filial:</label> 
        <select name="id_filial_input" id="id_filial_input" required> 
          <option value="">Selecione</option>
            @foreach($filiais as $fill)
              <option value="{{ $fill->id_fil }}">{{ $fill->nome }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="id_vec">Placa do veículo:</label>
          <select name="placa_veiculo" id="id_vec">
            <option value="">Selecione</option>
            @foreach($placas as $veiculo)
              <option value="{{ $veiculo->placa }}">{{ $veiculo->placa }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="peso_inicial">Peso (kg)</label>
          <input type="text" id="peso_inicial" name="peso_inicial" placeholder="1500kg" required>
        </div>
  
        <div class="form-group">
          <label for="material_entrada">Tipo de resíduo</label> {{-- ID alterado para evitar conflito --}}
          <select name="material" id="material_entrada">
            <option value="">Selecione</option>
            @foreach($residuos as $residuo)
              <option value="{{ $residuo->id_resd }}">{{ $residuo->nome }}</option>
            @endforeach
          </select>
        </div>
  
        <div class="form-group">
          <label for="subtitulo_material_entrada">Subtipo</label> {{-- ID alterado para evitar conflito --}}
          <select name="subtitulo_material" id="subtitulo_material_entrada">
            <option value="">Selecione</option>
            @foreach($subresiduos as $sub)
              <option value="{{ $sub->id_sub_resd }}">{{ $sub->nome }}</option>
            @endforeach
          </select>
        </div>
  
        <div class="form-group">
          <label for="id_responsavel">Responsável</label>
          <select name="id_responsavel" id="id_responsavel">
            <option value="">Selecione</option>
            @foreach ($users as $user)
              <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
          </select>
        </div>
  
        <div class="form-group">
          <label for="id_container_entrada">ID do armazenamento</label> {{-- ID alterado para evitar conflito --}}
          <input type="text" id="id_container_entrada" name="id_container" placeholder="ERP0001">
        </div>
  
        <div class="form-group">
          <label for="data_armazenamento_entrada">Data e hora da entrada</label> {{-- ID alterado para evitar conflito --}}
          <input type="datetime-local" id="data_armazenamento_entrada" name="data_armazenamento" required>
        </div>
  
        <div class="actions">
            <button  type="button" class="submit-btn" onclick="fecharPopupResiduos()">Cancelar</button>
            <button type="submit" class="submit-btn">Concluir</button>
        </div>
      </form>
    </div>
  </div>
<div class="popup-container" id="popupContainer">
    <div class="popup">
        <form action="{{ route('armazenamentos.store')}}" method="POST" id="formArmazenamento">
            @csrf
            <input type="hidden" name="tipo_registro" value="armazenamento">
        
            <h2>Registrar Armazenamento</h2>
            <label for="container_armazenamento">ID Armazenamento:</label> 
            <input type="text" name="container" id="container_armazenamento" required><br><br>
        
            <div class="form-group">
                <label for="material_armazenamento">Tipo de resíduo</label>
                <select name="material" id="material_armazenamento">
                    @foreach($residuos as $residuo)
                    <option value="{{ $residuo->id_resd }}">{{ $residuo->nome }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="form-group">
                <label for="subtitulo_material_armazenamento">Subtipo</label>
                <select name="subtitulo_material" id="subtitulo_material_armazenamento">
                    @foreach($subresiduos as $sub)
                    <option value="{{ $sub->id_sub_resd }}">{{ $sub->nome }}</option>
                    @endforeach
                </select>
            </div>
        
            <label for="peso_armazenamento">Peso (kg):</label> 
            <input type="number" name="peso" id="peso_armazenamento" step="0.01" required><br><br>
        
            <label for="data_hora_armazenamento">Data e Hora:</label>
            <input type="datetime-local" name="data_hora" id="data_hora_armazenamento" required><br><br>
        
            <div class="actions">
                <button  type="button" class="submit-btn" onclick="fecharPopup()">Cancelar</button>
                <button type="submit" class="submit-btn">Salvar</button>
            </div>
        </form>
    </div>
</div>
<div class="popup-container" id="popupResiduosSaida">
    <div class="popup">
        <form action="{{ route('reseduos_sais.store') }}" method="POST">
          @csrf

          <div>
              <label for="id_saida">ID da Saída:</label>
              <input type="number" name="id_saida" id="id_saida" required>
          </div>

          <div class="form-group">
            <label for="id_filial_sai">Filial:</label> 
              <select name="id_filial_sai" id="id_filial_sai" required> 
                <option value="">Selecione</option>
                  @foreach($filiais as $fill)
                  <option value="{{ $fill->id_fil }}">{{ $fill->nome }}</option>
                  @endforeach
              </select>
          </div>

          <div>
              <label for="id_arm">Armazenamento:</label>
              <select name="id_arm" id="id_arm">
                  <option value="">-- Selecione --</option>
                  @foreach ($armazenamentos as $arm)
                      <option value="{{ $arm->id_arm }}">{{ $arm->nome ?? 'Armazenamento #' . $arm->id_arm }}</option>
                  @endforeach
              </select>
          </div>

          <div>
              <label for="id_vec">Veículo:</label>
              <select name="id_vec" id="id_vec">
                  <option value=""> Selecione </option>
                  @foreach($placas as $veiculo_item)
                      <option value="{{ $veiculo_item->placa }}">{{ $veiculo_item->placa }}</option>
                  @endforeach
              </select>
          </div>

          <div>
              <label for="data_hora">Data e Hora:</label>
              <input type="datetime-local" name="data_hora" id="data_hora" required>
          </div>

          <div class="actions"> 
            <button  type="button" class="submit-btn" onclick="fecharPopupResiduoSaida()">Cancelar</button>
            <button type="submit">Salvar</button>
          </div>
      </form>
    </div>
</div>

<script src="{{ asset('js/registros/script.js') }}"></script>
<script src="{{ asset('js/registros/modalsButtons.js') }}"></script>
<script src="{{ asset('js/registros/tabelas.js') }}"></script>

@endsection
