<?php

class Database{

		private $connection = null;

		public function __construct($dbname){
			try{
				$this->connection = new PDO("mysql:host=localhost;dbname=$dbname","root","");
			}
			catch(Exception $e){
				echo $e->getMessage();
			}
		}

		public function selectAll($tableName){

				try{
					$query = $this->connection->prepare("
						select * from $tableName");
					$query->execute();
					$result = $query->fetchAll();
				}
				catch(Exception $e){
					echo $e->getMessage();
				}
				return $result;
		}

		public function selectOne($tableName, $id){
			try {
				$query = $this->connection->prepare("select * FROM $tableName where id = ?");
				$query->execute([$id]);

				$result = $query->fetch();
			}
			catch(Exception $e){
				echo $e->getMessage();
			}

			return $result;
		}
	}

	try{
		$connection = new PDO("mysql:host=localhost;dbname=eshop","root","");
	}
	catch(Exception $e) {
		echo $e->getMessage();
		// echo "BD OFF";
	}

	function getUser($login){
		global $connection;

		try {
			$query = $connection->prepare("
				select u.id, u.login, u.password, u.fullname, r.rolename, r.code 
				FORM users u
				INNER JOIN roles r ON u.role_id = r.id
				where u.login = ?");
			$query->execute([$login]);
			$result = $query->fetch();
			// var_dump($result);

		}
		catch(Exception $e){
			// echo $e->getMessage();
			// echo "</br>";
			// echo "ERROR!";
			// echo "</br>";
		}
		// return $result;
	}

	function getAllGoods(){
		global $connection;

		try{
			$query = $connection->prepare("
				SELECT g.id, g.name, g.description, g.price, g.qty, g.image, c.name as cname
				FROM goods g
				INNER JOIN categories c ON g.category_id = c.id
				");
			$query->execute();
			$result = $query->fetchAll();
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
		return $result;
	}

	function getAllCategories(){
		global $connection;

		try {
			$query = $connection->prepare("
				select * from categories;
				");
			$query->execute();
			$result = $query->fetchAll();
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
		return $result;
	}

	function registerUser ($login, $password, $fullname){
		global $connection;

		try {
			$query = $connection->prepare("INSERT INTO users(login, password, fullname) values (?,?,?)");
			$query ->execute([$login, $password, $fullname]);
			
		} catch (Exception $e) {
			echo $e->getMessage;
		}
	}

	function addCategory($name, $description){
		global $connection;

		try {
			$query = $connection->prepare("INSERT INTO categories(name, description) values (?,?)");
			$query ->execute([$name, $description]);
			
		} catch (Exception $e) {
			echo $e->getMessage;
		}
	}

	function addGood($name, $description, $price, $qty, $image, $category_id){
		global $connection;

		try {
			$query = $connection->prepare("INSERT INTO goods(name, description, price, qty, image, category_id) values (?,?,?,?,?,?)");
			$query ->execute([$name, $description, $price, $qty, $image, $category_id]);
			
		} catch (Exception $e) {
			echo $e->getMessage;
		}
	}

	function getGood($id){
		global $connection;

		try{
			$query = $connection->prepare("select * FROM goods where id = ?"); 
			$query ->execute([$id]);

			$result = $query->fetch();
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
		return $result;
	}


	function updateGood($id, $name, $description, $price, $qty, $image, $category_id){
		global $connection;

		try {
			$query = $connection->prepare("UPDATE goods SET name=:nm, description=:dr, price=:pr, qty=:qt, image=:img, category_id=:ci WHERE id=:id");
			$query ->execute(
				array(
					"nm" => $name,
					"dr" => $description,
					"pr" => $price,
					"qt" => $qty,
					"img" => $image,
					"ci" => $category_id,
					"id" => $id
				)
			);
			
		} catch (Exception $e) {
			echo $e->getMessage;
			echo "Error on UPDATE!";
		}
	}

	function deleteGood ($id){
		global $connection;

		try {
			$query = $connection->prepare("DELETE FROM goods WHERE id=?");
			$query ->execute([$id]);
			
		} catch (Exception $e) {
			echo $e->getMessage;
		}
	}

	function getGoodsCount($cid){
		global $connection;

		try{
			$query = $connection->prepare("
				SELECT count(*)
				FROM goods 
				WHERE category_id = ? 
				");
			$query->execute([$cid]);
			$result = $query->fetchAll();
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
		return $result[0];
	}

	function deleteCategory ($id){
		global $connection;

		if (getGoodsCount($id) > 0){
			return false;
		}

		try {
			$query = $connection->prepare("DELETE FROM categories WHERE id=?");
			$result = $query ->execute([$id]);
			
		} catch (Exception $e) {
			echo $e->getMessage;
		}

		return true;
	}
?>