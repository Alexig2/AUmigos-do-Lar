<?php

######################################################################################################
/*
 * Configure o endereco do servidor, usuario, senha e nome do banco de dados (na funcao conectarBanco).
 * Em seguida, praticamente NAO precisaremos mexer neste arquivo, so vamos importa-lo nas paginas para
 * acesso as funcoes de interacao com o banco de dados MySQL.
 */
######################################################################################################


/**
 * Configuracao de conexao com o banco de dados mysql. 
 * Configurar conforme a sua utilizacao.
 * @return type
 */
function conectarBanco($nome_db) { // Atencao: indique aqui conforme o BD que ira usar!
    $servidor    = "localhost"; 
    $usuario     = "root"; 
    $senha_mysql = "";
            
    // cria conexao
    $con = mysqli_connect($servidor, $usuario, $senha_mysql, $nome_db);

    // verifica se deu certo
    if (!$con) {
        echo "<h1>Falhou ao conectar ao banco $nome_db no endereco $servidor </h1>";
        die();
    } else{
        //echo "<h1>Conectado com sucesso </h1>"; // comentar aqui!
        return $con;
    }        
}

/**
 * Funcao para encerrar conexao com o banco. 
 * Eh importante desconectar sempre, pra evitar sobrecarga do BD.  
 * @param type $con
 */
function desconectarBanco($con){    
    if($con){
       // echo "Conexão fechada<br>";
        mysqli_close($con);
    }    
}

/**
 * Funcao para executar uma consulta 'SELECT' no banco de dados
 * Ela retorna um array associativo multi-dimensional com os dados, caso a consulta retorne registros. 
 * Caso contrario, retorna um array vazio (ex: se a consulta nao retornou nada). 
 * @param type $con
 * @param String $sql Comando SQL. Ex: "SELECT * FROM Professor"
 * @return array Retorna um array associativo multi-dimensional com dados, ou array vazio.
 */
function executarSelect($con, $sql){    
    
    $res = mysqli_query($con, $sql);    //executa comando sql no banco
    
    if($res && mysqli_num_rows($res) > 0){   // em caso de sucesso e se ha dados retornados pelo banco
        $dados = mysqli_fetch_all($res, MYSQLI_ASSOC); //obtem array com resultados
    } else {                    // em caso de falha ou em caso de nao haver registros na consulta
        $dados = array();       // retorna array vazio de dados
    }    
    
    return $dados;    //retornar os dados!
}


/**
 * Funcao generica para realizar um insert no banco de dados.
 * Retorna true (sucesso) ou false (falha).
 * @param type $con
 * @param String $sql Comando para insercao. Ex: "INSERT INTO Professor ....."
 * @return boolean
 */
function executarInsert($con, $sql){
    
    $res = mysqli_query($con, $sql);     //executa comando sql no banco
    
    if($res){
        // echo "Inserido com sucesso<br>"; // comentar depois
        return true;
    } else{
        echo "Erro ao inserir registro: comando com erro: <h3>$sql </h3> <br>";
        echo mysqli_error($con);
        return false;
    }               
}

/**
 * Funcao generica para realizar um update no banco de dados.
 * Retorna true (sucesso) ou false (falha). 
 * @param type $con
 * @param type $sql String. Ex: UPDATE tabela set .....
 * @return boolean Retorna true ou falso
 */
function executarUpdate($con, $sql){
    
    $res = mysqli_query($con, $sql);     //executa comando sql no banco
    
    if($res && mysqli_affected_rows($con) > 0 ){ // em caso de sucesso e pelo menos uma linha foi atualizada no banco
        echo "Atualizado com sucesso<br>";
        return true;
    } else{
        echo "Nenhum campo atualizado: <h3> $sql </h3> <br>";
        echo mysqli_error($con);
        return false;
    }               
    
}


/**
 * Função para executar um delete no banco de dados
 * Retorna true (sucesso) ou false (falha). 
 * @param type $con
 * @param type $sql Ex: DELETE FROM ... 
 * @return boolean Retorna true ou false
 */
function executarDelete($con, $sql) {
    // executa comando delete sql no banco
    $res = mysqli_query($con, $sql);
    
    if($res) {        
        echo "Registro foi excluído";  // comentar se não quiser exibir mais a mensagem
        return true;
    } else {
        echo "Erro ao exluir: $sql <br>"; // comentar o erro quando o projeto estiver pronto
        echo mysqli_error($con);
        return false;
    }
}

