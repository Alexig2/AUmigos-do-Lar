<?php
$titulo_pagina = "Usuário - Editar Perfil";
include "layout/_cabecalho.php";
include "layout/_o_navbar.php";
$conexao = conectarBanco("aumigos");
$usuario_codigo = $_GET["usuario_codigo"];
$sql = "SELECT * FROM Usuario WHERE usuario_codigo = $usuario_codigo";
$usuarios = executarSelect($conexao, $sql);
desconectarBanco($conexao);
$usuario = $usuarios[0];
?>
<main>
  <br><br><br>
  <div class="container mt-5 card">
    <br>
    <div class="row">
      <div class="col-12">
        <div class="text-center">
          <h1 class="titulo2">Visualizar Dados do Usuário</h1>
          <hr>
          <div class="fs-5 texto2">Analise as informações do perfil do usuário.</div>
        </div>
      </div>
    </div>
    <div class="row card-body">
      <div class="col-6">
        <div class="mb-2">
          <div class="">
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-5">
                  <img src="upload/<?= $usuario["usuario_foto"] ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-7">
                  <div class="card-body">
                    <h5 class="card-title"><?= $usuario["nome"] ?></h5>
                    <div class="fs-6 card-text"><?= $usuario["sobrenome"] ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" value="<?= $usuario["nome"] ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="sobrenome" class="form-label">Sobrenome</label>
          <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="<?= $usuario["sobrenome"] ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="usuario_codigo" class="form-label">Código</label>
          <input type="text" class="form-control" id="usuario_codigo" name="usuario_codigo"
            value="<?= $usuario["usuario_codigo"] ?>" readonly>
        </div>

      </div>
      <div class="col-6 fs-4">
        <div class="mb-3">
          <label for="data_nasc" class="form-label">Data de Nascimento</label>
          <input type="text" class="form-control" id="data_nasc" name="data_nasc" value="<?= $usuario["data_nasc"] ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Digite um e-mail"
            value="<?= $usuario["email"] ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="cidade" class="form-label">Cidade</label>
          <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite sua cidade"
            value="<?= $usuario["cidade"] ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="estado" class="form-label">Estado</label>
          <input type="text" class="form-control" id="estado" name="estado" placeholder="Digite seu estado"
            value="<?= $usuario["estado"] ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="usuario_cpf" class="form-label">CPF</label>
          <input type="text" class="form-control" id="usuario_cpf" name="usuario_cpf" placeholder="Digite seu CPF"
            value="<?= $usuario["usuario_cpf"] ?>" readonly>
        </div>
      </div>
    </div>
  </div>
  <br><br><br><br>
</main>
<?php
include "layout/_rodape.php";
?>