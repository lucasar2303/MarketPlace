<?php
session_start();

ini_set('display_errors', 0 );
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>MarketPlace</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="../css/cadastro.css">
</head>
<body>
<main>
	<header>
		<div class="header">
		<a href="index.php">MarketPlace</a>
		</div>
	</header>

	<section id="section-login">
		<h1>Sistema de Cadastro</h1>

		<form action="cadastrar.php" method="POST">

			<input type="text" name="usuario" placeholder="Informe o nome de usuário" autofocus="" required="">
			<input name="senha" type="password" placeholder="Informe uma senha" required="">
			<button type="submit" id="button">Cadastrar</button>

		</form>



		<!-- Notificação de sucesso -->
		<?php
		if($_SESSION['status_cadastro'] == true):
		?>
		<div id="valido">Cadastro efetuado!</div>
		<?php
		endif;
		unset($_SESSION['status_cadastro']);
		?>

		<!-- Notificação de erro -->
		<?php 
		if ($_SESSION['usuario_existe']):
		?>
		<div id="invalido-2">O usuário escolhido já existe.</div>
		<?php
		endif;
		unset($_SESSION['usuario_existe']);
		?>
		

	</section>
</main>
</body>

