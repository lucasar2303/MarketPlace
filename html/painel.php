<?php
include("conexao.php");
session_start();

ini_set('display_errors', 0 );
error_reporting(0);




/* Verifica se o usuario está logado */
if (!$_SESSION['usuario']) {
	header('Location: index.php');
	exit();

}

/* Encontrando o userId*/
$usuarioName = $_SESSION['usuario'];

$consulta = "SELECT `userId` FROM `usuario` WHERE login = '$usuarioName'";

$dados = mysqli_query($conexao, $consulta) or die(mysql_error());

$linha = mysqli_fetch_assoc($dados);

$userId = implode(':', $linha);



/* Consultando os dados da loja referente ao usuario*/
$consulta2 = "SELECT * FROM `loja` WHERE userId = $userId;";

$dados2 = mysqli_query($conexao, $consulta2) or die(mysql_error());

$linha2 = mysqli_fetch_assoc($dados2);

$total2 = mysqli_num_rows($dados2);


if ($total2>=1) {
	

/* Consultando produtos da loja */

$cnpj3 =$linha2['cnpj'];
$consulta3 = "SELECT `lojaId` FROM `loja` WHERE cnpj = '$cnpj3'";
$dados3 = mysqli_query($conexao, $consulta3) or die(mysql_error());
$linha3 = mysqli_fetch_assoc($dados3);
$lojaId = implode(':', $linha3);

$consulta4 = "SELECT * FROM `produto` WHERE lojaId = $lojaId;";

$dados4 = mysqli_query($conexao, $consulta4) or die(mysql_error());

$linha4 = mysqli_fetch_assoc($dados4);

$total4 = mysqli_num_rows($dados4);

}



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>MarketPlace</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="../css/painel.css">
</head>
<body>

		<header>
		<section id="header">
			<div id="items">
				<p><a href="index.php" id="marketplace">MarketPlace</a></p>
				<div id="logar">
				<p>Logado como: <?php echo $_SESSION['usuario'];?> </p>
				<p><a href="logout.php">Sair</a></p>
				</div>


			</div>
		</section>
	</header>




	<main>

	<?php
	// se o número de resultados for maior que zero, mostra os dados
	if($total2 > 0) {
		do {
?>
			<div class="div-dados">
				<div class="dados">
			<p  id="nomeFantasia">Nome Fantasia: <?=$linha2['nomeFantasia']?>  </p>
			<p>CNPJ: <?=$linha2['cnpj']?></p>
			<p>Razão Social: <?=$linha2['razaoSocial']?> </p>
				</div>
				<div class="dados">
			<p>Cidade: <?=$linha2['enderecoCidade']?></p>
			<p>Endereço: <?=$linha2['enderecoEndereco']?></p>
			<p>Bairro: <?=$linha2['enderecoBairro']?> </p>
			<p>Número: <?=$linha2['enderecoNumero']?> </p>
				</div>
				<div class="dados">
			<p>Telefone: <?=$linha2['telefone']?> </p>
			<p>Responsável para contato: <?=$linha2['nomeContato']?></p>
				</div>
			</div>

			<h1 id="h1Inserir">Inserir produto</h1>
			<form action="enviarProduto.php" method="POST" enctype="multipart/form-data" id="inserirProduto">
				

				<input type="file" name="foto" value="" required="" >
				<input type="text" name="nome" placeholder="Nome do produto" required="" >
				<input type="text" name="categoria" placeholder="Categoria" required="" >
				<input type="text" name="estoque" placeholder="Estoque" required="" >
				<input type="text" id="remove" name="cnpj2" value="<?=$linha2['cnpj']?>" >

				<button type="submit">Enviar</button>

				<style type="text/css">#remove{display: none;}</style>
			</form>


<?php
		// finaliza o loop que vai mostrar os dados
		}while($linha2 = mysqli_fetch_assoc($dados2));
	// fim do if
	}












	if($total2 < 1):
?>

	<h1 class="cadastrar-titulo">Cadastrar Loja</h1>
	<div class="div-button">
	<div class="btn"><p>+</p></div>
	</div>
	</main>
	<div id="bg" class="bg-2">
	<div class=" btn-2 x">X</div>
	<form action="registrarLoja.php" method="POST">
		<p>Cadastrar Loja</p>
		<input type="text" name="nomeFantasia" placeholder="Nome Fantasia" required="">
		<input type="text" name="cnpj" placeholder="CNPJ" required="">
		<input type="text" name="razaoSocial" placeholder="Razão Social" required="">
		<input type="text" name="enderecoCidade" placeholder="Cidade" required="">
		<input type="text" name="enderecoBairro" placeholder="Bairro" required="">
		<input type="text" name="enderecoEndereco" placeholder="Endereço" required="">
		<input type="text" name="numero" placeholder="Número" required="">
		<input type="text" name="telefone" placeholder="Telefone" required="">
		<input type="text" name="nomeContato" placeholder="Nome do responsável" required="">

		<button type="submit">Cadastrar Loja</button>
	</form>

	</div>
<?php
endif;
?>
















<?php
	// se o número de resultados for maior que zero, mostra os dados
	if($total4 > 0) {
		do {
?>
<div class="div-produtos">
				

			<img src="./imgEnviada/<?=$linha4['foto']?>">

				<div class="produtos">
			<p>Nome do Produto: <?=$linha4['nome']?>  </p>

			<p>Categoria: <?=$linha4['categoria']?> </p>

			
			<form method="POST" action="atualizaEstoque.php">
				<p>Estoque: <?=$linha4['estoque']?></p>
				<input type="text" name="produtoId" id="remove" value="<?=$linha4['produtoId']?>">
				<input type="text" name="atualizaEstoque">
				<button type="submit">Atualizar</button>
			</form>

			<form method="POST" action="deletarProduto.php" >
				<input type="text" name="produtoId" id="remove" value="<?=$linha4['produtoId']?>">
				<button type="submit" id="deletarProduto">Remover Produto</button>
			</form>
			
				</div>
			</div>
<?php
		// finaliza o loop que vai mostrar os dados
		}while($linha4 = mysqli_fetch_assoc($dados4));
	// fim do if
	}
?>



		

</body>
</html>

<script type="text/javascript">

/* Script para tela de cadastro de loja */

	document.querySelector(".btn").addEventListener("click", addClassName);

	document.querySelector(".btn-2").addEventListener("click", addClassName2);

	function addClassName(){
		let element = document.getElementById("bg");
		element.classList.remove("bg-2");
		element.classList.add("bg");
	}

		function addClassName2(){
		let element = document.getElementById("bg");
		element.classList.remove("bg");
		element.classList.add("bg-2");
	}



</script>



