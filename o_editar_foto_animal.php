<?php
$titulo_pagina = "ONG - Editar Foto do Animal";
include "layout/_cabecalho.php";
include "layout/_o_navbar.php";
if (isset($_GET["animal_codigo"])) {
    $animal_codigo = $_GET["animal_codigo"];
    $conexao   = conectarBanco("aumigos");
    $sql = "SELECT * FROM Animal WHERE animal_codigo = $animal_codigo";
    $dados = executarSelect($conexao, $sql);
    desconectarBanco($conexao);
    $animal = $dados[0];
    $_SESSION["animal_codigo"] = $animal_codigo;
} elseif (isset($_POST["salvar"])) {
    $animal_codigo = $_SESSION["animal_codigo"];
    $conexao   = conectarBanco("aumigos"); // conecta no banco pelo nome do banco
    $foto = realizarUploadImagemServidor();
    $sql = "UPDATE Animal SET animal_foto = '$foto' WHERE animal_codigo = $animal_codigo";
    $atualizacao = executarUpdate($conexao, $sql);
    header("location: o_editar_animal.php?animal_codigo=" . $animal_codigo);
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
                <img src="upload/<?= $animal["animal_foto"] ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"> <?= $animal["nome"] ?> </h5>
                    <p class="card-text"> <?= $animal["especie"] ?> </p>
                    <form action="o_editar_foto_animal.php" method="POST" enctype="multipart/form-data">
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