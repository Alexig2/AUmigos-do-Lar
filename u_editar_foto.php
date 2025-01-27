<?php
$titulo_pagina = "Usuario - Editar Foto";
include "layout/_cabecalho.php";
include "layout/_u_navbar.php";
if (isset($_GET["usuario_codigo"])) {
    $usuario_codigo = $_GET["usuario_codigo"];
    $conexao   = conectarBanco("aumigos");
    $sql = "SELECT * FROM Usuario WHERE usuario_codigo = $usuario_codigo";
    $dados = executarSelect($conexao, $sql);
    desconectarBanco($conexao);
    $usuario = $dados[0];
} elseif (isset($_POST["salvar"])) {
    $usuario_codigo = $_SESSION["usuario_codigo"]; // exemplo - obtem codigo do participante pela sessao
    $conexao   = conectarBanco("aumigos"); // conecta no banco pelo nome do banco
    $foto = realizarUploadImagemServidor();
    $sql = "UPDATE Usuario SET usuario_foto = '$foto' WHERE usuario_codigo = $usuario_codigo";
    $atualizacao = executarUpdate($conexao, $sql);
    header("location: u_editar.php?usuario_codigo=" . $_SESSION["usuario_codigo"]);
}
?>
<main>
    <br><br><br><br><br>
    <div class="container card mb-3">
        <div class="row">
            <div class="col-12">
                <div class="mt-3 fs-4">
                    <h1 class="text-center titulo1">Alterar Foto</h1>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="card">
                <img src="upload/<?= $usuario["usuario_foto"] ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"> <?= $usuario["nome"] ?> </h5>
                    <p class="card-text"> <?= $usuario["email"] ?> </p>
                    <form action="u_editar_foto.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="imagem" class="form-label">Nova Foto</label>
                            <input class="form-control" type="file" name="imagem" accept="image/*" />
                        </div>
                        <div class="mb-3">
                            <div class="">
                                <input type="submit" class="form-control btn btn-roxo" id="salvar" name="salvar" value="Salvar Alterações">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
</main>
<?php
include "layout/_rodape.php";
?>