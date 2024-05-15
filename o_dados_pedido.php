<?php
$titulo_pagina = "ONG - Dados do Pedido de Adoção";
include "layout/_cabecalho.php";
include "layout/_o_navbar.php";
if (!isset($_GET["resposta"])) {
  if (isset($_GET["animal_codigo"])) {
    $animal_codigo = $_GET["animal_codigo"];
    $conexao = conectarBanco("aumigos");
    $sql = "SELECT U.usuario_codigo usuario_codigo, U.nome nome_usuario, A.ong_codigo ong_codigo, U.usuario_cpf usuario_cpf, A.nome nome_animal,
  A.animal_codigo animal_codigo, P.pedido_codigo pedido_codigo, termo, comprovante_endereco, data1,
  data2, data3, horario1, horario2, horario3, documento_foto, P.pedido_disponi pedido_disponi
  FROM Pedido_adocao P, Animal A, Usuario U, Ong O
  WHERE U.usuario_codigo = P.usuario_codigo AND A.animal_codigo = P.animal_codigo
  AND P.animal_codigo = $animal_codigo AND A.ong_codigo = O.ong_codigo";
    $pedidos = executarSelect($conexao, $sql);
    desconectarBanco($conexao);

    $pedido = $pedidos[0]; // salva em variavel local
    $pedido_disponi = $pedido["pedido_disponi"];
    if ($pedido_disponi == 1) {

      $ong_codigo = $pedido["ong_codigo"];
      $_SESSION["ong_codigo"] = $ong_codigo;

      $pedido_codigo = $pedido["pedido_codigo"];
      $_SESSION["pedido_codigo"] = $pedido_codigo;

      $usuario_cpf = $pedido["usuario_cpf"];
      $_SESSION["usuario_cpf"] = $usuario_cpf;

      $nome_usuario = $pedido["nome_usuario"];
      $nome_animal = $pedido["nome_animal"];


      $animal_codigo = $pedido["animal_codigo"];
      $_SESSION["animal_codigo"] = $animal_codigo;

      $termo = $pedido["termo"];
      $comprovante_endereco = $pedido["comprovante_endereco"];
      $data1 = $pedido["data1"];
      $data2 = $pedido["data2"];
      $data3 = $pedido["data3"];
      $horario1 = $pedido["horario1"];
      $horario2 = $pedido["horario2"];
      $horario3 = $pedido["horario3"];
      $documento_foto = $pedido["documento_foto"];
    }
  }
} else {
?>
  <br><br><br><br>
<?php
  $situacao = $_GET["situacao"];
  if ($situacao == "aceito") {
    $confirmacao = 1;
  } else {
    $confirmacao = 0;
  }
  $conexao = conectarBanco("aumigos");
  $pedido_codigo = $_SESSION["pedido_codigo"];
  $ong_codigo = $_SESSION["ong_codigo"];
  $animal_codigo = $_SESSION["animal_codigo"];
  $data_adocao = date('Y-m-d');
  $usuario_cpf = $_SESSION["usuario_cpf"];


  $sql = "INSERT INTO Adocao (pedido_codigo, ong_codigo, confirmacao, data_adocao, usuario_cpf)
  VALUES ($pedido_codigo, $ong_codigo, $confirmacao, '$data_adocao', '$usuario_cpf')";
  $dados1 = executarInsert($conexao, $sql);

  $sql2 = "UPDATE Pedido_adocao SET pedido_disponi = 0
  WHERE animal_codigo = $animal_codigo";
  $dados2 = executarUpdate($conexao, $sql2);
  desconectarBanco($conexao);

  header("location: o_pedido_adocao.php");
}
?>
<main class="container">
  <br><br><br><br>
  <div class="col-12 card">
    <div class="card-body fs-4">
      <form action="o_dados_pedido.php?<?= $animal_codigo ?>" method="GET">
        <div class="row">
          <div class='col-6'>
            <br>
            <h2 class="titulo1 text-center">Dados do Pedido</h2>
            <hr>
            <ul class='list-group'>
              <li class='list-group-item' value="<?= $nome_usuario ?>" name="nome_usuario">Nome do usuário:
                <a class="link_geral" href="o_ver_usuario.php?usuario_codigo=<?= $pedido["usuario_codigo"] ?>"> <?= $nome_usuario ?> </a>
              </li>
              <li class='list-group-item' value="<?= $nome_animal ?>" name="nome_animal">Nome do animal:
                <?= $nome_animal ?>
              </li>
              <li class='list-group-item' value="<?= $termo ?>" name="termo">Termo:
                <?= $termo ?>
              </li>
              <li class='list-group-item' value="<?= $comprovante_endereco ?>" name="comprovante_endereco">Comprovante de endereço:
                <?= $comprovante_endereco ?>
              </li>
              <li class='list-group-item' value="<?= $documento_foto ?>" name="documento_foto">Documento com foto:
                <?= $documento_foto ?>
              </li>
              <li class='list-group-item' value="<?= $data1 ?>" name="data1">Data 1:
                <?= $data1 ?>
              </li>
              <li class='list-group-item' value="<?= $data2 ?>" name="data2">Data 2:
                <?= $data2 ?>
              </li>
            </ul>
          </div>
          <div class="col-6">
            <br>
            <ul class='list-group'>
              <li class='list-group-item' value="<?= $data3 ?>" name="data3">Data 3:
                <?= $data3 ?>
              </li>
              <li class='list-group-item' value="<?= $horario1 ?>" name="horario1">Horário 1:
                <?= $horario1 ?>
              </li>
              <li class='list-group-item' value="<?= $horario2 ?>" name="horario2">Horário 2:
                <?= $horario2 ?>
              </li>
              <li class='list-group-item' value="<?= $horario3 ?>" name="horario3">Horário 3:
                <?= $horario3 ?>
              </li>
            </ul>
            <br>
            <h2 class="text-center titulo1">Confirmação de Adoção</h2>
            <hr>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="situacao" id="situacao" value="aceito" required>
              <label class="form-check-label" for="situacao">Aceitar</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="situacao" id="situacao" value="rejeitado" required>
              <label class="form-check-label" for="situacao">Rejeitar</label>
            </div>
            <br><br>
            <button type="submit" class='btn btn-roxo form-control' name="resposta">Enviar resposta</button>
          </div>
        </div>
      </form>
    </div>
    <br>
</main>
<?php
include "layout/_rodape.php";
?>