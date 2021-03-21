<?php
include("painel.php");


session_start();



/* Capturando login e senha */
$nomeFantasia = mysqli_real_escape_string($conexao, trim($_POST['nomeFantasia']));
$cnpj = mysqli_real_escape_string($conexao, trim($_POST['cnpj']));
$razaoSocial = mysqli_real_escape_string($conexao, trim($_POST['razaoSocial']));
$enderecoCidade = mysqli_real_escape_string($conexao, trim($_POST['enderecoCidade']));
$enderecoBairro = mysqli_real_escape_string($conexao, trim($_POST['enderecoBairro']));
$enderecoEndereco = mysqli_real_escape_string($conexao, trim($_POST['enderecoEndereco']));
$numero = mysqli_real_escape_string($conexao, trim($_POST['numero']));
$telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
$nomeContato = mysqli_real_escape_string($conexao, trim($_POST['nomeContato']));



/* Cadastrando dados no banco */

$sql = "INSERT INTO loja (nomeFantasia, cnpj, razaoSocial, enderecoCidade, enderecoBairro, enderecoEndereco, enderecoNumero, telefone, nomeContato, userId) VALUES ('$nomeFantasia', $cnpj,'$razaoSocial','$enderecoCidade','$enderecoBairro','$enderecoEndereco','$numero','$telefone','$nomeContato',$userId)";


if ($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastroLoja'] = true;
	header('Location: painel.php');
}else{
	echo "falhou";
}



exit;

