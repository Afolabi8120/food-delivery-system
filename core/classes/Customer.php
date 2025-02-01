<?php

	class Customer extends Admin {

		protected $pdo;

		function __construct($pdo){
			$this->pdo = $pdo;
        }

        // check if email already exist
		public function checkEmail($email){
        	$stmt = $this->pdo->prepare("SELECT email FROM tblcustomers WHERE email = :email");
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
        	$stmt = $this->pdo->prepare("SELECT phone FROM tbluser WHERE phone = :phone");
        	$stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
        	$stmt->execute();

        	$count = $stmt->rowCount();

        	if($count > 0){
				return true;
			}else{
				return false;
			}
        }

        // create new customer
        public function addCustomer($fullname,$email,$password,$chat_code){
			$stmt = $this->pdo->prepare("INSERT INTO tblcustomers (fullname,email,password,chat_code) VALUES(:fullname,:email,:password,:chat_code)");
			$stmt->bindParam(":fullname", $fullname, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->bindParam(":chat_code", $chat_code, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		// edit customer's account
        public function editCustomer($user_id,$fullname,$email,$phone,$gender,$address){
			$stmt = $this->pdo->prepare("UPDATE tblcustomers SET fullname=:fullname,email=:email,phone=:phone,gender=:gender,address=:address WHERE id=:user_id ");
			$stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
			$stmt->bindParam(":fullname", $fullname, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
			$stmt->bindParam(":gender", $gender, PDO::PARAM_STR);
			$stmt->bindParam(":address", $address, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		// change customer's password
        public function changeCustomerPassword($user_id,$password){
			$stmt = $this->pdo->prepare("UPDATE tblcustomers SET password=:password WHERE id=:user_id ");
			$stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		// change customer's picture
        public function changeCustomerPicture($user_id,$picture){
			$stmt = $this->pdo->prepare("UPDATE tblcustomers SET picture=:picture WHERE id=:user_id ");
			$stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
			$stmt->bindParam(":picture", $picture, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function selectCustomerDistinctOrder($value){
			$stmt = $this->pdo->prepare("SELECT DISTINCT(`invoiceno`) FROM `tblcart` WHERE `user_id` = :value ");
			$stmt->bindParam(":value",$value, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

        public function getCustomerOrders($user_id){
			$stmt = $this->pdo->prepare("SELECT DISTINCT(c.invoiceno),c.*,pay.* FROM tblcart AS c INNER JOIN tblpayment AS pay ON pay.invoiceno = c.invoiceno WHERE c.user_id = :user_id ");
			$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_OBJ);

		}

		public function printOrderStatusBadge($invoiceno){
        	$stmt = $this->pdo->prepare("SELECT * FROM tblpayment WHERE invoiceno = :invoiceno");
        	$stmt->bindParam(":invoiceno", $invoiceno, PDO::PARAM_STR);
        	$stmt->execute();
        	
        	$result = $stmt->fetch(PDO::FETCH_ASSOC);

        	switch ($result['delivery_status']) {
        		case '0':
        			echo '<span class="badge bg-dark text-white">Processing</span>';
        			break;
        		case '1':
        			echo '<span class="badge bg-success text-white">Delivered</span>';
        			break;
        		case '2':
        			echo '<span class="badge bg-warning text-white">Confirmed</span>';
        			break;
        		case '3':
        			echo '<span class="badge bg-info text-white">Delivery in Progress</span>';
        			break;
        		default:
        			echo '<span class="badge bg-danger text-white">Cancelled</span>';
        			break;
        	}

        }

        public function showUserStatusBadge($id){
        	$stmt = $this->pdo->prepare("SELECT * FROM tblcustomers WHERE id = :id");
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

        public function printTrackOrder($invoiceno,$delivery_status){
        	$stmt = $this->pdo->prepare("SELECT * FROM tbltrack WHERE invoiceno = :invoiceno AND delivery_status=:delivery_status");
        	$stmt->bindParam(":invoiceno", $invoiceno, PDO::PARAM_STR);
        	$stmt->bindParam(":delivery_status", $delivery_status, PDO::PARAM_STR);
        	$stmt->execute();
        	
        	$result = $stmt->fetch(PDO::FETCH_ASSOC);

        	switch ($result['delivery_status']) {
        		case '0':
        			echo '<li class="timeline-item active mb-2">
							<h6 class="timeline-tilte">Processing</h6>
							<p class="timeline-date">'. $result['date'] .'</p>
						</li>';
        			break;
        		case '1':
        			echo '<li class="timeline-item active mb-2">
							<h6 class="timeline-tilte">Delivered</h6>
							<p class="timeline-date">'. $result['date'] .'</p>
						</li>';
        			break;
        		case '2':
        			echo '<li class="timeline-item active mb-2">
							<h6 class="timeline-tilte">Confirmed</h6>
							<p class="timeline-date">'. $result['date'] .'</p>
						</li>';
        			break;
        		case '3':
        			echo '<li class="timeline-item active mb-2">
							<h6 class="timeline-tilte">Delivery in Progress</h6>
							<p class="timeline-date">'. $result['date'] .'</p>
						</li>';
        			break;
        		default:
        			echo '<li class="timeline-item active mb-2">
							<h6 class="timeline-tilte">Cancelled</h6>
							<p class="timeline-date">'. $result['date'] .'</p>
						</li>';
        			break;
        	}

        }
		
	}

?>