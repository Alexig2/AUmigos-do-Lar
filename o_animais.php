<?php
$titulo_pagina = "ONG - Animais";
include "layout/_cabecalho.php";
include "layout/_o_navbar.php";
$conexao = conectarBanco("aumigos");
$animais = executarSelect($conexao, "SELECT * FROM Animal");
desconectarBanco($conexao);
?>
<br><br><br>
<main class="container">
  <!--inicio dos cards de apresentação-->
  <div class="row row-cols-1 row-cols-md-5 g-4 mt-3">
    <div class="col">
      <a class="card card-body" href="o_adicionar_animal.php">
        <div class="card-body">
          <img src="imagens/mais.png" class="card-img-top" alt="...">
        </div>
      </a>
    </div>
    <?php
    for ($i = 0; $i < count($animais); $i++) {
      $animal_codigo = $animais[$i]["animal_codigo"];
      $ong_codigo = $animais[$i]["ong_codigo"];
      $nome = $animais[$i]["nome"];
      $idade = $animais[$i]["idade"];
      $raca = $animais[$i]["raca"];
      $porte = $animais[$i]["porte"];
      $especie = $animais[$i]["especie"];
      $descricao = $animais[$i]["descricao"];
      $sexo = $animais[$i]["sexo"];
      $animal_foto = 'imagens/icons8-pegada-de-gato-100.png';
      if (isset($animais[$i]["animal_foto"])) {
        $animal_foto = $animais[$i]["animal_foto"];
      }
    ?>
      <div class='col'>
        <div class='card'>
          <a class="link_animal" href="o_editar_animal.php?animal_codigo=<?= $animal_codigo ?>">
            <img src='upload/<?= $animal_foto ?>' class='card-img-top' alt='...'>
            <div class='card-body'>
              <div class='infos'>
                <h5 class='card-title'><?= $nome ?></h5>
                <div class='sexo'>
                  <?php
                  if ($sexo == "macho") {
                  ?>
                    <img src='imagens/homem.svg'>
                  <?php
                  } elseif ($sexo == "femea") {
                  ?>
                    <img src='imagens/mulher.svg'>
                  <?php
                  }
                  ?>
                </div>
              </div>
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