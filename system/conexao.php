<?php
$banco = "tubominas";
$servidor = "localhost";
$usuario = "root";
$senha = "";

date_default_timezone_set('America/Sao_Paulo');

try {
    $pdo = new PDO("mysql:dbname=$banco;host=$servidor", "$usuario", "$senha");
} catch (Exception $e) {
    echo 'Erro ao conectar com o Banco de Dados! <br>' . $e;
}