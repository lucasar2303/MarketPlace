<?php
include('conexao.php');

$novoEstoque = $_POST['atualizaEstoque'];
$produtoId = $_POST['produtoId'];



$sql = "UPDATE `produto` SET `estoque` = '$novoEstoque' WHERE `produto`.`produtoId` = $produtoId";

$conexao->query($sql);
header("Location: painel.php");

?>