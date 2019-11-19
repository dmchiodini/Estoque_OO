<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<h1>ESTOQUE</h1>

<?php
include "estoque.class.php";

$produto = new Produto();

$lista = $produto->getAll();

?>

<div class="container">
<a class="add" href="adicionar.php">Adicionar Produto</a>
<table border="1" width="800">
		<tr>
			<th>CÓDIGO</th>
			<th>NOTA FISCAL</th>
			<th>MARCA</th>
			<th>PRODUTO</th>
			<th>PREÇO</th>
			<th>AÇÕES</th>
		</tr>
<?php
foreach($lista as $info): ?>

		<tr>
			<td><?php echo $info['id']; ?></td>
			<td><?php echo $info['nf']; ?></td>
			<td><?php echo $info['marca']; ?></td>
			<td><?php echo $info['produto']; ?></td>
			<td>R$ <?php echo number_format($info['preco'], '2', ',', '.'); ?></td>
			<td class="action">
				<a class="button-ed" href="edit.php?id=<?php echo $info['id']; ?>">Editar</a>
				<a class="button-del" href="delete.php?id=<?php echo $info['id']; ?>">Excluir</a>
			</td>
		</tr>

<?php endforeach; ?>

</table>
</div>
</body>
</html>