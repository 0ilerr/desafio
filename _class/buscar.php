<?php
/*Algoritimo para buscar o produto que ira ser incluido na lista de venda*/
if (isset($_GET["codigo"])) {
    $codigo = $_GET["codigo"];
    $idDocumento = 111;
    // Conexao com o banco de dados
    include_once 'conexao.php';

    $conexao = new conexao();
    $conexao->conectar();
    $produtos = array();

    $sqlProcDoc = "SELECT numero FROM documento WHERE numero = '$idDocumento' ";
    
    $sqlProcDoc2 = "SELECT numero FROM documento ORDER BY numero ASC ";
    

    $resultDoc = mysqli_query($conexao->con,$sqlProcDoc);
    
    $contDoc = mysqli_affected_rows($conexao->con);
    $resultDoc2 = mysqli_query($conexao->con,$sqlProcDoc2);
     // Verifica se a consulta retornou linhas 
    if ($contDoc > 0) {
       while ($linha = mysqli_fetch_array($resultDoc2)) {
        $id = utf8_encode($linha["numero"]);
        $idDocumento = (int)$id;
        $idDocumento = $idDocumento + 1;
    }
}
    // Verifica se a variável está vazia

$sqlProcurarProd = "SELECT * FROM produto WHERE codigo like '$codigo'";

$resultBusc = mysqli_query($conexao->con,$sqlProcurarProd);
$cont = mysqli_affected_rows($conexao->con);
$return = "";
    // Verifica se a consulta retornou linhas 
if ($cont > 0) {
   while ($linha = mysqli_fetch_array($resultBusc)) {
    $idProduto = utf8_encode($linha["codigo"]);
    $return.= utf8_encode($linha["codigo"]) . "-";
    $return.= utf8_encode($linha["descricao"]) . "-";
    $return.= utf8_encode($linha["preco"])."-";
    $return.= $idDocumento;

    $sqlCadItem2 = "INSERT INTO item (idDocumento, idProduto) VALUES('$idDocumento','$idProduto')";
    $resultItem2 = mysqli_query($conexao->con,$sqlCadItem2);

    echo $return;

}
}else {
        // Se a consulta não retornar nenhum valor, exibi mensagem para o usuário
    echo $return.="Produto não cadastrado.";
}

}
?>