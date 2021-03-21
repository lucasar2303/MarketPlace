<?php
include('conexao.php');

$produtoId = $_POST['produtoId'];

$novoEstoque = $_POST['estoqueId'] - $_POST['venda'];

echo $novoEstoque;

if ($novoEstoque<0) {
	header('Location: index.php');
} else{

$sql = "UPDATE `produto` SET `estoque` = '$novoEstoque' WHERE `produto`.`produtoId` = $produtoId";

$dados = mysqli_query($conexao, $sql);

header('Location: index.php');
};

?>