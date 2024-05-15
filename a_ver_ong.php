<?php
$titulo_pagina = "Anônimo - Visualizar ONG";
include "layout/_cabecalho.php";
include "layout/_a_navbar.php";
$conexao = conectarBanco("aumigos");
$ong_codigo = $_GET["ong_codigo"];
$sql = "SELECT * FROM Ong WHERE ong_codigo = $ong_codigo";
$ongs = executarSelect($conexao, $sql);
desconectarBanco($conexao);
$ong = $ongs[0];
?>
<main>
  <br><br><br>
  <div class="container mt-5 card">
    <br>
    <div class="row">
      <div class="col-12">
        <div class="text-center">
          <h1 class="titulo2">Sobre a ONG</h1>
          <hr>
          <div class="fs-5 texto2">Analise as informações da ONG.</div>
        </div>
      </div>
    </div>
    <div class="row card-body">
      <div class="col-6 fs-4">
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
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="email_ong" class="form-label">E-mail</label>
          <input type="email" class="form-control" id="email_ong" name="email_ong" placeholder="Digite o e-mail" value="<?= $ong["email_ong"] ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="ong_cnpj" class="form-label">CNPJ</label>
          <input type="text" class="form-control" id="ong_cnpj" name="ong_cnpj" value="<?= $ong["ong_cnpj"] ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="cidade" class="form-label">Cidade</label>
          <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite a cidade" value="<?= $ong["cidade"] ?>" readonly>
        </div>
        <div class="mb-4">
          <label for="estado" class="form-label">Estado</label>
          <input type="text" class="form-control" id="estado" name="estado" placeholder="Digite o estado" value="<?= $ong["estado"] ?>" readonly>
        </div>
      </div>
      <div class="col-6 fs-4">
        <div class="mb-3">
          <label for="endereco" class="form-label">Endereço</label>
          <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite o endereço" value="<?= $ong["endereco"] ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="agencia" class="form-label">Agência</label>
          <input type="text" class="form-control" id="agencia" name="agencia" placeholder="Digite a agência" value="<?= $ong["agencia"] ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="conta_corrente" class="form-label">Conta Corrente</label>
          <input type="text" class="form-control" id="conta_corrente" name="conta_corrente" placeholder="Digite a conta corrente" value="<?= $ong["conta_corrente"] ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="caixa_postal" class="form-label">Caixa Postal</label>
          <input type="text" class="form-control" id="caixa_postal" name="caixa_postal" placeholder="Digite a caixa postal" value="<?= $ong["caixa_postal"] ?>" readonly>
        </div>
        <div class="">
          <label for="chave_pix" class="form-label">Chave PIX</label>
          <input type="text" class="form-control" id="chave_pix" name="chave_pix" placeholder="Digite uma chave PIX" value="<?= $ong["chave_pix"] ?>" readonly>
        </div>
      </div>
    </div>
  </div>
  <br><br><br><br>
</main>
<?php
include "layout/_rodape.php";
?>