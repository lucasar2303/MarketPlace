<?php
include("painel.php");

$fotoNome = $_FILES['foto'] ['name'];
$fotoTmp = $_FILES['foto'] ['tmp_name'];


$cnpj2 = $_POST['cnpj2'];
$consulta3 = "SELECT `lojaId` FROM `loja` WHERE cnpj = '$cnpj2'";
$dados3 = mysqli_query($conexao, $consulta3) or die(mysql_error());
$linha3 = mysqli_fetch_assoc($dados3);
$lojaId = implode(':', $linha3);


$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$categoria = mysqli_real_escape_string($conexao, trim($_POST['categoria']));
$estoque = mysqli_real_escape_string($conexao, trim($_POST['estoque']));



$sql2 = "INSERT INTO produto (lojaId, nome, foto, categoria, estoque) VALUES ($lojaId, '$nome', '$fotoNome', '$categoria', $estoque)" ;

if ($conexao->query($sql2) === TRUE) {
	$_SESSION['status_cadastroProduto'] = true;
	header('Location: painel.php');
}else{
	echo "falhou";
}

move_uploaded_file($fotoTmp, "./imgEnviada/".$fotoNome);

header("Location:painel.php");


?>