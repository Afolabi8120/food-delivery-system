<?php

	class Admin {

		protected $pdo;

		function __construct($pdo){
			$this->pdo = $pdo;
		}

		public function validateInput($var){
			$var = htmlspecialchars($var);
			$var = trim($var);
			$var = stripcslashes($var);
			return $var;
		}

		public function count($table){
			$stmt = $this->pdo->prepare("SELECT * FROM `$table` ");
			$stmt->execute();

			if($stmt->rowCount() > 0){
				return $stmt->rowCount();
			}else{
				return "0";
			}

		}

		public function countByColumn($table,$column,$value){
			$stmt = $this->pdo->prepare("SELECT COUNT(`$column`) FROM `$table` WHERE `$column` = '$value' ");
			$stmt->execute();

			$count = $stmt->fetchColumn();

			if($count > 0){
				return $count;
			}else{
				return "0";
			}

		}

		public function sumColumn($table,$column,$value){
			$stmt = $this->pdo->prepare("SELECT SUM(`$column`) FROM `$table` WHERE `$column` = '$value' ");
			$stmt->execute();

			$count = $stmt->fetchColumn();

			if($count > 0){
				return $count;
			}else{
				return "0";
			}

		}

		public function check($table,$column,$value){
			$stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `$column` = :value ");
			$stmt->bindParam(":value",$value, PDO::PARAM_STR);
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			if($count > 0){
                return true;
			}else{
				return false;
			}
		}

		public function delete($table,$column,$value){
			$stmt = $this->pdo->prepare("DELETE FROM `$table` WHERE `$column` = :value ");
			$stmt->bindParam(":value",$value, PDO::PARAM_STR);
			$stmt->execute();
			return true;
		}

		public function selectAll($table){
			$stmt = $this->pdo->prepare("SELECT * FROM `$table` ");
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function selectAllRand($table){
			$stmt = $this->pdo->prepare("SELECT * FROM `$table` ORDER BY RAND() ");
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function selectAllAsc($table,$column){
			$stmt = $this->pdo->prepare("SELECT * FROM `$table` ORDER BY `$column` ASC ");
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function selectAllDesc($table,$column){
			$stmt = $this->pdo->prepare("SELECT * FROM `$table` ORDER BY `$column` DESC ");
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function fetch($table){
			$stmt = $this->pdo->prepare("SELECT * FROM `$table` ");
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		public function selectWhere($table,$column,$value){
			$stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `$column` = :value ");
			$stmt->bindParam(":value",$value, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function selectWhereDesc($table,$column,$value,$col){
			$stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `$column` = :value ORDER BY `$col` DESC ");
			$stmt->bindParam(":value",$value, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function selectDistinctWhere($table,$column,$value){
			$stmt = $this->pdo->prepare("SELECT DISTINCT(`$column`) FROM `$table` WHERE `$column` = :value ");
			$stmt->bindParam(":value",$value, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function fetchSingle($table,$column,$value){
			$stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `$column` = :value ");
			$stmt->bindParam(":value",$value, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		public function changeStatus($table,$column1,$value1,$column2,$value2){
			$stmt = $this->pdo->prepare("UPDATE `$table` SET `$column1` = :value1 WHERE `$column2` = :value2 ");
			$stmt->bindParam(":value1",$value1, PDO::PARAM_INT);
			$stmt->bindParam(":value2",$value2, PDO::PARAM_INT);
			$stmt->execute();
			return true;
		}

		public function checkTwoColumns($table,$column1,$value1,$column2,$value2){
			$stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `$column1` = :value1 AND `$column2` = :value2 ");
			$stmt->bindParam(":value1",$value1, PDO::PARAM_INT);
			$stmt->bindParam(":value2",$value2, PDO::PARAM_INT);
			$stmt->execute();
			
			$count = $stmt->rowCount();

			if($count > 0){
                return $count;
			}else{
				return "0";
			}
		}

		public function select($table,$column,$value){
			$stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `$column` = :value ");
			$stmt->bindParam(":value",$value, PDO::PARAM_STR);
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			if($count > 0){
                return true;
			}else{
				return false;
			}
		}

	}

?>