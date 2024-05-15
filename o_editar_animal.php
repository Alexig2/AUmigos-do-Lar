<?php
$titulo_pagina = "ONG - Editar animal";
include "layout/_cabecalho.php";
include "layout/_o_navbar.php";
if (!isset($_POST["animal_salvar"])) {
  $conexao   = conectarBanco("aumigos");
  $animal_codigo = $_GET["animal_codigo"];
  $sql = "SELECT * FROM animal WHERE animal_codigo = $animal_codigo";
  $animais = executarSelect($conexao, $sql);
  $animal = $animais[0];
  $ongs = executarSelect($conexao, "SELECT * FROM Ong");
  $animais_resgatados = executarSelect($conexao, "SELECT * FROM Animal_resgatado");
  desconectarBanco($conexao);
  for ($j = 0; $j < count($ongs); $j++) {
    if ($ongs[$j]["ong_codigo"] == $animal["ong_codigo"]) {
      $ong_codigo = $ongs[$j]["ong_codigo"];
      $nome = $animal["nome"];
      $idade = $animal["idade"];
      $raca = $animal["raca"];
      $porte = $animal["porte"];
      $especie = $animal["especie"];
      $descricao = $animal["descricao"];
      $sexo = $animal["sexo"];
      $medida_idade = $animal["medida_idade"];
      $resgate_codigo = -1;
      if (($animais_resgatados[$j]["animal_codigo"] == $animal_codigo)) {
        $resgate_codigo = $animais_resgatados[$j]["resgate_codigo"];
      }
    }
  }
  if($resgate_codigo == -1){
    $resgate = "Não";
  } else {
    $resgate = "Sim";
  }
}
?>
<main>
  <br><br><br>
  <div class="container mt-5 card">
    <br>
    <div class="row">
      <div class="col-12">
        <div class="text-center">
          <h1 class="titulo2">Editar Animal</h1>
          <hr>
          <div class="fs-5 texto2">Altere as informações do animal.</div>
        </div>
      </div>
      <?php
      if (isset($_GET['excluir'])) {
      ?>
        <div class="fs-4 card-body mensagem1">
          O animal selecionado não pode ser excluído.
          Motivo: O animal faz parte de um resgate.
        </div>
      <?php
      }
      ?>
    </div>
    <div class="row card-body">
      <div class="col-6">
        <form class=" fs-4" method="POST" action="atualizar.php" enctype="multipart/form-data">
          <div class="mb-2">
            <div class="">
              <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-5">
                    <img src="upload/<?= $animal["animal_foto"] ?>" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-7">
                    <div class="card-body">
                      <h5 class="card-title"><?= $animal["nome"] ?></h5>
                      <div class="fs-6 card-text"><?= $animal["descricao"] ?></div>
                      <p class="card-text"><small class="text-body-secondary"><a class="text-body-secondary fs-6" href="o_editar_foto_animal.php?animal_codigo=<?= $animal["animal_codigo"] ?>">Alterar Foto</a></small></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= $animal["nome"] ?>">
          </div>
          <div class="mb-3">
            <label for="animal_codigo" class="form-label">Código do Animal</label>
            <input type="text" class="form-control" id="animal_codigo" name="animal_codigo" value="<?= $animal["animal_codigo"] ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="ong_codigo" class="form-label">Código da ONG</label>
            <input type="text" class="form-control" id="ong_codigo" name="ong_codigo" value="<?= $ong_codigo ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="idade" class="form-label">Idade</label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="idade_tempo"
              <?php
              if ($medida_idade == "meses") {
            ?>
                value='<?= $medida_idade ?>' checked
            <?php
              } else {
            ?>
                value='meses'
            <?php
              }
            ?>
            >
              <label class="form-check-label" for="meses">Meses</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="idade_tempo"
              <?php
              if ($medida_idade == "anos") {
            ?>
                value='<?= $medida_idade ?>' checked
            <?php
              } else {
            ?>
                value='anos'
            <?php
              }
            ?>
            >
            </div>
              <label class="form-check-label" for="anos">Anos</label>
            </div>
            <input type="number" class="form-control" id="idade" name="idade" value="<?= $animal["idade"] ?>">

          <div class="mb-3">
            <label for="resgate" class="form-label">O Animal Foi Resgatado?</label>
            <input type="text" class="form-control" id="resgate" name="resgate" value="<?= $resgate ?>" readonly>
          </div>
      </div>
      <div class="col-6 fs-4">
        <div class="mb-3">
          <label for="especie" class="form-label">Espécie</label>
          <select class="form-select" id="especie" name="especie"  value="<?= $animal["especie"] ?>">
            <option value="">Selecionar</option>
            <?php
            if($especie == 'gato'){
              ?>
              <option selected value="gato">Gato</option>
              <option value="cachorro">Cachorro</option>
              <?php
            } elseif ($especie == 'cachorro'){
              ?>
              <option value="gato">Gato</option>
              <option selected value="cachorro">Cachorro</option>
            <?php
            }
            ?>
          </select>
        
        </div>
        <div class="mb-3">
          <label for="raca" class="form-label">Raça</label>
          <input type="text" class="form-control" id="raca" name="raca" value="<?= $animal["raca"] ?>">
        </div>
        <div class="mb-3">
        <label for="porte" class="form-label">Porte</label>
          <select class="form-select" id="porte" name="porte">
            <option value="">Selecionar</option>
            <option
            <?php
            if($porte == 'pequeno'){
              ?>
              selected
              <?php
            }
            ?>            
            value="pequeno">Pequeno</option>
            <option
            <?php
            if($porte == 'medio'){
              ?>
              selected
              <?php
            }
            ?>
            value="medio">Médio</option>
            <option
            <?php
            if($porte == 'grande'){
              ?>
              selected
              <?php
            }
            ?>
            value="grande">Grande</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Sexo</label>
          <br>
          <div class="form-check form-check-inline">
            <input class='form-check-input' type='radio' name='sexo' id='femea'
            <?php
              if ($sexo == "femea") {
            ?>
                value='<?= $sexo ?>' checked
            <?php
              } else {
            ?>
                value='femea'
            <?php
              }
            ?>
            >
            <label class='form-check-label' for='femea'>
              <img class='sexo' src='imagens/femea.png' alt=''>
            </label>
          </div>
          <div class='form-check form-check-inline'>
            <input class='form-check-input' type='radio' name='sexo' id='macho'
            <?php
              if ($sexo == "macho") {
            ?>
                value='<?= $sexo ?>' checked
            <?php
              } else {
            ?>
                value='macho'
            <?php
              }
            ?>
            >
            <label class='form-check-label' for='macho'>
              <img class='sexo' src='imagens/macho.png' alt=''>
            </label>
          </div>
        </div>
        <div class="mb-3">
          <label for="descricao" class="form-label">Descrição</label>
          <textarea class="form-control" id="descricao" rows="3" name="descricao" value="<?= $animal["descricao"] ?>"><?= $animal["descricao"] ?></textarea>
        </div>
      </div>
      <button type="submit" class="mt-2 form-control btn btn-roxo" name="animal_salvar">Salvar alterações</button>
      <button type="submit" class="mt-2 form-control btn btn-roxo" name="excluir">Excluir</button>
      </form>
    </div>
  </div>
  <br><br><br><br>
</main>
<?php
include "layout/_rodape.php";
?>