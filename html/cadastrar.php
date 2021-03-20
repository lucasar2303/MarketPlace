<?php
session_start();
include("conexao.php");


/* Capturando login e senha */
$usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));

/* Verificando se o usuario já existe no banco */
$sql = "select count(*) as total from usuario where login ='$usuario'";
$result = mysqli_query($conexao, $sql);

$row = mysqli_fetch_assoc($result); 

if ($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: cadastro.php');
	exit;
}

/* Cadastrando dados no banco */
$sql = "INSERT INTO usuario (login, senha) VALUES ('$usuario', '$senha')";

if ($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: cadastro.php');
exit;