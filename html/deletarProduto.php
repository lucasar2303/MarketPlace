<?php
include('conexao.php');

$produtoId = $_POST['produtoId'];



$sql = "DELETE FROM `produto` WHERE `produto`.`produtoId` = $produtoId";

$conexao->query($sql);
header("Location: painel.php");

?>