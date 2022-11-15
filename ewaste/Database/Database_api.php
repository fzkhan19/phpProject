<?php
		
class Database_api{
		private $db_hostname; 
		private $db_database; 
		private $db_username; 
		private $db_password;
		private $conn;
		
		public function __construct(){
			$this->db_database = 'ewaste';
			$this->db_hostname = 'localhost';  
			$this->db_username = 'root'; 
			$this->db_password = '';
		}
/*---------------------------------------------------------------------------------*/		
		private function connect(){
			$this->conn = mysqli_connect($this->db_hostname, $this->db_username, $this->db_password, $this->db_database);
			if (mysqli_connect_errno()) {
  				echo "Failed to connect to MySQL: " . mysqli_connect_error();
 				exit;
 			}
		}
		private function disconnect(){
			mysqli_close($this->conn);
		}
		public function dbselect(){
			mysqli_select_db($this->conn,$this->db_database) or die("Unable to select database: ".mysqli_error($this->conn));
		}
		public function execute($query){
			$this->connect();
			$result = mysqli_query($this->conn,$query);
			$this->disconnect();
			return $result;
		}
/*----------------------------------------------------------------------------------*/
		public function authenticate($username,$password){
			$this->connect();
			$query = "SELECT * from user WHERE username='$username' AND password='$password'";
			$result = mysqli_query($this->conn,$query);
			if(mysqli_num_rows($result)==0){
				$this->disconnect();
				return false;
			}
			$row = array();
			$temp = mysqli_fetch_assoc($result);
			$row['uid'] = $temp['id'];
			$row['name'] = $temp['name'];
			$row['type'] = $temp['type'];
			$this->disconnect();
			return $row; //if 1 then it is valid else not valid
		}

		public function insertUser($name,$email,$type,$address,$phone,$username,$password)
		{
			$this->connect();
			$query = "INSERT INTO user (name,email,type,address,phone,username,password) VALUES('$name','$email','$type','$address','$phone','$username','$password')";
			//echo $query;
			$result = mysqli_query($this->conn,$query);
			if($result == false){
				$_SESSION['notification'] = "Username Already Taken.";
				return false;
			}
			else{
				$_SESSION['notification'] = "Sucsessfully Registered";
			}
			$this->disconnect();
			return true;
		}
		
		public function updateUser($name,$email,$address,$phone)
		{
			$this->connect();
			$query = "UPDATE user set name='$name', email='$email', address='$address', phone='$phone' WHERE id = ".$_SESSION['uid']."";
			//die($query);
			$result = mysqli_query($this->conn,$query);
			if($result == false){
				$_SESSION['notification'] = "Unable to update";
				return false;
			}
			else{
				$_SESSION['notification'] = "Sucsessfully Updated";
				$_SESSION['name'] = $name;
			}
			$this->disconnect();
			return true;
		}

/*---------------INSERTING-------------------------------------------------------------------*/
		public function insertProduct($name)
		{
			$this->connect();
			$query = "INSERT INTO products (uid,name,date) VALUES(".$_SESSION['uid'].",'$name','".date("Y-m-d")."')";
			//die($query);
			$result = mysqli_query($this->conn,$query);
			if($result == false){
				$_SESSION['notification'] = "Error in inserting : ".mysqli_error($this->$conn);
				$this->disconnect();
				return false;
			}
			else{
				$_SESSION['notification'] = "Successfully Inserted";
				$this->disconnect();
				return true;
			}				

		}
				
/*---------------FETCHING-------------------------------------------------------------------*/
		public function getProfile(){
			$this->connect();
			$query = "SELECT * FROM user WHERE id=".$_SESSION['uid']."";
			$result = mysqli_query($this->conn,$query);
			$this->disconnect();
			return $result;
		}
		
		public function getProducts(){
			$this->connect();
			$query = "SELECT * FROM products WHERE uid=".$_SESSION['uid']." ORDER BY date desc LIMIT 50";
			$result = mysqli_query($this->conn,$query);
			$this->disconnect();
			return $result;
		}

		public function getProducts_filter($filter){
			$this->connect();
			$query = "SELECT u.id'uid',p.id'pid',u.name'username',p.name'productname',u.address,p.date,p.status FROM products p JOIN user u ON p.uid=u.id WHERE p.status='".$filter."' LIMIT 50";
			//die($query);
			$result = mysqli_query($this->conn,$query);
			$this->disconnect();
			return $result;
		}
		public function getProducts_2filter($filter1,$filter2){
			$this->connect();
			$query = "SELECT u.id'uid',p.id'pid',u.name'username',p.name'productname',u.address,p.date,p.status FROM products p JOIN user u ON p.uid=u.id WHERE p.status='".$filter1."' OR p.status='".$filter2."' LIMIT 50";
			//die($query);
			$result = mysqli_query($this->conn,$query);
			$this->disconnect();
			return $result;
		}

/*---------------UPDATING-------------------------------------------------------------------*/
		
		public function updateProductStatus($id,$status){
			$this->connect();
			$query = "UPDATE products SET status='$status' where id=$id";
			$result = mysqli_query($this->conn,$query);
			$this->disconnect();
			if($result == false){
				$_SESSION['notification'] = "Error in updating in Database";
				return false;
			}
			else{
				return true;
			}
		}

/*---------------DELETING-------------------------------------------------------------------*/
		
public function deleteProduct($id){
	$this->connect();
	$query = "DELETE FROM products where id=$id";
	$result = mysqli_query($this->conn,$query);
	$this->disconnect();
	if($result == false){
		$_SESSION['notification'] = "Error in deleting in Database";
		return false;
	}
	else{
		$_SESSION['notification'] = "Product Deleted successfully";
		return true;
	}
}
}	
?>