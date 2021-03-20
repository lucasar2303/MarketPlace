<?php
session_start();

/* Verifica se o usuario está logado */
if (!$_SESSION['usuario']) {
	header('Location: index.php');
	exit();
}

?>

<h2> Olá!  <?php echo $_SESSION['usuario'];?></h2>
<h2><a href="logout.php">Sair</a></h2>