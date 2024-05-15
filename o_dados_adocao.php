<?php
$titulo_pagina = "ONG - Dados da Adoção";
include "layout/_cabecalho.php";
include "layout/_o_navbar.php";
if (isset($_GET["adocao_codigo"])) {
    $adocao_codigo = $_GET["adocao_codigo"];
    $conexao = conectarBanco("aumigos");
    $sql = "SELECT U.usuario_codigo usuario_codigo, U.nome nome_usuario, A.nome nome_animal, data_adocao,
    A.ong_codigo ong_codigo, U.usuario_cpf usuario_cpf, A.animal_codigo animal_codigo,
    P.pedido_codigo pedido_codigo, termo, comprovante_endereco, data1, data2, data3,
    horario1, horario2, horario3, documento_foto
    FROM Pedido_adocao P, Adocao AD, Animal A, Usuario U, Ong O
    WHERE P.pedido_codigo = AD.pedido_codigo AND AD.adocao_codigo = $adocao_codigo";
    $adocoes = executarSelect($conexao, $sql);
    desconectarBanco($conexao, $sql);
    $adocao = $adocoes[0]; // salva em variavel local

    $ong_codigo = $adocao["ong_codigo"];
    $pedido_codigo = $adocao["pedido_codigo"];
    $usuario_cpf = $adocao["usuario_cpf"];
    $nome_usuario = $adocao["nome_usuario"];
    $nome_animal = $adocao["nome_animal"];
    $animal_codigo = $adocao["animal_codigo"];
    $termo = $adocao["termo"];
    $comprovante_endereco = $adocao["comprovante_endereco"];
    $data1 = $adocao["data1"];
    $data2 = $adocao["data2"];
    $data3 = $adocao["data3"];
    $horario1 = $adocao["horario1"];
    $horario2 = $adocao["horario2"];
    $horario3 = $adocao["horario3"];
    $documento_foto = $adocao["documento_foto"];
}
?>
<main class="container">
    <br><br><br><br>
    <div class="col-12 card">
        <div class="card-body fs-4">
            <div class="row">
                <div class='col-6'>
                    <br>
                    <h2 class="titulo1 text-center">Dados da Adoção</h2>
                    <hr>
                    <ul class='list-group'>
                        <li class='list-group-item' value="<?= $nome_usuario ?>" name="nome_usuario">Nome do usuário:
                        <a class="link_geral" href="o_ver_usuario.php?usuario_codigo=<?= $adocao["usuario_codigo"] ?>"> <?= $nome_usuario ?> </a>
                        </li>
                        <li class='list-group-item' value="<?= $nome_animal ?>" name="nome_animal">Nome do animal:
                            <?= $nome_animal ?>
                        </li>
                        <li class='list-group-item' value="<?= $termo ?>" name="termo">Termo:
                            <?= $termo ?>
                        </li>
                        <li class='list-group-item' value="<?= $comprovante_endereco ?>" name="comprovante_endereco">Comprovante de endereço:
                            <?= $comprovante_endereco ?>
                        </li>
                        <li class='list-group-item' value="<?= $documento_foto ?>" name="documento_foto">Documento com foto:
                            <?= $documento_foto ?>
                        </li>
                    </ul>
                </div>
                <div class="col-6">
                    <br><br><br>
                    <ul class='list-group'>

                        <li class='list-group-item' value="<?= $data1 ?>" name="data1">Data 1:
                            <?= $data1 ?>
                        </li>
                        <li class='list-group-item' value="<?= $data2 ?>" name="data2">Data 2:
                            <?= $data2 ?>
                        </li>
                        <li class='list-group-item' value="<?= $data3 ?>" name="data3">Data 3:
                            <?= $data3 ?>
                        </li>
                        <li class='list-group-item' value="<?= $horario1 ?>" name="horario1">Horário 1:
                            <?= $horario1 ?>
                        </li>
                        <li class='list-group-item' value="<?= $horario2 ?>" name="horario2">Horário 2:
                            <?= $horario2 ?>
                        </li>
                        <li class='list-group-item' value="<?= $horario3 ?>" name="horario3">Horário 3:
                            <?= $horario3 ?>
                        </li>
                    </ul>
                    <br>

                    <br><br>
                </div>
            </div>
        </div>
        <br>
    </div>
</main>
<?php
include "layout/_rodape.php";
?>