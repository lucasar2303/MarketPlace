<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>MarketPlace</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<main>
	<header>
		<div class="header">
		<a href="index.php">MarketPlace</a>
		</div>
	</header>

	<section id="section-login">
		<h1>Sistema de Login</h1>

		<form action="logar.php" method="POST">

			<input type="text" name="usuario" placeholder="Seu usuário" autofocus="">
			<input name="senha" type="password" placeholder="Sua senha">
			<button type="submit" id="button">Entrar</button>

		</form>

		<!-- Notificação de erro -->

		<?php
		if(isset($_SESSION['naoAutenticado'])):
		?>
		<div id="invalido-2">Usuário ou senha inválidos!</div>
		<?php
		endif;
		unset($_SESSION['naoAutenticado']);
		?>
	</section>
</main>
