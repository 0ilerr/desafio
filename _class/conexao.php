<?php

class conexao {

	var $host = 'localhost';
	var $usuario = 'root';
	var $senha = '';
	var $bd = 'sistemavendas';
	var $con;
	var $codigo;

	public function conectar() 
	{
		/*Inicia conexao*/
		$this->con = mysqli_connect($this->host,$this->usuario,$this->senha)
		or die("Não foi possível conectar. " . mysqli_error());
		mysqli_select_db($this->con, "sistemavendas")
		or die("Não foi possível selecionar o BD. " . mysqli_error());
		/*Criar as tres tabelas*/
		$this->criarProduto();
		$this->criarDocumento();
		$this->criarItem();
	}
	private function criarProduto() 
	{
		$sql = <<<MySQL_QUERY
		CREATE TABLE IF NOT EXISTS produto (
		codigo INT(11) NOT NULL,
		descricao VARCHAR(150),
		preco double,
		PRIMARY KEY (codigo)
		)
		MySQL_QUERY;
		return mysqli_query($this->con, $sql);
	}	
	private function criarDocumento() 
	{
		$sql = <<<MySQL_QUERY
		CREATE TABLE IF NOT EXISTS documento (
		numero INT(11) NOT NULL AUTO_INCREMENT,
		total double,
		confirmado VARCHAR(150),
		PRIMARY KEY (numero)
		)
		MySQL_QUERY;
		return mysqli_query($this->con, $sql);
	}
	private function criarItem() 
	{
		$sql = <<<MySQL_QUERY
		CREATE TABLE IF NOT EXISTS item (
		idDocumento INT(11) NOT NULL,
		idProduto INT(11) NOT NULL
		)
		MySQL_QUERY;
		return mysqli_query($this->con, $sql);
	}
}
?>
