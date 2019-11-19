<?php
include "estoque.class.php";

$editar = new Produto();

if(!empty($_GET['id'])){
	$id = $_GET['id'];

	if(!empty($_POST['id'])) {
		$nf = $_POST['nf'];
		$marca = $_POST['marca'];
		$produto = $_POST['produto'];
		$preco = str_replace(',','.', $_POST['preco']);
		$id = $_POST['id'];

		$editar->update($nf, $marca, $produto, $preco, $id);

		header("Location: index.php");
	}
	
}

$dado = $editar->getId($id);



?>

<form method="POST">
<input type="hidden" name="id" value="<?php echo $dado['id'] ?>">

Nota Fiscal:<br/>
<input type="text" name="nf" value="<?php echo $dado['nf']; ?>" /><br/><br/>

Marca:<br/>
<input type="text" name="marca" value="<?php echo $dado['marca']; ?>" /><br/><br/>

Produto:<br/>
<input type="text" name="produto" value="<?php echo $dado['produto']; ?>" /><br/><br/>

Preço: <br/>
R$ <input type="text" name="preco" value="<?php echo number_format($dado['preco'], '2', ',', '.'); ?>" /><br/><br/>


<input type="submit" value="Salvar" /><br/><br/>
</form>