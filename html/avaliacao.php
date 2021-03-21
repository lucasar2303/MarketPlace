<?php
include('conexao.php');

$avaliacao = $_POST['avaliacao'];

$lojaId = $_POST['lojaId2'];

		$consultaLoja = "SELECT * FROM `loja` WHERE lojaId = '$lojaId'";
		$dadosLoja = mysqli_query($conexao, $consultaLoja) or die(mysql_error());
		$linhaLoja = mysqli_fetch_assoc($dadosLoja);

		$pessoas = $linhaLoja['avaliacaoPessoas'];
		$novaPessoas = $pessoas + 1;

		$pontos = $linhaLoja['avaliacao'];
		$novoPontos = $pontos + $avaliacao;

		$sql = "UPDATE `loja` SET `avaliacao` = '$novoPontos' WHERE `loja`.`lojaId` = $lojaId";

		$dados = mysqli_query($conexao, $sql);

		$sql2 = "UPDATE `loja` SET `avaliacaoPessoas` = '$novaPessoas' WHERE `loja`.`lojaId` = $lojaId";

		$dados2 = mysqli_query($conexao, $sql2);

		header('Location: index.php');






?>