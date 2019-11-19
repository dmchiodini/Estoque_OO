<?php
class Produto {

	private $pdo;

	public function __construct() {

		$this->pdo = new PDO("mysql:dbname=estoque_oo;host=localhost", "root", "");
	}

	public function create($nf, $marca, $produto, $preco) {
		$sql = "INSERT INTO produtos SET nf = :nf, marca = :marca, produto = :produto, preco = :preco";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":nf", $nf);
		$sql->bindValue(":marca", $marca);
		$sql->bindValue(":produto", $produto);
		$sql->bindValue(":preco", $preco);
		$sql->execute();

		return true;
	}

	public function getId($id) {
		if($this->verifiqueId($id)) {
			$sql = "SELECT * FROM produtos WHERE id = :id";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(":id", $id);
			$sql->execute();

			if($sql->rowCount() > 0) {
				$info = $sql->fetch();

				return $info;
			}

		return '';

		}
	}

	public function getAll() {
		$sql = "SELECT * FROM produtos";
		$sql = $this->pdo->query($sql);
		if($sql->rowCount() > 0){
			return $sql->fetchAll();
		}

		return array();
	}

	public function update($nf, $marca, $produto, $preco, $id){
		if($this->verifiqueId($id) == true) {
			$sql = "UPDATE produtos SET nf = :nf, marca = :marca, produto = :produto, preco = :preco WHERE id = :id";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(":nf", $nf);
			$sql->bindValue(":marca", $marca);
			$sql->bindValue(":produto", $produto);
			$sql->bindValue(":preco", $preco);
			$sql->bindValue(":id", $id);
			$sql->execute();
			
			return true;
		} else {
			return false;
		}
	}	

	public function delete($id) {
		if($this->verifiqueId($id) == true) {
			$sql = "DELETE FROM produtos WHERE id = :id";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(":id", $id);
			$sql->execute();

			return true;
		}

		return false;
	}


	private function verifiqueId($id) {
		$sql = "SELECT * FROM produtos WHERE id = :id";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(":id", $id);
			$sql->execute();

			if($sql->rowCount() > 0){
				return true;
			}

			return false;
	}

















}