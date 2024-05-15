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
      <h2 class="text-center titulo1">Informe seus contatos</h2>
      <br>
      <div class="fs-4">
        <form class="form-control fs-4" action="u_adotando_cont.php" method="POST">
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" required>
          </div>
          <div class="mb-3">
            <label for="conf_email" class="form-label">Confirme o email</label>
            <input type="email" class="form-control" id="conf_email" required>
          </div>
          <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" required>
          </div>
          <div class="mb-3">
            <label for="conf_telefone" class="form-label">Confirme o telefone</label>
            <input type="text" class="form-control" id="conf_telefone" required>
          </div>
      </div>
    </div>
    <div class="col-6 card-body">
      <h2 class="text-center titulo1">Declaração do pedido</h2>
      <br>
      <div class="card card-body">
        <div class="texto1 fs-4">Declaro responsabilidade sobre a veracidade dos dados presentes no meu perfil de usuário e contatos informados.</div>
        <br><br><br><br><br>
        <div class="fs-4 mb-2 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
          <label class="form-check-label" for="exampleCheck1">Concordo com todas as afirmações acima</label>
        </div>
        <a href="upload/doc.pdf" class="link_roxo text-center fs-4">Clique aqui para fazer o dowload do termo</a>
      </div>
      <br>
      <?php
      $_SESSION["animal_codigo"] = $_GET["animal_codigo"];
      ?>
      <button type="submit" class="btn btn-roxo form-control">Continuar</button>
      </form>
    </div>
  </div>
  <br><br><br><br><br><br><br><br><br><br>
</main>
<?php
include "layout/_rodape.php";
?>