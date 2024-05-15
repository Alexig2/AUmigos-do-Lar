<?php
$titulo_pagina = "ONG - Editar Perfil";
include "layout/_cabecalho.php";
include "layout/_o_navbar.php";
if (!isset($_POST["o_salvar"])) {
  $conexao = conectarBanco("aumigos");
  $ong_codigo = $_GET["ong_codigo"];
  $sql = "SELECT * FROM Ong WHERE ong_codigo = $ong_codigo";
  $ongs = executarSelect($conexao, $sql);
  desconectarBanco($conexao);
  $ong = $ongs[0];
}
?>
<main>
  <br><br><br>
  <div class="container mt-5 card">
    <br>
    <div class="row">
      <div class="col-12">
        <div class="text-center">
          <h1 class="titulo2">Editar Perfil</h1>
          <hr>
          <div class="fs-5 texto2">Altere as informações da sua ONG.</div>
        </div>
      </div>
      <?php
      if (isset($_GET['o_salvar'])) {
      ?>
        <div class="fs-4 card-body mensagem1">
          Perfil atualizado.
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
                    <img src="upload/<?= $ong["ong_foto"] ?>" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-7">
                    <div class="card-body">
                      <h5 class="card-title"><?= $ong["nome_fantasia"] ?></h5>
                      <div class="fs-6 card-text"><?= $ong["descricao"] ?></div>
                      <p class="card-text"><small class="text-body-secondary"><a class="text-body-secondary fs-6" href="o_editar_foto.php?ong_codigo=<?= $ong["ong_codigo"] ?>">Alterar Foto</a></small></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="nome_fantasia" class="form-label">Nome da Organização</label>
            <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" value="<?= $ong["nome_fantasia"] ?>">
          </div>
          <div class="mb-3">
            <label for="ong_codigo" class="form-label">Código</label>
            <input type="text" class="form-control" id="ong_codigo" name="ong_codigo" value="<?= $ong["ong_codigo"] ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="email_ong" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email_ong" name="email_ong" placeholder="Digite o e-mail" value="<?= $ong["email_ong"] ?>">
          </div>
          <div class="mb-3">
            <label for="senha_ong" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha_ong" name="senha_ong" placeholder="Digite a senha" value="<?= $ong["senha_ong"] ?>">
          </div>

          <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" rows="3" name="descricao" value="<?= $ong["descricao"] ?>"><?= $ong["descricao"] ?></textarea>
          </div>
      </div>
      <div class="col-6 fs-4">
        <div class="mb-3">
          <label for="ong_cnpj" class="form-label">CNPJ</label>
          <input type="text" class="form-control" id="ong_cnpj" name="ong_cnpj" value="<?= $ong["ong_cnpj"] ?>">
        </div>
        <div class="mb-3">
          <label for="cidade" class="form-label">Cidade</label>
          <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite a cidade" value="<?= $ong["cidade"] ?>">
        </div>
        <div class="mb-4">
          <label for="estado" class="form-label">Estado</label>
          <input type="text" class="form-control" id="estado" name="estado" placeholder="Digite o estado" value="<?= $ong["estado"] ?>">
        </div>
        <div class="mb-3">
          <label for="endereco" class="form-label">Endereço</label>
          <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite o endereço" value="<?= $ong["endereco"] ?>">
        </div>
        <div class="mb-3">
          <label for="agencia" class="form-label">Agência</label>
          <input type="text" class="form-control" id="agencia" name="agencia" placeholder="Digite a agência" value="<?= $ong["agencia"] ?>">
        </div>
        <div class="mb-3">
          <label for="conta_corrente" class="form-label">Conta Corrente</label>
          <input type="text" class="form-control" id="conta_corrente" name="conta_corrente" placeholder="Digite a conta corrente" value="<?= $ong["conta_corrente"] ?>">
        </div>
        <div class="mb-3">
          <label for="caixa_postal" class="form-label">Caixa Postal</label>
          <input type="text" class="form-control" id="caixa_postal" name="caixa_postal" placeholder="Digite a caixa postal" value="<?= $ong["caixa_postal"] ?>">
        </div>
        <div class="">
          <label for="chave_pix" class="form-label">Chave PIX</label>
          <input type="text" class="form-control" id="chave_pix" name="chave_pix" placeholder="Digite uma chave PIX" value="<?= $ong["chave_pix"] ?>">
        </div>
      </div>
      <button type="submit" class="mt-2 form-control btn btn-roxo" name="o_salvar">Salvar alterações</button>
      </form>
    </div>
  </div>
  <br><br><br><br>
</main>
<?php
include "layout/_rodape.php";
?>