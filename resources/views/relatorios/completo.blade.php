<!DOCTYPE html>
<html>
<head>
    <style>
        .page-break { page-break-after: always; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .section-title { margin-top: 30px; color: #333; }
    </style>
</head>
<body>
    <h1>Relatório Completo</h1>

    <!-- Seção Diária -->
    @include('relatorios.partials.secao', [
        'titulo' => 'Diário',
        'entradas' => $entradasDiarias,
        'armazenamentos' => $armazenamentosDiarios,
        'saidas' => $saidasDiarias
    ])

    <div class="page-break"></div>

    <!-- Seção Semanal -->
    @include('relatorios.partials.secao', [
        'titulo' => 'Semanal',
        'entradas' => $entradasSemanais,
        'armazenamentos' => $armazenamentosSemanais,
        'saidas' => $saidasSemanais
    ])

    <div class="page-break"></div>

    <!-- Seção Mensal -->
    @include('relatorios.partials.secao', [
        'titulo' => 'Mensal',
        'entradas' => $entradasMensais,
        'armazenamentos' => $armazenamentosMensais,
        'saidas' => $saidasMensais
    ])
</body>
</html>