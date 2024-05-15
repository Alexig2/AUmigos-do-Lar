<?php
$titulo_pagina = "ONG - Histórico de adoção";
include "layout/_cabecalho.php";
include "layout/_u_navbar.php";
$conexao = conectarBanco("aumigos");
$sql = "SELECT  AD.confirmacao confirmacao, U.nome nome_usuario, A.nome nome_animal, data_adocao, adocao_codigo
  FROM Pedido_adocao P, Adocao AD, Animal A, Usuario U
  WHERE U.usuario_codigo = P.usuario_codigo AND A.animal_codigo = P.animal_codigo
  AND P.pedido_codigo = AD.pedido_codigo";
$adocoes = executarSelect($conexao, $sql);
desconectarBanco($conexao);
?>
<main>
  <br><br><br><br><br>
  <div class="container card">
    <div class="row">
      <div class="col-12">
        <div class="row card-body fs-4">
          <h1 class="text-center mb-3 titulo1">Notificações</h1>
          <hr>
          <br>
          <div class="col-6">
            <div class="list-group list-group-numbered">
              <div>
                <?php
                for ($i = 0; $i < count($adocoes); $i++) {
                  if($adocoes[$i]["nome_usuario"] == $_SESSION["nome"]){
                  $adocao = $adocoes[$i]; // salva em variavel local

                  $nome_usuario = $adocao["nome_usuario"];
                  $nome_animal = $adocao["nome_animal"];
                  $data_adocao = $adocao["data_adocao"];
                  $adocao_codigo = $adocao["adocao_codigo"];
                  $confirmacao = $adocao["confirmacao"];
                  if($confirmacao == 1){
                    $aprovacao = "aprovado";
                  } elseif ($confirmacao == 0){
                    $aprovacao = "rejeitado";
                  }
                ?>
                  <a href="o_dados_adocao.php?adocao_codigo=<?= $adocao_codigo ?>" class="list-group-item list-group-item-action list-group-item-light">
                     Seu pedido para adotar <?= $nome_animal ?> foi <?= $aprovacao ?> na data <?= $data_adocao ?>.
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