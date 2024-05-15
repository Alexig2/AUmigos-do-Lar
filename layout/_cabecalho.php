<?php
session_start();
include "funcoes/_funcoesGerais.php";
include "funcoes/_funcoesConfigBanco.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="lib/bootstrap-5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="lib/bootstrap-5.3.0/css/estilo.css">
  
  <title><?= $titulo_pagina ?></title>
  <link rel="icon" href="imagens\icon.png">
</head>

<body>