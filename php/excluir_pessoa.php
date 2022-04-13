<?php
require_once("../system/conexao.php");
require_once("../system/config.php");

$id_excluir = $_POST['id'];

$query = $pdo->prepare("DELETE FROM pessoas WHERE id = '$id_excluir'");
$query->execute();

echo json_encode('SUC_DEL');
exit;