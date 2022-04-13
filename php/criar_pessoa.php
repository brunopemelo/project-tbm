<?php
require_once("../system/conexao.php");
require_once("../system/valida_email.php");
require_once("../system/config.php");

$validacao      = new Validacao();

$id 			= $_POST['id'];
$nome           = $_POST['nome'];
$cidade			= $_POST['cidade'];
$email          = $_POST['email'];
$base_url		= $_POST['BASE_URL'];

$email_validado	= $validacao->valida_email($email);

if ($email_validado == false) {
	$msg = 'ERR_EMAIL_VALID';
	echo "<script>window.location.href='" . $base_url . "/cadastrar.php?msg=" . $msg . "'</script>";
	exit();
}

$query = $pdo->query("SELECT * FROM pessoas WHERE email = '$email'");
$resultado = $query->fetchAll(PDO::FETCH_ASSOC);

$id_reg = @$resultado[0]['id'];
if (@count($resultado) > 0 && $id_reg != $id) {
	$msg = 'ERR_EMAIL';
	echo "<script>window.location.href='" . $base_url . "/cadastrar.php?msg=" . $msg . "'</script>";
	exit();
}

$sql = "INSERT INTO pessoas(
	nome,
	cidade,
	email
)VALUES(
	'" . $nome . "',
	'" . $cidade . "',
	'" . $email . "'
)";

$query = $pdo->query($sql);

$msg = 'SUCCESS';
echo "<script>window.location.href='" . $base_url . "/cadastrar.php?msg=" . $msg . "'</script>";
exit();
?>