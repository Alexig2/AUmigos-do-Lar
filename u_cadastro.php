<?php
$titulo_pagina = "Cadastro - Usuário";
include "layout/_cabecalho.php";
include "layout/_a_navbar.php";
?>
<main>
  <br><br><br>
  <div class="container mt-5 card">
    <br>
    <div class="row">
      <div class="col-12">
        <div class="text-center">
          <h1 class="titulo2">Cadastre-se como Usuário</h1>
          <hr>
          <div class="fs-5 texto2">Gosta de animais e pretende ajudar essa causa? Cadastre-se e tenha um acesso facilitado </div>
        </div>
      </div>
      <?php
      if (isset($_GET['cadastrado'])) {
      ?>
        <div class="fs-4 card-body mensagem1">
          Cadastro realizado.
        </div>
      <?php
      }
      ?>
    </div>
    <div class="row">
      <div class="col-6">
        <form class="card-body fs-4" method="POST" action="u_cadastro.php">
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Insira o email" required>
          </div>
          <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" required>
          </div>
          <div class="mb-3">
            <label for="sobrenome" class="form-label">Sobrenome</label>
            <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Digite o sobrenome" required>
          </div>
          <div class="mb-3">
            <label for="usuario_cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="usuario_cpf" name="usuario_cpf" placeholder="Digite o CPF" required>
          </div>
          <div class="mb-3">
            <div>
              <label for="estado">
                Estado
              </label>
              <select class="form-select" aria-label="Default select example" id="estado" name="estado" required>
                <option selected disabled> Selecione... </option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
              </select>
            </div>
          </div>
      </div>
      <div class="col-6 card-body fs-4">
        <div class="mb-3">
          <label for="cidade" class="form-label">Cidade</label>
          <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Informe a cidade" required>
        </div>
        <div class="mb-3">
          <label for="data_nasc" class="form-label">Data de nascimento</label>
          <input type="date" class="form-control" id="data_nasc" name="data_nasc" placeholder="Informe a data de nascimento" required>
        </div>
        <div class="mb-3">
          <label for="senha" class="form-label">Senha</label>
          <input type="password" class="form-control" id="senha" name="senha" placeholder="Insira sua senha" required>
        </div>
        <div class="mb-3">
          <label for="confirmacao_senha" class="form-label">Confirmar senha</label>
          <input type="password" class="form-control" id="confirmacao_senha" name="confirmacao_senha" placeholder="Digite sua senha novamente" required>
        </div>
        <a class="link_geral" href="o_cadastro.php">Cadastrar-se como ONG</a>
        <br>
        <a class="link_geral" href="login.php">Já possui uma conta? Clique aqui para entrar.</a>
        <div id="botao">
          <button type="submit" class="mt-2 form-control btn btn-roxo" name="cadastrar">Cadastrar</button>
        </div>
        <?php
        if (isset($_POST["cadastrar"])) {
          $conexao = conectarBanco("aumigos");
          $usuario_cpf = $_POST["usuario_cpf"];
          $nome = $_POST["nome"];
          $sobrenome = $_POST["sobrenome"];
          $cidade = $_POST["cidade"];
          $estado = $_POST["estado"];
          $data_nasc = $_POST["data_nasc"];
          $email = $_POST["email"];
          $senha = $_POST["senha"];
          $sql = "INSERT INTO Usuario (usuario_cpf, nome, sobrenome, data_nasc, email, senha, cidade, estado)
          VALUES ('$usuario_cpf', '$nome', '$sobrenome', '$data_nasc', '$email', '$senha', '$cidade', '$estado')";
          executarInsert($conexao, $sql);
          desconectarBanco($conexao);
          echo "<script>window.location.href = 'u_cadastro.php?cadastrado=true'</script>";
        }
        ?>
        </form>
      </div>
    </div>
  </div>
  <br><br><br><br>
</main>
<?php
include "layout/_rodape.php";
?>