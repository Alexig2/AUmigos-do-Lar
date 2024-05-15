<?php

$titulo_pagina = "Usuário - Doações";
include "layout/_cabecalho.php";
include "layout/_u_navbar.php";
$conexao = conectarBanco("aumigos");
$ongs = executarSelect($conexao, "SELECT * FROM Ong");
desconectarBanco($conexao);
if (isset($_GET["ong_cnpj"])) {
  $ong_cnpj = $_GET["ong_cnpj"];
  for ($i = 0; $i < count($ongs); $i++) {
    if ($ong_cnpj = $ongs[$i]["ong_cnpj"]) {
      $agencia = $ongs[$i]["agencia"];
      $conta_corrente = $ongs[$i]["conta_corrente"];
      $chave_pix = $ongs[$i]["chave_pix"];
      $caixa_postal = $ongs[$i]["caixa_postal"];
    }
  }
}
?>
<main class="container">
  <br><br><br><br>
  <div class="col-12 card">
    <div class="text-center">
      <br>
      <h1 class="titulo1">Doações</h1>
      <hr>
      <div class="fs-4 texto2">Toda ajuda é bem vinda! Contribua com qualquer valor
        ou brinquedo pelos meios indicados abaixo:</div>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="fs-4 m-3 card-body">
          Ag.: <?= $agencia ?>
          <hr>
          <br>
          CC.: <?= $conta_corrente ?>
          <hr>
          <br>
          Chave PIX: <?= $chave_pix ?> 
          <hr>
          <br>
          Caixa postal: <?= $caixa_postal ?>
          <hr>
        </div>
      </div>
      <div class="col-6">
      </div>
    </div>
  </div>
  <br><br><br><br><br>
</main>
<?php
include "layout/_rodape.php";
?>