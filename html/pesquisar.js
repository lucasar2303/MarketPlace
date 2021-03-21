


$(function(){
	
		var teclado2 = {
			tecla : false}

			$.post('busca.php', teclado2, function(retorna){
			$(".resultado").html(retorna)});
	
		$("#pesquisa").keyup(function(){

		var pesquisa = $(this).val();

		if (pesquisa != '') {

			var dados = {
			palavra : pesquisa
			}
		
			$.post('busca.php', dados, function(retorna){
			$(".resultado").html(retorna);
		});
		 }else{

		 	$.post('busca.php', teclado2, function(retorna){
			$(".resultado").html(retorna)});

			$(".resultado").html('');
					console.log("nao acho");
		}	

	});

	
});