<?php

	class Dispatch {

		protected $pdo;

		function __construct($pdo){
			$this->pdo = $pdo;
		}

        // check if email already exist
		public function checkEmail($email){
        	$stmt = $this->pdo->prepare("SELECT email FROM tbldispatch WHERE email = :email");
        	$stmt->bindParam(":email", $email, PDO::PARAM_STR);
        	$stmt->execute();

        	$count = $stmt->rowCount();

        	if($count > 0){
				return true;
			}else{
				return false;
			}
        }

        // check if phone number already exist
		public function checkPhone($phone){
        	$stmt = $this->pdo->prepare("SELECT phone FROM tbldispatch WHERE phone = :phone");
        	$stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
        	$stmt->execute();

        	$count = $stmt->rowCount();

        	if($count > 0){
				return true;
			}else{
				return false;
			}
        }

        // create new dispatch
        public function addDispatch($fullname,$email,$phone,$password,$picture,$address){
			$stmt = $this->pdo->prepare("INSERT INTO tbldispatch (fullname,email,phone,password,picture,address) VALUES(:fullname,:email,:phone,:password,:picture,:address)");
			$stmt->bindParam(":fullname", $fullname, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->bindParam(":picture", $picture, PDO::PARAM_STR);
			$stmt->bindParam(":address", $address, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		// edit dispatch account
        public function editDispatch($user_id,$fullname,$email,$phone,$picture,$address){
			$stmt = $this->pdo->prepare("UPDATE tbldispatch SET fullname=:fullname,email=:email,phone=:phone,picture=:picture,address=:address WHERE id=:user_id ");
			$stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
			$stmt->bindParam(":fullname", $fullname, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
			$stmt->bindParam(":picture", $picture, PDO::PARAM_STR);
			$stmt->bindParam(":address", $address, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		// edit dispatch account
        public function editDispatch2($user_id,$fullname,$email,$phone,$address){
			$stmt = $this->pdo->prepare("UPDATE tbldispatch SET fullname=:fullname,email=:email,phone=:phone,address=:address WHERE id=:user_id ");
			$stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
			$stmt->bindParam(":fullname", $fullname, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
			$stmt->bindParam(":address", $address, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		// change dispatch password
        public function changeUserPassword($user_id,$password){
			$stmt = $this->pdo->prepare("UPDATE tbldispatch SET password=:password WHERE id=:user_id ");
			$stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		// change dispatch picture
        public function changeDispatchPicture($user_id,$picture){
			$stmt = $this->pdo->prepare("UPDATE tbldispatch SET picture=:picture WHERE id=:user_id ");
			$stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
			$stmt->bindParam(":picture", $picture, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function change_status($user_id,$status){
			$stmt = $this->pdo->prepare("UPDATE tbldispatch SET status=:status WHERE id=:user_id ");
			$stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
			$stmt->bindParam(":status", $status, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function showUserBadgeStatus($user_id){
        	$stmt = $this->pdo->prepare("SELECT * FROM tbldispatch WHERE id = :user_id");
        	$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        	$stmt->execute();
        	
        	$getStatus = $stmt->fetch(PDO::FETCH_ASSOC);

        	if($getStatus['status'] == '1'){
        		echo '<span class="badge badge-success mb-3">Active</span>';
        	}else if($getStatus['status'] == '0'){
        		echo '<span class="badge badge-danger mb-3">Not Active</span>';
        	}
        }

        # assign dispatch to delivery
        public function assignDispatch($dispatch_id,$invoiceno){
			$stmt = $this->pdo->prepare("INSERT INTO tblassign_delivery (dispatch_id,invoiceno) VALUES(:dispatch_id,:invoiceno)");
			$stmt->bindParam(":dispatch_id", $dispatch_id, PDO::PARAM_STR);
			$stmt->bindParam(":invoiceno", $invoiceno, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		# update dispatch delivery status
        public function updateDispatchDeliveryStatus($dispatch_id,$invoiceno,$status){
			$stmt = $this->pdo->prepare("UPDATE tblassign_delivery SET status=:status WHERE dispatch_id=:dispatch_id AND invoiceno=:invoiceno");
			$stmt->bindParam(":dispatch_id", $dispatch_id, PDO::PARAM_STR);
			$stmt->bindParam(":invoiceno", $invoiceno, PDO::PARAM_STR);
			$stmt->bindParam(":status", $status, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function showUserStatusBadge($id){
        	$stmt = $this->pdo->prepare("SELECT * FROM tbldispatch WHERE id = :id");
        	$stmt->bindParam(":id", $id, PDO::PARAM_STR);
        	$stmt->execute();
        	
        	$result = $stmt->fetch(PDO::FETCH_ASSOC);

        	switch ($result['status']) {
        		case '0':
        			echo '<span class="badge bg-danger">Not Active</span>';
        			break;
        		case '1':
        			echo '<span class="badge bg-success">Active</span>';
        			break;
        	}

        }
		
	}

?>