<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width-device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">    
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">  
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Sistema Vendas</title>
</head>
<body>
    <script type="text/javascript" src="js/ajax.js"></script>
    <div class="card-title pricing-card-title">
        <h1 class="display-4">Fazer Venda</h1>
        <div class="card-body">
            <a href='index.php'>Voltar</a>
        </br>
    </br>
    <div class="form-group">
        <label >Produto:</label>
        <input class="form-control" type="number" name="codigo" id="codigo"/> 
    </div>
    <input class="btn btn-primary my-2" type="button" name="btnPesquisar" value="Ok" onclick="getDados();"/>
</div>
<div class="card-body" id="Resultado"></div>
<div class="card-body">
    <input class="btn btn-primary my-2" type="button" name="btnCancelar" value="Cancelar" onclick="cancelar();"/>
    <input class="btn btn-primary my-2" type="button" name="btnConfirmar" value="Confirmar" onclick="confirmar();"/>
</div>
</div>
</body>
</html>