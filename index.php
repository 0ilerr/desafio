<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width-device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">   
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">   
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<title>Sistema Vendas</title>
</head>
<body>
	<h1 class="display-4">SISTEMA DE VENDAS</h1>
	<h1 class="card-title pricing-card-title">Total Vendido: R$ 
		
		<?php 
		/*Algoritimo para trazer o total das vendas confirmadas*/
		include_once '_class/conexao.php';

		$conexao = new conexao();
		$conexao->host = 'localhost';
		$conexao->usuario = 'root';
		$conexao->senha = '';
		$conexao->bd = 'sistemavendas';
		$conexao->conectar();
		$totalFin = 0;

		$sqlProcDoc = "SELECT total FROM documento where confirmado ='TRUE' ";


		$resultDoc = mysqli_query($conexao->con,$sqlProcDoc);

		$contDoc = mysqli_affected_rows($conexao->con);

		if ($contDoc > 0) {
			while ($linha = mysqli_fetch_array($resultDoc)) {
				$total = utf8_encode($linha["total"]);
				$idDocumento = (double)$total;
				$totalFin = $totalFin +$idDocumento ;
			}
			echo $totalFin;
		}else{
			echo $contDoc;
		}

		?>
		
	</h1>
	<div class="card-body">
		<button class="btn btn-lg btn-block btn-primary" onclick="location.href='produto.php'">Adicionar Novo Produto</button>
	</br>
	<button class="btn btn-lg btn-block btn-primary" onclick="location.href='venda.php'">Fazer Venda</button></br>
</div>
</body>
</html>