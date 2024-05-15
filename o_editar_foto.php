<?php
$titulo_pagina = "ONG - Editar Foto";
include "layout/_cabecalho.php";
include "layout/_o_navbar.php";
if (isset($_GET["ong_codigo"])) {
    $ong_codigo = $_GET["ong_codigo"];
    $conexao   = conectarBanco("aumigos");
    $sql = "SELECT * FROM Ong WHERE ong_codigo = $ong_codigo";
    $dados = executarSelect($conexao, $sql);
    desconectarBanco($conexao);
    $ong = $dados[0];
} elseif (isset($_POST["salvar"])) {
    $ong_codigo = $_SESSION["ong_codigo"]; // exemplo - obtem codigo do participante pela sessao
    $conexao   = conectarBanco("aumigos"); // conecta no banco pelo nome do banco
    $foto = realizarUploadImagemServidor();
    $sql = "UPDATE Ong SET ong_foto = '$foto' WHERE ong_codigo = $ong_codigo";
    $atualizacao = executarUpdate($conexao, $sql);
    header("location: o_editar.php?ong_codigo=" . $_SESSION["ong_codigo"]);
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
                <img src="upload/<?= $ong["ong_foto"] ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"> <?= $ong["nome_fantasia"] ?> </h5>
                    <p class="card-text"> <?= $ong["email_ong"] ?> </p>
                    <form action="o_editar_foto.php" method="POST" enctype="multipart/form-data">
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
</main>
<?php
include "layout/_rodape.php";
?>