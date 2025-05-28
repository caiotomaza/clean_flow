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

<main class="max-w-7xl mx-auto px-4 py-8 space-y-10">
  <h1 class="text-4xl font-bold text-gray-800 mb-6">Registros</h1>

  <!-- Botões de Ação -->
  <div class="flex flex-wrap gap-4">
    <button onclick="abrirPopupResiduos()" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow transition">
      Registrar entrada
    </button>
    <button onclick="abrirPopup()" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded shadow transition">
      Registrar armazenamento
    </button>
    <button onclick="abrirPopupResiduoSaida()" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded shadow transition">
      Registrar saída
    </button>
  </div>

  <!-- Botões de Visualização -->
  <div class="flex flex-wrap gap-4 mt-6">
    <button onclick="mostrarTabela('entrada')" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded">
      Ver Entradas
    </button>
    <button onclick="mostrarTabela('armazenamento')" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded">
      Ver Armazenamentos
    </button>
    <button onclick="mostrarTabela('saida')" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded">
      Ver Saídas
    </button>
  </div>

  <!-- Tabela de Entradas -->
  <div id="tabela-entrada" class="tabela-secao">
    <h2 class="text-2xl font-semibold text-gray-700 mt-8 mb-4">Entradas de Resíduos</h2>
    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-200 rounded shadow">
        <thead class="bg-gray-100 text-gray-700">
          <tr>
            <th class="px-4 py-2 text-left">Nº de registro</th>
            <th class="px-4 py-2 text-left">Filial</th>
            <th class="px-4 py-2 text-left">Responsável</th>
            <th class="px-4 py-2 text-left">Tipo de resíduos</th>
            <th class="px-4 py-2 text-left">Subtipo de resíduos</th>
            <th class="px-4 py-2 text-left">Peso (kg)</th>
            <th class="px-4 py-2 text-left">Tipo de registro</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          @foreach ($entradas as $entrada)
            <tr class="border-t">
              <td class="px-4 py-2">{{ $entrada->id_entrada }}</td>
              <td class="px-4 py-2">
                @if($entrada->filial)
                  {{ $entrada->filial->nome }}
                @else
                  <span class="text-red-600">Sem filial</span>
                @endif
              </td>
              <td class="px-4 py-2">{{ $entrada->responsavel?->name ?? 'N/A' }}</td>
              <td class="px-4 py-2">{{ $entrada->residuo?->nome ?? 'N/A' }}</td>
              <td class="px-4 py-2">{{ $entrada->subresiduo?->nome ?? 'N/A' }}</td>
              <td class="px-4 py-2">{{ $entrada->peso }}</td>
              <td class="px-4 py-2">Entrada de resíduos</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Tabela de Armazenamento -->
  <div id="tabela-armazenamento" class="tabela-secao hidden">
    <h2 class="text-2xl font-semibold text-gray-700 mt-8 mb-4">Resíduos Armazenados</h2>
    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-200 rounded shadow">
        <thead class="bg-gray-100 text-gray-700">
          <tr>
            <th class="px-4 py-2 text-left">ID</th>
            <th class="px-4 py-2 text-left">Container</th>
            <th class="px-4 py-2 text-left">Tipo</th>
            <th class="px-4 py-2 text-left">Subtipo</th>
            <th class="px-4 py-2 text-left">Peso</th>
            <th class="px-4 py-2 text-left">Data</th>
            <th class="px-4 py-2 text-left">Tipo de registro</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          @foreach ($armazenamentos as $arm)
            <tr class="border-t">
              <td class="px-4 py-2">{{ $arm->id_arm }}</td>
              <td class="px-4 py-2">{{ $arm->container }}</td>
              <td class="px-4 py-2">{{ $arm->residuo?->nome ?? 'N/A' }}</td>
              <td class="px-4 py-2">{{ $arm->subresiduo?->nome ?? 'N/A' }}</td>
              <td class="px-4 py-2">{{ $arm->peso }}</td>
              <td class="px-4 py-2">{{ $arm->data_hora }}</td>
              <td class="px-4 py-2">Resíduo armazenado</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Tabela de Saída -->
  <div id="tabela-saida" class="tabela-secao hidden">
    <h2 class="text-2xl font-semibold text-gray-700 mt-8 mb-4">Saídas de Resíduos</h2>
    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-200 rounded shadow">
        <thead class="bg-gray-100 text-gray-700">
          <tr>
            <th class="px-4 py-2 text-left">ID</th>
            <th class="px-4 py-2 text-left">Filial</th>
            <th class="px-4 py-2 text-left">Armazenamento</th>
            <th class="px-4 py-2 text-left">Veículo</th>
            <th class="px-4 py-2 text-left">Data</th>
            <th class="px-4 py-2 text-left">Tipo de registro</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          @foreach ($saidas as $saida)
            <tr class="border-t">
              <td class="px-4 py-2">{{ $saida->id_saida }}</td>
              <td class="px-4 py-2">
                @if($saida->filial)
                  {{ $saida->filial->nome }}
                @else
                  <span class="text-red-600">Sem filial</span>
                @endif
              </td>
              <td class="px-4 py-2">{{ $saida->armazenamento?->container ?? 'N/A' }}</td>
              <td class="px-4 py-2">{{ $saida->veiculo?->placa ?? 'N/A' }}</td>
              <td class="px-4 py-2">{{ $saida->data_hora }}</td>
              <td class="px-4 py-2">Saída de resíduos</td>
            </tr>
          @endforeach
          @if(count($saidas) == 0)
            <tr>
              <td colspan="6" class="text-center text-gray-500 py-4">Nenhuma saída registrada.</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
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
        <form action="{{ route('residuos_sais.store') }}" method="POST">
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