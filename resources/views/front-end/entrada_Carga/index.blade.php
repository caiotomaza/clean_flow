<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Entrada de Carga</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .form-box {
      background-color: #fff;
      padding: 25px;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      width: 400px;
    }

    .form-box h2 {
      margin-top: 0;
      font-size: 18px;
      color: #333;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      font-size: 14px;
      display: block;
      margin-bottom: 5px;
      color: #333;
    }

    input, select {
      width: 100%;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 14px;
    }

    .row {
      display: flex;
      gap: 10px;
    }

    .row .form-group {
      flex: 1;
    }

    .buttons {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }

    .btn {
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      color: white;
      font-size: 14px;
      cursor: pointer;
    }

    .btn-limpar {
      background-color: #e74c3c;
    }

    .btn-concluir {
      background-color: #2ecc71;
    }

    .btn:hover {
      opacity: 0.9;
    }

  </style>
</head>
<body>

  <div class="form-box">
    <h2>Entrada de Carga</h2>
    <form>
      <div class="form-group">
        <label for="local">Local de Recebimento</label>
        <select id="local" name="local">
          <option>Filial - Distrito Industrial</option>
        </select>
      </div>

      <div class="row">
        <div class="form-group">
          <label for="registro">Nº do Registro</label>
          <input type="text" id="registro" name="registro" placeholder="001-2025">
        </div>
        <div class="form-group">
          <label for="placa">Placa do Veículo</label>
          <input type="text" id="placa" name="placa" placeholder="AAA0A00">
        </div>
      </div>

      <div class="form-group">
        <label for="fornecedor">Fornecedor</label>
        <input type="text" id="fornecedor" name="fornecedor" placeholder="Prefeitura de Juazeiro do Norte">
      </div>

      <div class="row">
        <div class="form-group">
          <label for="material">Material</label>
          <input type="text" id="material" name="material" placeholder="Misto">
        </div>
        <div class="form-group">
          <label for="tipo">Tipo</label>
          <select id="tipo" name="tipo">
            <option>Coleta mista</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="form-group">
          <label for="peso">Peso Inicial (kg)</label>
          <input type="text" id="peso" name="peso" placeholder="444,440">
        </div>
        <div class="form-group">
          <label for="descricao">Descrição</label>
          <input type="text" id="descricao" name="descricao" placeholder="Aaaaa aaaaa aaaaa">
        </div>
      </div>

      <div class="buttons">
        <button type="reset" class="btn btn-limpar">Limpar</button>
        <button type="submit" class="btn btn-concluir">Concluir</button>
      </div>
    </form>
  </div>

</body>
</html>
