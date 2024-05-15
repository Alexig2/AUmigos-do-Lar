<?php
$titulo_pagina = "Usuário - Visualizar ONG";
include "layout/_cabecalho.php";
include "layout/_u_navbar.php";
$conexao = conectarBanco("aumigos");
$ongs = executarSelect($conexao, "SELECT * FROM Ong");
desconectarBanco($conexao);
if (isset($_GET["ong_codigo"])) {
  for ($i = 0; $i < count($ongs); $i++) {
    if ($_GET["ong_codigo"] == $ongs[$i]["ong_codigo"]) {
      $ong_cnpj = $ongs[$i]["ong_cnpj"];
      $nome_fantasia = $ongs[$i]["nome_fantasia"];
      $cidade = $ongs[$i]["cidade"];
      $estado = $ongs[$i]["estado"];
      $endereco = $ongs[$i]["endereco"];
      $descricao = $ongs[$i]["descricao"];
      $email_ong = $ongs[$i]["email_ong"];
      $agencia = $ongs[$i]["agencia"];
      $conta_corrente = $ongs[$i]["conta_corrente"];
      $chave_pix = $ongs[$i]["chave_pix"];
      $caixa_postal = $ongs[$i]["caixa_postal"];
    }
  }
}
?>
<br><br>
<main class="">
  <div class="container mt-5 card">
    <br>
    <div class="row">
      <div class="col-12">
        <div class="text-center">
          <h1 class="titulo1">Sobre a ONG</h1>
          <hr>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-6 fs-4 card-body">
        <img class="perfil" src="imagens/perfil.png" alt="">
        <div class="mb-4"></div>
        <div class="m-3">
          Nome: <?= $nome_fantasia ?>
          <hr>
        </div>
        <div class="m-3">
          CNPJ: <?= $ong_cnpj ?>
          <hr>
        </div>
        <div class="m-3">
          Endereco: <?= $endereco ?>
          <hr>
        </div>
        <div class="m-3">
          Email: <?= $email_ong ?>
          <hr>
        </div>
        <div class="m-3">
          Chave PIX: <?= $chave_pix ?>
          <hr>
        </div>
      </div>
      <div class="col-6 card-body fs-4">
        <div class="m-3">
          <img class="local" src="imagens/local.png" alt="">
          Cidade: <?= $cidade ?>
          <hr>        
        </div>
        <div class="m-3">
          Estado: <?= $estado ?>
          <hr>       
        </div>
        <div class="m-3">
          Descrição: <?= $descricao ?>
          <hr>        
        </div>
        <div class="m-3">
          Agência: <?= $agencia ?>
          <hr>        
        </div>
        <div class="m-3">
          Conta Corrente: <?= $conta_corrente ?>
          <hr>        
        </div>
        <div class="m-3">
          Caixa Postal: <?= $caixa_postal ?>
          <hr>       
        </div>
      </div>
    </div>
</main>
<?php
include "layout/_rodape.php";
?>