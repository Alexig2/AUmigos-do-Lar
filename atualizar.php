
<?php
// script de autenticacao, inicio da sessao e redirecionamento
include "funcoes/_funcoesGerais.php";
include "funcoes/_funcoesConfigBanco.php";
if (isset($_POST["o_salvar"])) {
    $ong_codigo = $_POST['ong_codigo'];
    $ong_cnpj = $_POST["ong_cnpj"];
    $nome_fantasia = $_POST["nome_fantasia"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $endereco = $_POST["endereco"];
    $descricao = $_POST["descricao"];
    $email_ong = $_POST["email_ong"];
    $senha_ong = $_POST["senha_ong"];
    $agencia = $_POST["agencia"];
    $conta_corrente = $_POST["conta_corrente"];
    $chave_pix = $_POST["chave_pix"];
    $caixa_postal = $_POST["caixa_postal"];

    $conexao = conectarBanco("aumigos");

    $sql = "SELECT * FROM Ong WHERE ong_codigo = $ong_codigo";

    $dados = executarSelect($conexao, $sql);
    if (count($dados) > 0) { // credenciais corretas - iniciar sessao e salvar dados do usuario
        $ong = $dados[0]; // salva dados do participante na variavel $part
        $conexao = conectarBanco("aumigos");
        $sql = "UPDATE Ong
        SET ong_cnpj = '$ong_cnpj', nome_fantasia = '$nome_fantasia', cidade = '$cidade', estado = '$estado', endereco = '$endereco', descricao = '$descricao', email_ong = '$email_ong', senha_ong = '$senha_ong', agencia = '$agencia', conta_corrente = '$conta_corrente', chave_pix = '$chave_pix', caixa_postal = '$caixa_postal'
        WHERE ong_codigo = $ong_codigo";
        $dados = executarUpdate($conexao, $sql);
        session_destroy();
        desconectarBanco($conexao);
        session_start();    // habilita inicio da sessao e salva dados desejados na variavel de sessao
        $_SESSION["sessao_iniciada"] = true;
        $_SESSION["ong_codigo"] = $ong["ong_codigo"];
        $_SESSION["email_ong"] = $ong["email_ong"];
        $_SESSION["nome_fantasia"] = $ong["nome_fantasia"];

        header("location: o_editar.php?ong_codigo=$ong_codigo&o_salvar=");
    }
} elseif (isset($_POST["u_salvar"])) {

    $usuario_codigo = $_POST['usuario_codigo'];
    $data_nasc = $_POST["data_nasc"];
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $usuario_cpf = $_POST["usuario_cpf"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $conexao = conectarBanco("aumigos");

    $sql = "SELECT * FROM Usuario WHERE usuario_codigo = $usuario_codigo";

    $u_dados = executarSelect($conexao, $sql);
    if (count($u_dados) > 0) { // credenciais corretas - iniciar sessao e salvar dados do usuario
        $usuario = $u_dados[0]; // salva dados do participante na variavel $part

        $conexao = conectarBanco("aumigos");
        $sql = "UPDATE Usuario
        SET data_nasc = '$data_nasc', nome = '$nome', sobrenome = '$sobrenome', cidade = '$cidade', estado = '$estado', usuario_cpf = '$usuario_cpf', email = '$email', senha = '$senha'
        WHERE usuario_codigo = $usuario_codigo";
        $u_dados = executarUpdate($conexao, $sql);
        session_destroy();
        desconectarBanco($conexao);
        session_start();    // habilita inicio da sessao e salva dados desejados na variavel de sessao
        $_SESSION["sessao_iniciada"] = true;
        $_SESSION["usuario_codigo"] = $usuario["usuario_codigo"];
        $_SESSION["email"] = $usuario["email"];
        $_SESSION["nome"] = $usuario["nome"];

        header("location: u_editar.php?usuario_codigo=$usuario_codigo&u_salvar=");
    }
} elseif (isset($_POST["animal_salvar"])) {
    $ong_codigo = $_POST["ong_codigo"];
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $raca = $_POST["raca"];
    $porte = $_POST["porte"];
    $especie = $_POST["especie"];
    $descricao = $_POST["descricao"];
    $sexo = $_POST["sexo"];
    $animal_codigo = $_POST["animal_codigo"];
    $resgate = $_POST["resgate"];

    $conexao = conectarBanco("aumigos");

    $sql = "SELECT * FROM Animal WHERE animal_codigo = $animal_codigo";

    $animal_dados = executarSelect($conexao, $sql);
    if (count($animal_dados) > 0) { // credenciais corretas - iniciar sessao e salvar dados do usuario
        $animal = $animal_dados[0]; // salva dados do participante na variavel $part

        $conexao = conectarBanco("aumigos");
        $sql = "UPDATE Animal
        SET ong_codigo = $ong_codigo, nome = '$nome', idade = '$idade', raca = '$raca',
        porte = '$porte', especie = '$especie', descricao = '$descricao', sexo = '$sexo'
        WHERE animal_codigo = $animal_codigo";
        $animal_dados = executarUpdate($conexao, $sql);
        desconectarBanco($conexao);
        header("location: o_editar_animal.php?animal_codigo=$animal_codigo&animal_salvar=");
    }
} elseif (isset($_POST["excluir"])) {
    $ong_codigo = $_POST["ong_codigo"];
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $raca = $_POST["raca"];
    $porte = $_POST["porte"];
    $especie = $_POST["especie"];
    $descricao = $_POST["descricao"];
    $sexo = $_POST["sexo"];
    $animal_codigo = $_POST["animal_codigo"];
    $resgate = $_POST["resgate"];

    if ($resgate == "Sim") {
        header("location: o_editar_animal.php?animal_codigo=$animal_codigo&excluir=");
    } else {
        $conexao = conectarBanco("aumigos");


        $sql = "DELETE FROM Animal
      WHERE animal_codigo = $animal_codigo";
        executarDelete($conexao, $sql);

        $sql = "DELETE FROM Pedido_adocao
      WHERE animal_codigo = $animal_codigo";
        executarDelete($conexao, $sql);
        desconectarBanco($conexao);
        header("location: o_animais.php");
    }
}
include "layout/_rodape.php";
?>