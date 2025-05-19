<h2>Relatório {{ $titulo }}</h2>

<h3>Entradas</h3>
@if(count($entradas))
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Peso</th>
                <th>Data</th>
                <th>Veículo</th>
                <th>Filial</th>
                <th>Resíduo</th>
                <th>Sub-resíduo</th>
                <th>Responsável</th>
                <th>Tipo Registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entradas as $entrada)
                <tr>
                    <td>{{ $entrada->id_entrada }}</td>
                    <td>{{ $entrada->peso }}</td>
                    <td>{{ \Carbon\Carbon::parse($entrada->data_hora)->format('d/m/Y H:i') }}</td>
                    <td>{{ $entrada->veiculo->placa ?? 'N/A' }}</td>
                    <td>{{ $entrada->filial->nome ?? 'N/A' }}</td>
                    <td>{{ $entrada->residuo->nome ?? 'N/A' }}</td>
                    <td>{{ $entrada->subresiduo->nome ?? 'N/A' }}</td>
                    <td>{{ $entrada->responsavel->name ?? 'N/A' }}</td>
                    <td>{{ $entrada->tipo_registro ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Nenhuma entrada registrada.</p>
@endif

<h3>Armazenamentos</h3>
@if(count($armazenamentos))
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Container</th>
                <th>Peso</th>
                <th>Data</th>
                <th>Resíduo</th>
                <th>Sub-resíduo</th>
                <th>Tipo Registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach($armazenamentos as $armazenamento)
                <tr>
                    <td>{{ $armazenamento->id_arm }}</td>
                    <td>{{ $armazenamento->container }}</td>
                    <td>{{ $armazenamento->peso }}</td>
                    <td>{{ \Carbon\Carbon::parse($armazenamento->data_hora)->format('d/m/Y H:i') }}</td>
                    <td>{{ $armazenamento->residuo->nome ?? 'N/A' }}</td>
                    <td>{{ $armazenamento->subresiduo->nome ?? 'N/A' }}</td>
                    <td>{{ $armazenamento->tipo_registro ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Nenhum armazenamento registrado.</p>
@endif

<h3>Saídas</h3>
@if(count($saidas))
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Veículo</th>
                <th>Filial</th>
                <th>Armazenamento</th>
                <th>Tipo Registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach($saidas as $saida)
                <tr>
                    <td>{{ $saida->id_saida }}</td>
                    <td>{{ \Carbon\Carbon::parse($saida->data_hora)->format('d/m/Y H:i') }}</td>
                    <td>{{ $saida->veiculo->placa ?? 'N/A' }}</td>
                    <td>{{ $saida->filial->nome ?? 'N/A' }}</td>
                    <td>{{ $saida->armazenamento->container ?? 'N/A' }}</td>
                    <td>{{ $saida->tipo_registro ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Nenhuma saída registrada.</p>
@endif
