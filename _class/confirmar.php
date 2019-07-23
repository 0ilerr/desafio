<?php
/*Algoritimo para cadastrar uma venda que foi confirmada*/
if (isset($_GET["codigo"])) {
    $codigo = $_GET["codigo"];
   // Conexao com o banco de dados
    include_once 'conexao.php';

    $conexao = new conexao();
    $conexao->conectar();
    $produtos = array();

    $resultado = explode('-', $codigo);
    $numero = $resultado[0];
    $total = $resultado[1];
    $confirma = "TRUE";

    if ($total!=0) {

        $sql = "INSERT INTO documento (numero, total, confirmado) VALUES('$numero','$total', '$confirma')";
        mysqli_query($conexao->con,$sql);

    }
}
?>