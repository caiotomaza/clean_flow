<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Relatório {{ $titulo ?? '' }}</title>
    <style>
        body { font-family: sans-serif; }
        h1, h2, h3 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Relatório {{ $titulo ?? 'Simples' }}</h1>
    @if(isset($data_referencia))
        <p style="text-align: center;"><strong>Período de Referência:</strong> {{ $data_referencia }}</p>
    @endif

    <h2>Entradas</h2>
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
        <p>Nenhuma entrada registrada para este período.</p>
    @endif

    <h2>Armazenamentos</h2>
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
        <p>Nenhum armazenamento registrado para este período.</p>
    @endif

    <h2>Saídas</h2>
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
        <p>Nenhuma saída registrada para este período.</p>
    @endif
</body>
</html>
