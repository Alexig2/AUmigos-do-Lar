<?php
$usuario_codigo = $_SESSION["usuario_codigo"];
$conexao = conectarBanco("aumigos");
$sql = "SELECT * FROM Usuario WHERE usuario_codigo = $usuario_codigo";
$usuarios = executarSelect($conexao, $sql);
desconectarBanco($conexao);
$nome = $usuarios[0]["nome"];
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary navbar fixed-top nav-shadow">
  <div class="container-fluid">
    <a class="navbar-brand d-flex justify-content-center" href="u_index.php?usuario_codigo=<?= $usuario_codigo ?>" style="font-size: 30px;">
      <img src="imagens/classica.png" alt="Logo" width="50px" height="50px" class="d-inline-block align-text-top">
      AUmigos
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="u_animais.php?usuario_codigo=<?= $usuario_codigo ?>">
            <div class="d-flex flex-column align-items-center">
              <img src="imagens/icons8-pegada-de-gato-100.png" style="width: 30px;">
              Animais
            </div>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="u_doacoes.php?usuario_codigo=<?= $usuario_codigo ?>">
            <div class="d-flex flex-column align-items-center">
              <img src="imagens/icons8-receber-dinheiro-100.png" style="width: 30px;">
              Ajudar ONGS
            </div>
          </a>
        </li>
      </ul>
      <div class="ms-lg-auto me-lg-4">
        <a class="nav-link" href="u_denunciar.php?usuario_codigo=<?= $usuario_codigo ?>">
          <div class="d-flex flex-column align-items-center">
            <img src="imagens/icons8-erro-100.png" style="width: 30px;">
            Denúnciar
          </div>
        </a>
      </div>
      <div class="ms-lg-auto me-lg-4">
        <a class="nav-link" href="u_notificacoes.php?usuario_codigo=<?= $usuario_codigo ?>">
          <div class="d-flex flex-column align-items-center">
            <img src="imagens/icons8-lembrete-de-compromissos-100.png" style="width: 30px;">
            Notificações
          </div>
        </a>
      </div>
      <div class="me-lg-4 dropdown">
        <div class="btn d-flex flex-column align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="imagens/icons8-usuário-100.png" style="width: 30px;">
          <?= $nome ?>
        </div>
        <ul class="dropdown-menu dropdown-menu-lg-end dropdown-menu-start">
          <li><a class="dropdown-item" href="u_editar.php?usuario_codigo=<?= $usuario_codigo ?>">Editar</a></li>
          <form action="index.php" method="POST">
            <button type="submit" class="dropdown-item btn btn-white text-danger" name="sair">Sair</button>
          </form>
        </ul>
      </div>
    </div>
  </div>
</nav>