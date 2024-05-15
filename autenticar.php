
<?php
// script de autenticacao, inicio da sessao e redirecionamento
include "funcoes/_funcoesGerais.php";
include "funcoes/_funcoesConfigBanco.php";
print_r($_POST);

if (isset($_POST["u_entrar"])) {
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $conexao = conectarBanco("aumigos");

    $sql = "SELECT * FROM Usuario WHERE email = '$email' AND senha = '$senha'";

    $dados = executarSelect($conexao, $sql);
    if (count($dados) > 0) { // credenciais corretas - iniciar sessao e salvar dados do usuario
        $usuario = $dados[0]; // salva dados do participante na variavel $part
        session_start();    // habilita inicio da sessao e salva dados desejados na variavel de sessao
        $_SESSION["sessao_iniciada"] = true;
        $_SESSION["usuario_codigo"] = $usuario["usuario_codigo"];
        $_SESSION["email"] = $usuario["email"];
        $_SESSION["nome"] = $usuario["nome"];
        // ex: rediredionar para pagina desejada. Ex: perfilParticipante.php?cod=XXX

        header("location: u_index.php?codigo=" . $_SESSION["usuario_codigo"]);
    } else {
        // credenciais incorretas - voltar para pagina de login com um indicador de tentativa incorreta (err=1)
        header("location: login.php?err=1");
    }
} elseif (isset($_POST["o_entrar"])) {
    $email_ong = $_POST["email"];
    $senha_ong = $_POST["senha"];
    $conexao = conectarBanco("aumigos");
    $sql = "SELECT * FROM Ong WHERE email_ong = '$email_ong' AND senha_ong = '$senha_ong'";
    $dados = executarSelect($conexao, $sql);
    if (count($dados) > 0) { // credenciais corretas - iniciar sessao e salvar dados do usuario
        $ong = $dados[0]; // salva dados do participante na variavel $part
        session_start();    // habilita inicio da sessao e salva dados desejados na variavel de sessao
        $_SESSION["sessao_iniciada"] = true;
        $_SESSION["ong_codigo"] = $ong["ong_codigo"];
        $_SESSION["email_ong"] = $ong["email_ong"];
        $_SESSION["nome_fantasia"] = $ong["nome_fantasia"];
        // ex: rediredionar para pagina desejada. Ex: perfilParticipante.php?cod=XXX
        header("location: o_index.php?codigo=" . $_SESSION["ong_codigo"]);
    } else {
        // credenciais incorretas - voltar para pagina de login com um indicador de tentativa incorreta (err=1)
        header("location: login.php?err=1");
    }
}
include "layout/_rodape.php";
?>