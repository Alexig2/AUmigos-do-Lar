<?php
$titulo_pagina = "ONG - Pedidos de adoção";
include "layout/_cabecalho.php";
include "layout/_o_navbar.php";
$conexao = conectarBanco("aumigos");
$sql = "SELECT U.nome nome_usuario, pedido_disponi, A.nome nome_animal, A.animal_codigo animal_codigo, P.pedido_codigo pedido_codigo, 
termo, comprovante_endereco, data1, data2, data3, horario1, horario2, horario3, documento_foto
FROM Pedido_adocao P, Animal A, Usuario U
WHERE U.usuario_codigo = P.usuario_codigo AND A.animal_codigo = P.animal_codigo";
$pedidos = executarSelect($conexao, $sql);
desconectarBanco($conexao);
?>
<main>
  <br><br><br><br><br>
  <div class="container card">
    <div class="row">
      <div class="col-12">
        <div class="row card-body fs-4">
          <h1 class="text-center mb-3 titulo1">Pedidos de Adoção</h1>
          <hr>
          <br>
          <div class="col-6">
            <div class="list-group list-group-numbered">
              <div>
                <?php
                for ($i = 0; $i < count($pedidos); $i++) {
                  $pedido_disponi = $pedidos[$i]["pedido_disponi"];
                  if ($pedido_disponi == 1) {
                    $nome_usuario = $pedidos[$i]["nome_usuario"];
                    $nome_animal = $pedidos[$i]["nome_animal"];
                    $animal_codigo = $pedidos[$i]["animal_codigo"];
                    $pedido_codigo = $pedidos[$i]["pedido_codigo"];
                    $termo = $pedidos[$i]["termo"];
                    $comprovante_endereco = $pedidos[$i]["comprovante_endereco"];
                    $data1 = $pedidos[$i]["data1"];
                    $data2 = $pedidos[$i]["data2"];
                    $data3 = $pedidos[$i]["data3"];
                    $horario1 = $pedidos[$i]["horario1"];
                    $horario2 = $pedidos[$i]["horario2"];
                    $horario3 = $pedidos[$i]["horario3"];
                    $documento_foto = $pedidos[$i]["documento_foto"];
                ?>
                    <a href="o_dados_pedido.php?animal_codigo=<?= $animal_codigo ?>" class="list-group-item list-group-item-action list-group-item-light">
                      <?= $nome_usuario ?> deseja adotar
                      <?= $nome_animal ?>
                    </a>
                <?php
                  }
                }
                ?>
              </div>
            </div>
          </div>
          <div class="col-6"></div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php
include "layout/_rodape.php";
?>