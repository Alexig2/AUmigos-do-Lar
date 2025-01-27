<?php
$titulo_pagina = "Cadastro - ONG";
include "layout/_cabecalho.php";
include "layout/_a_navbar.php";
?>
<main>
  <br><br>
  <div class="container mt-5 card">
    <br>
    <div class="row">
      <div class="col-12">
        <div class="text-center">
          <br>
          <h1 class="titulo2">Cadastre-se como ONG</h1>
          <hr>
          <div class="fs-4 texto2">É uma nova ONG e precisa de ajuda na visibilidade do seu trabalho? Cadastre-se e
            ajude animais a encontrarem um lar! </div>
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
        <?php
        if (!isset($_GET['cadastrado'])) {
          echo "<br>";
        }
        ?>
        <form class="card-body fs-4" method="POST" action="o_cadastro.php">
          <div class="mb-3">
            <label for="email_ong" class="form-label">Email</label>
            <input type="email" class="form-control" id="email_ong" name="email_ong"
              placeholder="Insira o email de contato da instituição" required>
          </div>
          <div class="mb-3">
            <label for="nome_fantasia" class="form-label">Nome da Instituição</label>
            <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia"
              placeholder="Apresente o nome da ONG" required>
          </div>
          <div class="mb-3">
            <label for="ong_cnpj" class="form-label">CNPJ</label>
            <input type="text" class="form-control" id="ong_cnpj" name="ong_cnpj" placeholder="Digite o CNPJ" required>
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
          <a class="link_geral" href="u_cadastro.php">Cadastrar-se como Usuário</a>

      </div>

      <div class="col-6 ">
        <?php
        if (!isset($_GET['cadastrado'])) {
          echo "<br>";
        }
        ?>
        <div class="card-body fs-4">
          <div class="mb-3">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Informe a cidade" required>
          </div>
          <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua, quadra - bairro"
              required>
          </div>
          <div class="mb-3">
            <label for="senha_ong" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha_ong" name="senha_ong" placeholder="Insira sua senha"
              required>
          </div>
          <div class="mb-3">
            <label for="senha" class="form-label">Confirmar senha</label>
            <input type="password" class="form-control" id="confirmacao_senha" name="confirmacao_senha"
              placeholder="Digite sua senha novamente" required>

          </div>
          <a class="link_geral" href="login.php">Já possui uma conta? Clique aqui para entrar.</a>
          <div id="botao" mt-3>
          </div>
          <?php
          if (isset($_POST["cadastrar"])) {
            $conexao = conectarBanco("aumigos");
            $ong_cnpj = $_POST["ong_cnpj"];
            $nome_fantasia = $_POST["nome_fantasia"];
            $cidade = $_POST["cidade"];
            $estado = $_POST["estado"];
            $endereco = $_POST["endereco"];
            $email_ong = $_POST["email_ong"];
            $senha_ong = $_POST["senha_ong"];
            $sql = "INSERT INTO Ong (ong_cnpj, nome_fantasia, cidade, estado, endereco, descricao, email_ong, senha_ong, agencia, conta_corrente, chave_pix, caixa_postal)
          VALUES ('$ong_cnpj', '$nome_fantasia', '$cidade', '$estado', '$endereco', '', '$email_ong', '$senha_ong', '', '', '', '')";
            executarInsert($conexao, $sql);
            desconectarBanco($conexao);

            echo "<script>window.location.href = 'o_cadastro.php?cadastrado=true'</script>";
          }
          ?>
          <button type="submit" class="btn btn-laranja form-control" name="cadastrar">Cadastrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <br><br><br>
  <?php
  include "layout/_rodape.php";
  ?>