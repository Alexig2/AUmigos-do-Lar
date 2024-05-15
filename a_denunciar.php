<?php
$titulo_pagina = "Anônimo - Denunciar";
include "layout/_cabecalho.php";
include "layout/_a_navbar.php";
if (isset($_GET["enviar"])) {
  $conexao = conectarBanco("aumigos");
      $cidade = $_GET["cidade"];
      $estado = $_GET["estado"];
      $endereco = $_GET["endereco"];
      $descricao = $_GET["descricao"];
      $quantidade = $_GET["quantidade"];
      $data_denuncia = date('Y-m-d');

      $sql = "INSERT INTO Denuncia( cidade, estado, endereco, descricao, quantidade, data_denuncia, denuncia_disponi)
              VALUES ( '$cidade', '$estado', '$endereco', '$descricao', $quantidade, '$data_denuncia', 1)";
      executarInsert($conexao, $sql);
  desconectarBanco($conexao);
}
?>
<main class="container mt-5">
  <br><br>
  <div class="row">
    <div class="col-12 card">
      <div class="text-center">
        <br>
        <h1 class="titulo1">Denunciar</h1>
        <hr>
        <?php
        if (isset($_GET["enviar"])) {
        ?>
          <div class="mt-5">
          </div>
          <div class="text-center text-dark bg-light p-1 fs-2 m-3">
            <?php
            echo "Denúncia Realizada!"
            ?>
            Data da denúncia: <?= $data_denuncia ?>
          </div>
        <?php
        }
        ?>
        <div class="fs-4 texto2">Sabe de um animal abandonado? Entre em contato e nos ajude a salvá-los! </div>
      </div>
      <br>
      <form class="form-control card-body fs-4" method="GET" action="a_denunciar.php">
        <div class="mb-3">
          <div>
            <label for="estado">
              Estado:
            </label>
            <select class="form-select" aria-label="Default select example" id="estado" name="estado" required>
              <option selected disabled> Selecione... </option>
              <option value="AC">Acre</option>
              <option value="AL">Alagoas</option>
              <option value="AP">Amapá</option>
              <option value="AM">Amazonas</option>
              <option value="BA">Bahia</option>
              <option value="CE">Ceará</option>
              <option value="DF">Distrito Federal</option>
              <option value="ES">Espírito Santo</option>
              <option value="GO">Goiás</option>
              <option value="MA">Maranhão</option>
              <option value="MT">Mato Grosso</option>
              <option value="MS">Mato Grosso do Sul</option>
              <option value="MG">Minas Gerais</option>
              <option value="PA">Pará</option>
              <option value="PB">Paraíba</option>
              <option value="PR">Paraná</option>
              <option value="PE">Pernambuco</option>
              <option value="PI">Piauí</option>
              <option value="RJ">Rio de Janeiro</option>
              <option value="RN">Rio Grande do Norte</option>
              <option value="RS">Rio Grande do Sul</option>
              <option value="RO">Rondônia</option>
              <option value="RR">Roraima</option>
              <option value="SC">Santa Catarina</option>
              <option value="SP">São Paulo</option>
              <option value="SE">Sergipe</option>
              <option value="TO">Tocantins</option>
            </select>
          </div>
        </div>
        <div class="mb-3">
          <label for="cidade" class="form-label">Cidade:</label>
          <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite a cidade de onde estão os animais" required>
        </div>
        <div class="mb-3">
          <label for="endereco" class="form-label">Endereço:</label>
          <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua, quadra - Bairro" required>
        </div>
        <div class="mb-3">
          <label for="descricao" class="form-label">Descrição:</label>
          <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea required>
        </div>
        <div class="mb-3">
          <label for="quantidade" class="form-label">Quantidade de animais:</label>
          <input type="number" id="quantidade" name="quantidade" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-roxo" name="enviar">Enviar</button>
      </form>
      <br>
    </div>
  </div>
  <br><br><br><br><br>
</main>
<?php
include "layout/_rodape.php";
?>