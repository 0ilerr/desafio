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
	<div class="card-title pricing-card-title">
		<h1 class="display-4">Novo Produto</h1>
		<div class="card-body">
			<form  method="post">
				<a href='index.php'>Voltar</a>
			</br>
		</br>

		<div class="form-group">
			<label for="codigo">Código:</label><br />
			<input class="form-control" type="number" name="codigo" id="codigo"></input>
		</div>
		<div class="clear"></div>
		<div class="form-group">
			<label for="descricao">Descrição:</label><br />
			<input class="form-control" name="descricao" id="descricao" type="text" maxlength="150" />
		</div>
		<div class="clear"></div>
		<div class="form-group">
			<label for="preco">Preço:</label><br />
			<input class="form-control" type="number" step="0.25" name="preco" id="preco"></input>
		</div>
		<div class="clear"></div>

	</br>
	<input class="btn btn-primary my-2" type="submit" name = "submit" value="Adicionar Novo Produto!"/>
</form>
</div>
</div>
</body>
</html>


<?php
/*Algoritimo para cadastrar um novo prodduto*/
include_once '_class/conexao.php';
$conexao = new conexao();
$conexao->host = 'localhost';
$conexao->usuario = 'root';
$conexao->senha = '';
$conexao->bd = 'sistemavendas';
$codigo = 0;
$descricao ="";
$preco = 0;


$conexao->conectar();

if ( isset($_POST['codigo']))
	$codigo = mysqli_real_escape_string($conexao->con, $_POST['codigo']);
if ( isset($_POST['descricao']) )
	$descricao = mysqli_real_escape_string($conexao->con, $_POST['descricao']);
if ( isset($_POST['preco']))
	$preco = mysqli_real_escape_string($conexao->con, $_POST['preco']);
if ( $descricao && $preco && $codigo) {
	$q = "SELECT codigo FROM produto WHERE codigo = '$codigo'";
	$r = mysqli_query($conexao->con, $q);

	if ( $r !== false && mysqli_num_rows($r) > 0 ) {
		echo "<a>Produto não cadastrado, código já existente!</a>";

	}else {
		echo "<a>Produto cadastrado!</a>";
		$sql = "INSERT INTO produto (codigo, descricao,preco) VALUES('$codigo','$descricao','$preco')";
		return mysqli_query($conexao->con, $sql);

	}

} else {
	return false;
}

?>