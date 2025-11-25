<?php

$host = "34.237.81.165";
$usuario = "DB_TI03358_SAMPAIO";    
$banco = "DB_TI03358_SAMPAIO";        
$senha = "Almagama23!X98@"; 
$porta = 3306;

$conexao = new mysqli( $host, $usuario, $senha, $banco, $porta);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

$conexao->set_charset("utf8");

?>
