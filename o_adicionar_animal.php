<?php
$titulo_pagina = "ONG - Adicionar animal";
include "layout/_cabecalho.php";
include "layout/_o_navbar.php";
?>
<main>
  <br><br><br>
  <div class="container mt-5 card">
    <br>
    <div class="row">
      <div class="col-12">
        <div class="text-center">
          <h1 class="titulo2">Adicionar Animal</h1>
          <hr>
          <div class="fs-5 texto2">Adicione um animal para adoção.</div>
        </div>
      </div>
      <?php
      if (isset($_GET['cadastrado'])) {
      ?>
        <div class="fs-4 card-body mensagem1">
          Animal cadastrado com sucesso.
        </div>
      <?php
      }
      ?>
    </div>
    <div class="row card-body">
      <div class="col-6">
        <form class=" fs-4" method="GET" action="o_adicionar_animal.php" enctype="multipart/form-data">
          <div class="mb-2">
            <div class="">
              <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-3 card-body">
                    <img src="imagens/icons8-pegada-de-gato-adicionar-100.png " class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-9">
                    <div class="card-body">
                      <h5 class="card-title">Nome</h5>
                      <p class="fs-6 card-text">Descrição</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
          </div>
          <div class="mb-3">
            <label for="idade" class="form-label">Idade</label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="medida_idade" value="meses" required>
              <label class="form-check-label" for="meses">Meses</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="medida_idade" value="anos" required>
              <label class="form-check-label" for="anos">Anos</label>
            </div>
            <input type="number" class="form-control" id="idade" name="idade" required>
          </div>
          <div class="mb-3">
            <label for="resgate" class="form-label">O animal foi resgatado?</label>
            <select class="form-select" id="resgate" name="resgate" required>
              <option value="" selected>Selecionar</option>
              <option value="sim">Sim</option>
              <option value="nao">Não</option>
            </select>
          </div>
      </div>
      <div class="col-6 fs-4">
        <div class="mb-3">
          <label for="especie" class="form-label">Espécie</label>
          <select class="form-select" id="especie" name="especie" required>
            <option value="" selected>Selecionar</option>
            <option value="gato">Gato</option>
            <option value="cachorro">Cachorro</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="raca" class="form-label">Raça</label>
          <input type="text" class="form-control" id="raca" name="raca" required>
        </div>
        <div class="mb-3">
          <label for="porte" class="form-label">Porte</label>
          <select class="form-select" id="porte" name="porte" required>
            <option value="" selected>Selecionar</option>
            <option value="pequeno">Pequeno</option>
            <option value="medio">Médio</option>
            <option value="grande">Grande</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Sexo</label>
          <br>
          <div class="form-check form-check-inline">
            <input class='form-check-input' type='radio' name='sexo' id='femea' value="femea" required>
            <label class='form-check-label' for='femea'>
              <img class='sexo' src='imagens/femea.png' alt=''>
            </label>
          </div>
          <div class='form-check form-check-inline'>
            <input class='form-check-input' type='radio' name='sexo' id='macho' value="macho" required>
            <label class='form-check-label' for='macho'>
              <img class='sexo' src='imagens/macho.png' alt=''>
            </label>
          </div>
        </div>
        <div class="mb-3">
          <label for="descricao" class="form-label">Descrição</label>
          <textarea class="form-control" id="descricao" rows="3" name="descricao"></textarea>
        </div>
      </div>
      <button type="submit" class="mt-2 form-control btn btn-roxo" name="enviar">Adicionar novo animal</button>
      </form>
    </div>
  </div>
  <?php
  print_r($_GET);
  if (isset($_GET["enviar"])) {
    $conexao = conectarBanco("aumigos");
    $ong_codigo = $_SESSION['ong_codigo'];
    $nome = $_GET["nome"];
    $idade = $_GET["idade"];
    $medida_idade = $_GET["medida_idade"];
    $raca = $_GET["raca"];
    $porte = $_GET["porte"];
    $especie = $_GET["especie"];
    $descricao = $_GET["descricao"];
    $sexo = $_GET["sexo"];
    $sql = "INSERT INTO Animal(ong_codigo, nome, idade, raca, porte, especie, descricao, sexo, medida_idade, animal_disponi)
          VALUES ('$ong_codigo', '$nome', $idade, '$raca', '$porte', '$especie', '$descricao', '$sexo', '$medida_idade', '1')";
    executarInsert($conexao, $sql);
    desconectarBanco($conexao);

    echo "<script>window.location.href = 'o_adicionar_animal.php?cadastrado=true'</script>";
  }
  ?>
  <br><br><br><br>
</main>
<?php
include "layout/_rodape.php";
?>