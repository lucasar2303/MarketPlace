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
	<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>
<body>
	<header>
		<section id="header">
			<div id="buttons">

			<?php
			if ($_SESSION['usuario']):
			?>
			<button><a href="painel.php">Painel do usuário</a></button>
			<?php
			endif;
			
			?>

			<?php
			if (!$_SESSION['usuario']):
			?>

			<button><a href="login.php">Entrar</a></button>
			<button><a href="cadastro.php">Cadastrar</a></button>

			<?php
			endif;
	
			?>




			</div>
		</section>
	</header>
	<main>
		<h1>Marketplace</h1>
		<section id="pesquisar">
			<form method="get">
				<input type="text" name="pesquisar">
				<input type="submit" name="btn-pesquisar" value="Pesquisar">
			</form>

			
		</section>
	</main>

</body>
</html>