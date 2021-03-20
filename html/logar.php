<?php
session_start();
include('conexao.php');

/* Verifica se os campos foram digitados */
if (empty($_POST['usuario']) || empty($_POST['senha']))
{
	header('Location: login.php');
	exit();
}

/*Captação de usuario e senha*/

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

/* Verifica se os dados enviados existem no banco de dados */

$query = "select userId, login from usuario where login = '$usuario' and senha = '$senha'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);


if ($row == 1) {
	$_SESSION['usuario'] = $usuario;
	header('Location: painel.php');
	exit();
}else{
	$_SESSION['naoAutenticado'] = true;
	header('Location: login.php');
}