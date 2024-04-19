<?php

$host = "localhost";
$usuario = "root";
$senha = "123456";
$banco = "auto_pecas";

try{

    $conexao = new PDO("mysql:host=$host;dbname=$banco;charset=utf8", $usuario,$senha);

    $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){

    die('não foi possivel conectar ao banco de dados.Erro detetado '. $e->getMessage());
}
?>