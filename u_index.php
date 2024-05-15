<?php

$titulo_pagina = "AUmigos do Lar - Plataforma de Adoção";
include "layout/_cabecalho.php";
include "layout/_u_navbar.php";

if (isset($_GET["cod"])) {

  $cod = $_GET["cod"]; // obtem nome digitado na variavel $nome
  $con   = conectarBanco("aumigos"); // conecta no banco pelo nome do banco
  $sql = "SELECT * FROM Usuario WHERE usuario_codigo = $cod  ";
  //echo "<h1> $sql </h1>";  // exibindo para testar!!!!!!!

  $dados = executarSelect($con, $sql); // $dados recebe array com dados ou array se nao encontrar
  desconectarBanco($con);
  
  $part = $dados[0]; // salva em variavel local

} else {
  $nome = ""; // nome recebe string vazia para primeiro acesso na pagina
}
?>
<br><br><br><br>
<main class="container mt-5">
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="imagens/1.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="imagens/2.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="imagens/4.png" class="d-block w-100" alt="...">
      </div>
    </div>
  </div>
  <!--fim do carrossel-->
  <br><br><br>
  <!--cards de informação-->
  <div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4 m-3">
      <div class="col">
        <div class="card h-100">
          <img src="imagens/6.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Benefícios da Adoção</h5>
            <p class="card-text">Conheça os principais motivos para adotar um amigo de quatro patas.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="imagens/5.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Amor não tem raça</h5>
            <p class="card-text">Aprenda sobre os SRD's.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="imagens/7.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Aumigos do Lar</h5>
            <p class="card-text">Muito mais que uma rede de ONGs, uma rede de amor e esperança.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
</main>
<?php
include "layout/_rodape.php";
?>