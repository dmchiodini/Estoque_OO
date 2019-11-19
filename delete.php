<?php
include "estoque.class.php";
$excluir = new Produto();

if(isset($_GET['id'])){
	$id = $_GET['id'];

	$excluir->delete($id);
}



header("Location: index.php");