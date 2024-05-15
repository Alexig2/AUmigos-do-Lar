<?php
$ong_codigo = $_SESSION["ong_codigo"];
$conexao = conectarBanco("aumigos");
$sql = "SELECT * FROM Ong WHERE ong_codigo = $ong_codigo";
$ongs = executarSelect($conexao, $sql);
desconectarBanco($conexao);
$nome_fantasia = $ongs[0]["nome_fantasia"];
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary navbar fixed-top nav-shadow">
  <div class="container-fluid">
    <a class="navbar-brand d-flex justify-content-center" href="o_index.php?ong_codigo=<?= $_SESSION['ong_codigo'] ?>" style="font-size: 30px;">
      <img src="imagens/classica.png" alt="Logo" width="50px" height="50px" class="d-inline-block align-text-top">
      AUmigos
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="o_animais.php?ong_codigo=<?= $ong_codigo ?>">
            <div class="d-flex flex-column align-items-center">
              <img src="imagens/icons8-pegada-de-gato-100.png" style="width: 30px;">
              Animais
            </div>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="o_pedido_adocao.php?ong_codigo=<?= $ong_codigo ?>">
            <div class="d-flex flex-column align-items-center">
              <img src="imagens/icons8-teste-passado-100.png" style="width: 30px;">
              Pedidos
            </div>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="o_historico_adocao.php?ong_codigo=<?= $ong_codigo ?>">
            <div class="d-flex flex-column align-items-center">
              <img src="imagens/icons8-casinha-de-cachorro-100.png" style="width: 30px;">
              Adotados
            </div>
          </a>
        </li>
      </ul>
      <div class="me-lg-5">
        <a class="nav-link" href="o_animais_reportados.php?ong_codigo=<?= $ong_codigo ?>">
          <div class="d-flex flex-column align-items-center">
            <img src="imagens/icons8-erro-100.png" style="width: 30px;">
            Denúncias
          </div>
        </a>
      </div>
      <div class="me-lg-4 dropdown">
        <div class="btn d-flex flex-column align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="imagens/icons8-usuário-100.png" style="width: 30px;">
          <?= $nome_fantasia ?>
        </div>
        <ul class="dropdown-menu dropdown-menu-lg-end dropdown-menu-start">
          <li><a class="dropdown-item" href="o_editar.php?ong_codigo=<?= $ong_codigo ?>">Editar</a></li>
          <form action="index.php" method="POST">
            <button type="submit" class="dropdown-item btn btn-white text-danger" name="sair">Sair</button>
          </form>
        </ul>
      </div>
    </div>
  </div>
</nav>