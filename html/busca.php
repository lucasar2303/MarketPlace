<?php
	include("conexao.php");

	ini_set('display_errors', 0 );
error_reporting(0);



	$teclado = $_POST['tecla'];

	$nome = $_POST['palavra'];

	if(empty($nome)){
		


		$consulta = "SELECT * FROM `produto`";
	$dados = mysqli_query($conexao, $consulta) or die(mysqli_error());

	if (mysqli_num_rows($dados)<=0) {
		echo "<p> Nenhum resultado encontrado </p>";
	}else{
		while ($rows = mysqli_fetch_assoc($dados)) {
			echo "
			<div class='div-produtos'>
			<img width='200px' height='200px' src='./imgEnviada/".$rows['foto']."''>";

			echo "	<div class='produtos'>
					<p>Nome do Produto: ".$rows['nome']."  </p>
					";

			echo "<p>Categoria: ".$rows['categoria']."  </p>";

			echo "<p>Estoque: ".$rows['estoque']."  </p>
					
					";





			$produtoId = $rows['produtoId'];

			$consultaLoja = "SELECT `lojaId` FROM `produto` WHERE produtoId = '$produtoId'";
			$dadosLoja = mysqli_query($conexao, $consultaLoja) or die(mysql_error());
			$linhaLoja = mysqli_fetch_assoc($dadosLoja);
			$lojaId = implode(':', $linhaLoja);


			$consultaLoja2 = "SELECT * FROM `loja` WHERE lojaId = '$lojaId'";
			$dadosLoja2 = mysqli_query($conexao, $consultaLoja2) or die(mysql_error());
			$linhaLoja2 = mysqli_fetch_assoc($dadosLoja2);

			$nota = $linhaLoja2['avaliacao'];
			$pessoas = $linhaLoja2['avaliacaoPessoas'];

			if ($nota==0 or $pessoas==0) {
				$media = "Não Avaliado";
			}else{
			$media = $nota / $pessoas;
			}	

			

	

			echo "<p>Loja: ".$linhaLoja2['nomeFantasia']."  </p>";

			echo "<p> Nota: $media  </p>";



			echo "<form method ='POST' action='avaliacao.php' id='avaliar'>

			<input type='number' name='avaliacao'  min='1' max='5'>
			<input type='text' name='lojaId2' value=".$linhaLoja2['lojaId']." class='remove'>

			<button type='submit'> Avaliar </button>
			</form> </div>";







			echo "
			<form method='POST' action='venda.php' id='vendaId'>
				<input type='text' name='venda' placeholder='Quantidade' required=''>
				<input type='text' name='produtoId' value=".$rows['produtoId']." class='remove'>
				<input type='text' name='estoqueId' value=".$rows['estoque']." class='remove'>
				<button type='submit'>Comprar</button>
			</form>
			</div>";
		




			




			}
		}





	}
	else{


	$consulta = "SELECT * FROM `produto` WHERE nome like '%$nome%'";
	$dados = mysqli_query($conexao, $consulta) or die(mysqli_error());

	if (mysqli_num_rows($dados)<=0) {
		echo "<p id='nenhumResultado'> Nenhum resultado encontrado </p>";
	}else{
		while ($rows = mysqli_fetch_assoc($dados)) {
			echo "
			<div class='div-produtos'>
			<img width='200px' height='200px' src='./imgEnviada/".$rows['foto']."''>";

			echo "	<div class='produtos'>
					<p>Nome do Produto: ".$rows['nome']."  </p>
					";

			echo "<p>Categoria: ".$rows['categoria']."  </p>";

			echo "<p>Estoque: ".$rows['estoque']."  </p>";

						$produtoId = $rows['produtoId'];

			$consultaLoja = "SELECT `lojaId` FROM `produto` WHERE produtoId = '$produtoId'";
			$dadosLoja = mysqli_query($conexao, $consultaLoja) or die(mysql_error());
			$linhaLoja = mysqli_fetch_assoc($dadosLoja);
			$lojaId = implode(':', $linhaLoja);


			$consultaLoja2 = "SELECT * FROM `loja` WHERE lojaId = '$lojaId'";
			$dadosLoja2 = mysqli_query($conexao, $consultaLoja2) or die(mysql_error());
			$linhaLoja2 = mysqli_fetch_assoc($dadosLoja2);

			$nota = $linhaLoja2['avaliacao'];
			$pessoas = $linhaLoja2['avaliacaoPessoas'];

			if ($nota==0 or $pessoas==0) {
				$media = "Não Avaliado";
			}else{
			$media = $nota / $pessoas;
			}	

			

	

			echo "<p>Loja: ".$linhaLoja2['nomeFantasia']."  </p>";

			echo "<p> Nota: $media  </p>";



			echo "<form method ='POST' action='avaliacao.php'  id='avaliar'>

			<input type='number' name='avaliacao'  min='1' max='5'>
			<input type='text' name='lojaId2' value=".$linhaLoja2['lojaId']." class='remove'>

			<button type='submit'> Avaliar </button>
			</form> </div>";

			echo "
			<form method='POST' action='venda.php' id='vendaId'>
				<input type='text' name='venda' placeholder='Quantidade' required=''>
				<input type='text' name='produtoId' value=".$rows['produtoId']." class='remove'>
				<input type='text' name='estoqueId' value=".$rows['estoque']." class='remove'>
				<button type='submit'>Comprar</button>
			</form>
			</div>";

			$produtoId = $rows['produtoId'];

			$consultaLoja = "SELECT `lojaId` FROM `produto` WHERE produtoId = '$produtoId'";

			$dadosLoja = mysqli_query($conexao, $consultaLoja) or die(mysql_error());

			$linhaLoja = mysqli_fetch_assoc($dadosLoja);

			$lojaId = implode(':', $linhaLoja);

	

			}
		}
		
	}
		

?>