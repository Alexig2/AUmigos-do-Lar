<?php

function incluirCabecalho($titulo_pagina = "Festival Cultural"){
    include "fragmentos/_cabecalho.php";
}


function incluirRodape(){
    include "fragmentos/_rodape.php";
}

function incluirMenu(){
    // poderia haver varios menus. Ex: menu p/ administrador, p/ usuario logado, etc.
    include "fragmentos/_menu.php";
}


// em breve:  incluir menus, restringir acesso, etc.
function realizarUploadImagemServidor($nome_pasta = "upload"){

    $data_hora = date("Ymd_His_");                     // obtem data e hora atuais
    $nomeFotoOriginal = $_FILES["imagem"]["name"];     // name do arquivo enviado pelo usuario
    $nomeFotoTemp     = $_FILES["imagem"]["tmp_name"]; // lugar temporario que a foto fica

    // obter data e hora atual para renomear no comeco do arquivo
    $nomeFotoRenomeada = $data_hora . $nomeFotoOriginal;     // renomeia para evitar dois arquivos com mesmo nome

    // move arquivo da foto do local temporario para a pasta desejeada do servidor
    $res = move_uploaded_file($nomeFotoTemp, "$nome_pasta/$nomeFotoRenomeada");  
    if(!$res){
        echo "Houve um erro ao fazer o upload do arquivo!";
        return false;
    } else{
        return ($nomeFotoRenomeada);
    }

   
}

?>