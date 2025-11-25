<?php
include("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>O Artesão do Burguer</title>
</head>
<body>

    <header class="header">
        <section>
        <a href="#" class="logo">
            <img src="imagens/logoburguer.png" alt="logo">
        </a>

        <nav class="navbar">
            <a href="#">Hom</a>
            <a href="#about">Sobre</a>
            <a href="#menu">Menu</a>
            <a href="#review">Avaliações</a>
            <a href="#address">Endereço</a>
        </nav>

        <div class="icons">
            <img width="40" height="40" src="imagens/search.png" alt="icon de busca">
            <img width="40" height="40" src="imagens/cart.png" alt="icon de carrinho">
        </div>
        </section>
    </header> 
    
    <main class="content-padding">
        <h1>O Artesão do Burguer</h1>
        <br>
        <a href="gestao_clientes.php">link: Página Gestão clientes</a>
        <br>
        
        <div style="height: 2000px; padding-top: 5rem;">
            <h2>(Espaço para testar a rolagem)</h2>
        </div>

    </main>
   
</body>
</html>
