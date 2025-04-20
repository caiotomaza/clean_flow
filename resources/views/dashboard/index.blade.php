@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="{{ asset('css/dashboard/style.css') }}">
<main>
    <div class="dashboard-container">
        <div class="dashboard-row">
            <div class="entrada-saida">
                <div class="entradas-img">
                    <img class="img-entrada" src="https://cdn-icons-png.flaticon.com/512/4286/4286243.png" alt="Entrada-Saída">
                    <h1>Entradas e Saídas</h1>
                </div>
                <div class="entradas-hoje">
                    <h1>22</h1>
                    <p>Entradas/Saídas hoje</p>
                </div>
                <div class="valores-horarios">
                    <div class="item">
                        <h2>10</h2>
                        <p>8h</p>
                    </div>
                    <div class="linha-vertical"></div>
                    <div class="item">
                        <h2>22</h2>
                        <p>12h</p>
                    </div>
                    <div class="linha-vertical"></div>
                    <div class="item">
                        <h2>50</h2>
                        <p>24h</p>
                    </div>
                </div>
            </div>
            
            <div class="relatorios-recebidos">
                <div class="relatorios-img">
                    <img class="img-relatorios" src="https://cdn-icons-png.flaticon.com/512/3936/3936996.png" alt="Relatorios">
                    <h1>Relatórios Recebidos</h1>
                </div>
                <div class="relatorios-semana">
                    <h1>30</h1>
                    <p>Relatórios recebidos essa semana</p>
                </div>
                <div class="valores-relatorios">
                    <div class="item"><h2>6</h2><p>Seg</p></div>
                    <div class="linha-vertical"></div>
                    <div class="item"><h2>4</h2><p>Ter</p></div>
                    <div class="linha-vertical"></div>
                    <div class="item"><h2>10</h2><p>Qua</p></div>
                    <div class="linha-vertical"></div>
                    <div class="item"><h2>5</h2><p>Qui</p></div>
                    <div class="linha-vertical"></div>
                    <div class="item"><h2>11</h2><p>Sex</p></div>
                </div>    
            </div>
            
            <div class="peso-saida">
                <div class="peso-img">
                    <img class="img-peso" src="https://cdn-icons-png.flaticon.com/512/4286/4286243.png" alt="Peso Entrada-Saída">
                    <h1>Peso de Entradas e Saídas</h1>
                </div>
                <div class="entradas-peso">
                    <h1>360</h1>
                    <p>Total de kg hoje</p>
                </div>
                <div class="valores-peso">
                    <div class="item-peso">
                        <h2>60KG</h2>
                        <p>8h</p>
                    </div>
                    <div class="linha-vertical"></div>
                    <div class="item-peso">
                        <h2>220KG</h2>
                        <p>12h</p>
                    </div>
                    <div class="linha-vertical"></div>
                    <div class="item-peso">
                        <h2>360KG</h2>
                        <p>24h</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard-row">
            <div class="veiculos-entrada">
                <div class="veiculos-img">
                    <img class="img-veiculos" src="https://images.vexels.com/media/users/3/156199/isolated/preview/5d919088b660e6504436b01efe20d9a6-icone-de-caminhao-estilo-linha.png" alt="Veículos">
                    <h1>Total de Veiculos Ativos</h1>
                </div>
                <div class="veiculos-atual">
                    <h1>6</h1>
                    <p>Veículos na rua atualmente</p>
                </div>
                <div class="valores-veiculos">
                    <div class="item"><h2>9</h2><p>Seg</p></div>
                    <div class="linha-vertical"></div>
                    <div class="item"><h2>4</h2><p>Ter</p></div>
                    <div class="linha-vertical"></div>
                    <div class="item"><h2>10</h2><p>Qua</p></div>
                    <div class="linha-vertical"></div>
                    <div class="item"><h2>5</h2><p>Qui</p></div>
                    <div class="linha-vertical"></div>
                    <div class="item"><h2>11</h2><p>Sex</p></div>
                </div>    
            </div>
            
            <div class="grafico-cartao">
                <div class="info-grafico">
                    <div class="grafico-titulo">
                    <img class="img-categoria" src="https://cdn-icons-png.flaticon.com/512/4227/4227865.png" alt="Categorias">
                    <h1>Categorias mais vistas</h1>
                    </div>
                    <canvas id="graficoRosca"></canvas>
                </div>
                <ul class="legenda">
                    <li><span class="cor cor1"></span> 28% Papel/Papelão</li>
                    <li><span class="cor cor2"></span> 23% Plásticos</li>
                    <li><span class="cor cor3"></span> 19% Metais</li>
                    <li><span class="cor cor4"></span> 14% Madeiras</li>
                    <li><span class="cor cor5"></span> 9% Vidros</li>
                    <li><span class="cor cor6"></span> 5% Lixo Orgânico</li>
                    <li><span class="cor cor7"></span> 2% Pilhas e baterias</li>
                </ul>
            </div>
        </div>
    </div>
    <button class="ver-mais">Ver Mais</button>
    </main>
    <script src="{{ asset('js/dashboard/script.js') }}"></script>
@endsection