<?php
$titulo_pagina = "Faça Login";
include "layout/_cabecalho.php";
include "layout/_a_navbar.php";
?>
<main class="container mt-5">
  <br><br><br>
  <div class="row">
    <div class="col-12 card card-body">
      <br>
      <div class="text-center">
        <h1 class="titulo2">Faça Login</h1>
        <hr>
        <div class="fs-5 texto2">Bem vindo(a) de volta!</div>
      </div>
      <br>
      <form action="autenticar.php" class="form-control card-body fs-4" method="POST">
        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Insira o seu email" required>
        </div>
        <div class="mb-3">
          <label for="senha" class="form-label">Senha:</label>
          <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
        </div>
        <br>
        <div id="botao" mt-3>
          <div class="row">
            <div class="col-6">
            <a class="link_geral" href="u_cadastro.php">Cadastrar-se como Usuário</a>
              <br><br>
              <button type="submit" class="btn btn-laranja form-control" name="u_entrar">Entrar como usuário</button>
            </div>
            <div class="col-6">
            <a class="link_geral" href="o_cadastro.php">Cadastrar-se como ONG</a>
              <br><br>
              <button type="submit" class="btn btn-laranja form-control" name="o_entrar">Entrar como ONG</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <br><br><br><br><br>
</main>
<?php
include "layout/_rodape.php";
?>