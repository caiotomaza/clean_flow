<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Relatório Diário</title>
  <link rel="stylesheet" href="css\relatorios\style-create.css">
</head>
<body>

  <div class="form-box">
    <h2>Relatório Diário</h2>
    <form>

      <div class="row">
        <div class="form-group">
          <label for="data">Data</label>
          <input type="date" id="data" name="data" value="2025-03-11">
        </div>
        <div class="form-group">
          <label for="unidade">Unidade</label>
          <select id="unidade" name="unidade">
            <option>Selecione</option>
          </select>
        </div>
        <div class="form-group">
          <label for="responsavel">Responsável</label>
          <input type="text" id="responsavel" name="responsavel" placeholder="Responsável">
        </div>
      </div>

      <p class="section-title">1. Resíduos Coletados</p>
      <div class="row">
        <div class="form-group">
          <label>Recicláveis (Kg)</label>
          <input type="text" placeholder="200,00">
        </div>
        <div class="form-group">
          <label>Orgânicos (Kg)</label>
          <input type="text" placeholder="200,00">
        </div>
        <div class="form-group">
          <label>Rejeitos (Kg)</label>
          <input type="text" placeholder="200,00">
        </div>
        <div class="form-group">
          <label>Total (Kg)</label>
          <input type="text" placeholder="600,00">
        </div>
      </div>

      <p class="section-title">2. Indicadores de Não Conformidade</p>
      <div class="row">
        <div class="form-group">
          <label>Não conformidades identificadas</label>
          <input type="text" placeholder="Ex: descarte irregular">
        </div>
        <div class="form-group">
          <label>Reclamações</label>
          <input type="text" placeholder="xxxxxxxxxxxxx">
        </div>
      </div>

      <p class="section-title">3. Dados Ambientais</p>
      <div class="row">
        <div class="form-group">
          <label>Redução de consumo</label>
          <input type="text" placeholder="xxxxxxxxxxxxx">
        </div>
        <div class="form-group">
          <label>Resíduos para o aterro</label>
          <input type="text" placeholder="xxxxxxxxxxxxx">
        </div>
      </div>

      <p class="section-title">4. Incidentes e Ocorrências</p>
      <div class="row">
        <div class="form-group">
          <label>Acidente de Trabalho</label>
          <input type="text" placeholder="xxxxxxxxxxxxx">
        </div>
        <div class="form-group">
          <label>Problemas Operacionais</label>
          <input type="text" placeholder="xxxxxxxxxxxxx">
        </div>
      </div>

      <div class="form-group">
        <label>Observações</label>
        <input type="text" placeholder="xxxxxxxxxxxxx">
      </div>

      <div class="form-group">
        <label>Anexar Documentos</label>
        <div class="file-input">
          <button type="button">Anexar</button>
          <span>Nenhum arquivo selecionado</span>
        </div>
      </div>

      <div class="buttons">
        <button type="reset" class="btn btn-limpar">Limpar</button>
        <button type="button" class="btn btn-rascunho">Salvar Rascunho</button>
        <button type="submit" class="btn btn-enviar">Enviar</button>
      </div>
    </form>
  </div>

</body>
</html>
