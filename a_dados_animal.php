<?php
$titulo_pagina = "Anônimo - Informações do animal";
include "layout/_cabecalho.php";
include "layout/_a_navbar.php";
$conexao = conectarBanco("aumigos");
$animais = executarSelect($conexao, "SELECT * FROM Animal");
$ongs = executarSelect($conexao, "SELECT * FROM Ong");
desconectarBanco($conexao);
if (isset($_GET["animal_codigo"])) {
    $animal_codigo = $_GET["animal_codigo"];
    for ($i = 0; $i < count($animais); $i++) {
        if ($animal_codigo == $animais[$i]["animal_codigo"]) {
            for ($j = 0; $j < count($ongs); $j++) {
                if ($animais[$i]["ong_codigo"] == $ongs[$j]["ong_codigo"]) {
                    $ong_codigo = $ongs[$j]["ong_codigo"];
                    $ong_cnpj = $ongs[$j]["ong_cnpj"];
                }
            }
            $nome = $animais[$i]["nome"];
            $idade = $animais[$i]["idade"];
            $raca = $animais[$i]["raca"];
            $porte = $animais[$i]["porte"];
            $especie = $animais[$i]["especie"];
            $descricao = $animais[$i]["descricao"];
            $sexo = $animais[$i]["sexo"];
            $animal_foto = $animais[$i]["animal_foto"];
            $medida_idade = $animais[$i]["medida_idade"];
        }
    }
    for ($i = 0; $i < count($ongs); $i++) {
        if ($ong_cnpj == $ongs[$i]["ong_cnpj"]) {
            $cidade = $ongs[$i]["cidade"];
            $nome_fantasia = $ongs[$i]["nome_fantasia"];
            $estado = $ongs[$i]["estado"];
            $endereco = $ongs[$i]["endereco"];
            $email_ong = $ongs[$i]["email_ong"];
            $descricao = $ongs[$i]["descricao"];
            $senha_ong = $ongs[$i]["senha_ong"];
            $agencia = $ongs[$i]["agencia"];
            $conta_corrente = $ongs[$i]["conta_corrente"];
            $chave_pix = $ongs[$i]["chave_pix"];
            $caixa_postal = $ongs[$i]["caixa_postal"];
        }
    }
}
?>
<br>
<br>
<main class="container mt-5">
    <div class="card mb-3 col-12">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="upload/<?= $animal_foto ?>" class="img-fluid rounded-start m-1" alt="...">
                <div class="ms-2 d-flex flex-column">
                    <label class="card-text"><small><?= $cidade ?>, <?= $estado ?></small></label>
                    <a href="a_ver_ong.php?ong_codigo=<?= $ong_codigo ?>"><label class="card-text"><small><?= $nome_fantasia ?></small></label></a>

                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title d-flex justify-content-between"><?= $nome ?>
                        <?php
                        if ($sexo == "macho") {
                            echo "<img src='imagens/homem.svg'>";
                        } elseif ($sexo == "femea") {
                            echo "<img src='imagens/mulher.svg'>";
                        }
                        ?></h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Idade: <?= $idade ?> <?= $medida_idade ?></li>
                        <li class="list-group-item">Raça: <?= $raca ?></li>
                        <li class="list-group-item">Porte: 
                            <?php
                        if($porte == 'pequeno'){
                            ?>
                        Pequeno
                        <?php
                        } elseif ($porte == 'medio'){
                            ?>
                        Médio
                        <?php
                        } elseif ($porte == 'grande'){
                            ?>
                        Grande
                        <?php
                        }
                        ?>
                        </li>
                        <li class="list-group-item">Espécie: 
                        <?php
                        if($especie == 'cachorro'){
                            ?>
                        Cachorro
                        <?php
                        } elseif ($especie == 'gato'){
                            ?>
                        Gato
                        <?php
                        } 
                        ?>
                    </li>
                        <li class="list-group-item"><?= $descricao ?></li>
                    </ul>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" onclick="window.location.href='u_cadastro.php'">Adotar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include "layout/_rodape.php";
?>