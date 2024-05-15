<?php

$titulo_pagina = "Usuário - Doações";
include "layout/_cabecalho.php";
include "layout/_u_navbar.php";
$conexao = conectarBanco("aumigos");
$animais = executarSelect($conexao, "SELECT * FROM Animal");
$ongs = executarSelect($conexao, "SELECT * FROM Ong");
desconectarBanco($conexao);
?>
<br><br><br>
<main class="container">
  <!--inicio dos cards de apresentação-->
  <div class="row row-cols-1 row-cols-md-5 g-4 mt-3">
    <?php
    for ($i = 0; $i < count($ongs); $i++) {
      $ong_cnpj = $ongs[$i]["ong_cnpj"];
      $cidade = $ongs[$i]["cidade"];
      $nome_fantasia = $ongs[$i]["nome_fantasia"];
      $estado = $ongs[$i]["estado"];
      $endereco = $ongs[$i]["endereco"];
      $email_ong = $ongs[$i]["email_ong"];
      $descricao = $ongs[$i]["descricao"];
      $senha_ong = $ongs[$i]["senha_ong"];
      $agencia = $ongs[$i]["agencia"];
      $conta_corrente = $ongs[$i]["conta_corrente"];
      $chave_pix = $ongs[$i]["chave_pix"];
      $caixa_postal = $ongs[$i]["caixa_postal"];
      $foto = $ongs[$i]["ong_foto"];
    ?>
      <div class='col'>
        <div class='card'>
        <?php  
        echo"<a class='link_animal' href='u_doacoes_cont.php?ong_cnpj=$ong_cnpj'>";
        ?>
            <img src='upload/<?= $foto ?>' class='card-img-top' alt='...'>
            <div class='card-body'>
              <div class='infos'>
                <h5 class='card-title'><?= $nome_fantasia ?></h5>
              </div>
              <div>Estado: <?= $estado ?></div>
              <div>Cidade: <?= $cidade ?></div>
            </div>
        </div>
        </a>
      </div>
    <?php
    }
    ?>
  </div>
</main>
<?php
include "layout/_rodape.php";
?>