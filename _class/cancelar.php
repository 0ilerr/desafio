<?php
/*Algoritimo para cadastrar uma venda que foi cancelada*/
if (isset($_GET["codigo"])) {
    $codigo = $_GET["codigo"];
   // Conexao com o banco de dados
    include_once 'conexao.php';

    $conexao = new conexao();
    $conexao->host = 'localhost';
    $conexao->usuario = 'root';
    $conexao->senha = '';
    $conexao->bd = 'sistemavendas';
    $conexao->conectar();
    $produtos = array();

    $resultado = explode('-', $codigo);
    $numero = $resultado[0];
    $total = $resultado[1];
    $cancela = "FALSE";

    if ($total!=0) {

        $sql = "INSERT INTO documento (numero, total, confirmado) VALUES('$numero','$total', '$cancela')";
        mysqli_query($conexao->con,$sql);

    }

}
?>