<?php
include('conexao.php');
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="pesquisar.js"></script>
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
			<h2>Produtos no MarketPlace</h2>
			<form method="POST" action="" id="form-pesquisa">
				<input type="text" name="pesquisa" id="pesquisa" placeholder="Digite sua busca">
				
			</form>

			<div class="resultado"></div>






			
		</section>
	</main>

</body>
</html>