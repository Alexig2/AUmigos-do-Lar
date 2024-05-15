<?php
$titulo_pagina = "ONG - Denúncias";
include "layout/_cabecalho.php";
include "layout/_o_navbar.php";
if (!isset($_POST["salvar"])) {
  $conexao = conectarBanco("aumigos");
  $denuncias = executarSelect($conexao, "SELECT * FROM Denuncia");
  desconectarBanco($conexao);
} elseif (isset($_POST["salvar"])) {
  $denuncia_codigo = $_POST["denuncia_codigo"];
  $cidade = $_POST["cidade"];
  $estado = $_POST["estado"];
  $endereco = $_POST["endereco"];
  $descricao = $_POST["descricao"];
  $quantidade = $_POST["quantidade"];
  $data_denuncia = $_POST["data_denuncia"];

  $conexao = conectarBanco("aumigos");

  $sql = "SELECT * FROM Denuncia WHERE denuncia_codigo = $denuncia_codigo";

  $denuncia_dados = executarSelect($conexao, $sql);
  if (count($denuncia_dados) > 0) { // credenciais corretas - iniciar sessao e salvar dados do usuario
    $denuncia = $denuncia_dados[0]; // salva dados do participante na variavel $part

    $sql = "UPDATE Denuncia
        SET denuncia_disponi = 0
        WHERE denuncia_codigo = $denuncia_codigo";
    $denucia_dados = executarUpdate($conexao, $sql);
    desconectarBanco($conexao);
    header("location: o_animais_reportados.php");
  }
}
?>
<main class="container">
  <br><br><br><br>
  <div class="col-12 card">
    <div class="text-center">
      <br>
      <h1 class="titulo1">Denúncias</h1>
      <hr>
    </div>
    <div class="card-body fs-4">
      <form action="o_animais_reportados.php" method="POST">
        <?php
        for ($i = 0; $i < count($denuncias); $i++) {
          if ($denuncias[$i]["denuncia_disponi"] == 1) {
            $cidade = $denuncias[$i]["cidade"];
            $estado = $denuncias[$i]["estado"];
            $endereco = $denuncias[$i]["endereco"];
            $descricao = $denuncias[$i]["descricao"];
            $quantidade = $denuncias[$i]["quantidade"];
            $data_denuncia = $denuncias[$i]["data_denuncia"];
            $denuncia_codigo = $denuncias[$i]["denuncia_codigo"];
        ?>
            <div class=''>
              <p class='card-text'>
              <div>
                <div class='card-body'>
                  <h5 class='card-title d-flex justify-content-between'></h5>
                  <ul class='list-group'>
                    <li class='list-group-item'>
                      Número da Denúncia
                      <input class='list-group-item form-control' name="denuncia_codigo" value="<?= $denuncia_codigo ?>" readonly></input>
                      Cidade:
                      <input class='list-group-item  form-control' name="cidade" value="<?= $cidade ?>" readonly></input>
                      Estado:
                      <input class='list-group-item form-control' name="estado" value="<?= $estado ?>" readonly></input>
                      Endereço:
                      <input class='list-group-item form-control' name="endereco" value="<?= $endereco ?>" readonly></input>
                      Quantidade:
                      <input class='list-group-item form-control' name="quantidade" value="<?= $quantidade ?>" readonly></input>
                      Descrição:
                      <input class='list-group-item form-control' name="descricao" value="<?= $descricao ?>" readonly></input>
                      <div class='list-group-item list-group-item-secondary'>
                        Data de envio:
                        <input class="form-control list-group-item" name="data_denuncia" value="<?= $data_denuncia ?>" readonly></input>
                      </div>
                    </li>
                    <li class='list-group-item'>
                      <div class="row">
                        <div class="card-body col-6">
                          <ul class='list-group list-group-flush'>
                            <li class='list-group-item'>
                              <div class="titulo2">Situação de Resgate</div>
                            </li>
                            <li class='list-group-item'>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="animal_encontrado" id="animal_encontrado" value="1" required>
                                <label class="form-check-label" for="animal_encontrado">Encontrado</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="animal_encontrado" id="animal_encontrado" value="2" required>
                                <label class="form-check-label" for="animal_encontrado">Não encontrado</label>
                              </div>
                              <br>
                            </li>
                            <li class='list-group-item'>
                              <label for="data_acao" class="">Data de ação:</label>
                              <input class="form-control col-4" type="date" name="data_acao">
                            </li>
                            <li class='list-group-item'>
                              <button class='btn btn-roxo form-control' name="salvar">Enviar resposta</button>
                            </li>
                          </ul>
                        </div>
                        <div class="col-6"></div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <br>
        <?php
          }
        }
        ?>
    </div>
    </form>
  </div>
</main>
<?php
include "layout/_rodape.php";
?>