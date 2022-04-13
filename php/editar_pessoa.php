<?php
require_once("../system/conexao.php");
require_once("../system/config.php");

$id				= $_POST['id_pessoa'];
$nome           = $_POST['nome'];
$cidade			= $_POST['cidade'];
$email          = $_POST['email'];
$base_url 		= $_POST['BASE_URL'];

$query = $pdo->query("SELECT * FROM pessoas WHERE id = '$id'");
$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = $resultado[0]['id'];

if (count($resultado) > 0 && $id_reg == $id) {
	$query = $pdo->prepare("UPDATE pessoas SET nome = :nome, cidade = :cidade, email = :email WHERE id = '$id'");

	$query->bindValue(":nome", "$nome");
	$query->bindValue(":cidade", "$cidade");
	$query->bindValue(":email", "$email");
	$query->execute();
	
	header('Location:' . $base_url . '/listar.php?msg=SUCCESS');
	exit;
}

header('Location:' . $base_url . '/listar.php?msg=ERR_PESSOA');
exit;