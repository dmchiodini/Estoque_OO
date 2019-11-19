<?php
include "estoque.class.php";

$adicionar = new Produto();

if(!empty($_POST['nf'])) {
	$nf = addslashes($_POST['nf']);
	$marca = addslashes($_POST['marca']);
	$produto = addslashes($_POST['produto']);
	$preco = addslashes(str_replace(',', '.', $_POST['preco']));

	$adicionar->create($nf, $marca, $produto, $preco);

	header("Location: index.php");
}

?>

<form method="POST">

Nota Fiscal:<br/>
<input type="text" name="nf" /><br/><br/>

Marca:<br/>
<input type="text" name="marca" /><br/><br/>

Produto:<br/>
<input type="text" name="produto" /><br/><br/>

Preço: <br/>
R$ <input type="text" name="preco" /><br/><br/>


<input type="submit" value="Adicionar" /><br/><br/>


</form>