<?php
$titulo_pagina = "Usuario - Visualizar ONG";
include "layout/_cabecalho.php";
include "layout/_u_navbar.php";
?>
<br><br><br><br>
<main class="container card">
  <br>
  <div class="row">
    <div class="col-6 card-body">
      <h2 class="titulo1 text-center">Envio de Documentos</h2>
      <br>
      <div class="fs-4">
        <form action="u_adotando_cont.php" class="fs-4" method="POST">
          <ul class="list-group">
            <li class="list-group-item list-group-item-light">
              Comprovante
              <div class="input-group mb-3">
                <label class="input-group-text" for="comprovante_endereco">
                  <img class="enviar" src="imagens/carregar.png" alt="">
                </label>
                <input type="file" class="form-control" id="comprovante_endereco" name="comprovante_endereco" required>
              </div>
            </li>
            <li class="list-group-item list-group-item list-group-item list-group-item-secondary">
              Termo de compromisso assinado
              <div class="input-group mb-3">
                <label class="input-group-text" for="termo">
                  <img class="enviar" src="imagens/carregar.png" alt="">
                </label>
                <input type="file" class="form-control" id="termo" name="termo" required>
              </div>
            </li>
            <li class="list-group-item list-group-item list-group-item list-group-item-light">
              Documento com foto (frente e verso)
              <div class="input-group mb-3">
                <label class="input-group-text" for="documento_foto">
                  <img class="enviar" src="imagens/carregar.png" alt="">
                </label>
                <input type="file" class="form-control" id="documento_foto" name="documento_foto" required>
              </div>
            </li>
          </ul>
          <div class="texto5 card-body">
            <h2 class="text-center titulo1">Dia de Busca</h2>
            <hr>
            Escolha 3 opções de dia e horário, conforme a disponibilidade da ONG,
            para buscar seu novo amigo.
            <?php
            if (isset($_POST["enviar"])) {
              echo "<br><br><h3>Pedido de adoção enviado.</h3>";
            }
            ?>
          </div>
          <br>
      </div>
    </div>
    <div class="col-6 card-body fs-4">
      <div class="mb-3">
        <label for="horario" class="form-label texto5">Data 1</label>
        <input type="date" class="date form-control" name="data1" required>
      </div>
      <div class="mb-3">
        <label for="horario" class="form-label texto5">Horário 1</label>
        <input type="time" class="form-control" name="horario1"required>
      </div>
      <div class="mb-3">
        <label for="horario" class="form-label texto5">Data 2</label>
        <input type="date" class="date form-control" name="data2"required>
      </div>
      <div class="mb-3">
        <label for="horario" class="form-label texto5">Horário 2</label>
        <input type="time" class="form-control" name="horario2"required>
      </div>
      <div class="mb-3">
        <label for="horario" class="form-label texto5">Data 3</label>
        <input type="date" class="date form-control" name="data3"required>
      </div>
      <div class="mb-2">
        <label for="horario" class="form-label texto5">Horário 3</label>
        <input type="time" class="form-control" name="horario3"required>
      </div>
      <button type="submit" class="mt-3 btn btn-roxo form-control" name="enviar">Enviar solicitação de adoção</button>
      </form>
    </div>
    <?php

    if (isset($_POST["enviar"])) {
      $conexao = conectarBanco("aumigos");
      $usuario_codigo = $_SESSION["usuario_codigo"];
      $animal_codigo = $_SESSION["animal_codigo"];
      $termo = $_POST["termo"];
      $comprovante_endereco = $_POST["comprovante_endereco"];
      $data1 = $_POST["data1"];
      $data2 = $_POST["data2"];
      $data3 = $_POST["data3"];
      $horario1 = $_POST["horario1"];
      $horario2 = $_POST["horario2"];
      $horario3 = $_POST["horario3"];
      $documento_foto = $_POST["documento_foto"];

      $sql = "INSERT INTO Pedido_adocao (usuario_codigo, animal_codigo, termo, comprovante_endereco, documento_foto, data1, data2, data3, horario1, horario2, horario3, pedido_disponi)
      VALUES ($usuario_codigo, $animal_codigo, '$termo', '$comprovante_endereco', '$documento_foto', '$data1', '$data2', '$data3', '$horario1', '$horario2', '$horario3', 1)";
      executarInsert($conexao, $sql);
      desconectarBanco($conexao);
    }
    ?>
  </div>
  <br><br><br>
</main>
<?php
include "layout/_rodape.php";
?>