<?php
	
class Database_api{
		private $db_hostname; 
		private $db_database="homeservice"; 
		private $db_username; 
		private $db_password;
		private $conn;

		public function __construct(){
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

		public function insertUser($name,$email,$type,$username,$password)
		{
			$this->connect();
			$query = "INSERT INTO user (name,email,type,username,password) VALUES('$name','$email','$type','$username','$password')";
			//echo $query;
			$result = mysqli_query($this->conn,$query);
			if($result == false){
				$_SESSION['notification'] = "Username Already Taken.";
				return false;
			}
			$this->disconnect();
			return true;
		}
		

/*---------------INSERTING-------------------------------------------------------------------*/
		public function insertCropProduction($uid,$dd,$mm,$yyyy,$name,$amt)
		{
			$this->connect();
			$query = "INSERT INTO production (cid,dd,mm,yyyy,name,amount) VALUES('$uid',$dd,$mm,$yyyy,'$name',$amt)";
			//echo $query;
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
		
		public function insertJob($name,$info,$img)
		{
			$this->connect();
			$query = "INSERT INTO jobs (name,info,img) VALUES('$name','$info','$img')";
			//echo $query;
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
		public function insertNews($id,$date,$title,$news,$img)
		{
			$this->connect();
			$query = "INSERT INTO news (title,news,added_by,date,img) VALUES('$title','$news',$id,'$date','$img')";
			echo $query;
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
		
		public function applyForScheme($uid,$sid)
		{
			$this->connect();
			$d = date("Y-m-d");
			$query = "INSERT INTO applied_schemes (uid,sid,applied_on) VALUES($uid,$sid,'$d')";
			//echo $query;
			$result = mysqli_query($this->conn,$query);
			if($result == false){
				$_SESSION['notification'] = "Failed to Applied for the scheme";
				return false;
			}
			$_SESSION['notification'] = "Successfully Applied for the scheme";
			$this->disconnect();
			return true;
		}
/*---------------FETCHING-------------------------------------------------------------------*/

		public function getProduction($uid){
			$this->connect();
			$query = "SELECT cid,CONCAT(dd,'-', mm,'-', yyyy) AS date,name,amount,status,id FROM production WHERE cid=$uid ORDER BY id desc LIMIT 20";
			$result = mysqli_query($this->conn,$query);
			$this->disconnect();
			return $result;

		}
		public function getProduction_filter($filter){
			$this->connect();
			$query = "SELECT p.id,u.name,CONCAT(p.dd,'-', p.mm,'-', p.yyyy) AS date,p.name,p.amount,p.status FROM production p LEFT OUTER JOIN user u ON u.id=p.cid WHERE p.status='$filter' ORDER BY p.id desc LIMIT 20";
			$result = mysqli_query($this->conn,$query);
			$this->disconnect();
			return $result;

		}
		public function getSchemes($id){
			$this->connect();
			$query = "SELECT id,uploaded_by,upload_date,name,vision,benefits,last_date,status,img FROM schemes WHERE id not in (SELECT DISTINCT sid from applied_schemes where uid=".$_SESSION['uid'].") AND status='Verified' ORDER BY upload_date desc LIMIT 20";
			$result = mysqli_query($this->conn,$query);
			$this->disconnect();
			return $result;

		}
		public function getSchemes_filter($filter){
			$this->connect();
			$query = "SELECT s.id,u.name'emp_name',s.upload_date,s.name,s.vision,s.benefits,s.last_date,s.status,s.img FROM schemes s INNER JOIN user u ON s.uploaded_by = u.id WHERE s.status='$filter' ORDER BY s.upload_date desc LIMIT 20";
			$result = mysqli_query($this->conn,$query);
			$this->disconnect();
			return $result;

		}


		public function getAppliedScheme_filter($filter){
			$this->connect();
			if ($_SESSION['type'] == "User") {
				$query = "SELECT s.name,aps.applied_on,aps.status from applied_schemes aps INNER JOIN schemes s ON aps.sid = s.id WHERE aps.status='$filter' AND aps.uid=".$_SESSION['uid']." ORDER BY aps.applied_on desc";
			}
			else{
				$query = "SELECT aps.id,u.id,u.name,s.id,s.name,aps.applied_on,aps.status from applied_schemes aps INNER JOIN user u ON aps.uid = u.id INNER JOIN schemes s ON aps.sid = s.id WHERE aps.status='$filter' ORDER BY aps.applied_on desc";
			}
			$result = mysqli_query($this->conn,$query);
			$this->disconnect();
			return $result;

		}

		public function getJobs($data){
			$this->connect();
			$query="";
			if(is_numeric($data)==1){
				$query = "SELECT * FROM news WHERE id = $data ORDER BY date desc";
			}
			elseif($data =="All"){
				$query = "SELECT * FROM jobs ORDER BY id desc";
			}
			else{
				$query = "SELECT * FROM jobs where status='$data' ORDER BY id desc LIMIT 20";
			}
			$result = mysqli_query($this->conn,$query);
			$this->disconnect();
			return $result;
		}

		

		public function getProduction_yyyy(){
			$this->connect();
			$query = "SELECT yyyy,AVG(amount) FROM `production` where cid=".$_SESSION['uid']." AND status='Verified' GROUP by yyyy";
			$result = mysqli_query($this->conn,$query);
			$this->disconnect();
			return $result;
		}



		
	
/*---------------UPDATING-------------------------------------------------------------------*/
		public function updateProductionStatus($id,$status){
			$this->connect();
			$query = "UPDATE production SET status='$status' where id=$id";
			$result = mysqli_query($this->conn,$query);
			$this->disconnect();
			if($result == false){
				return false;
			}
			else{
				return true;
			}
		}
		public function updateNewsStatus($id,$status){
			$this->connect();
			$query = "UPDATE news SET status='$status' where id=$id";
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
		public function updateSchemeStatus($id,$status){
			$this->connect();
			$query = "UPDATE schemes SET status='$status' where id=$id";
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
		public function updateAppliedSchemeStatus($id,$status){
			$this->connect();
			$query = "UPDATE applied_schemes SET status='$status' where id=$id";
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
/*---------------Misselanoues-------------------------------------------------------------------*/
		public function perfectDate($s){
			$d = explode('-',$s);
			$temp = sprintf("%02d", $d[0])."-".sprintf("%02d", $d[1])."-".sprintf("%02d", $d[2]);
			return $temp;
		}
}	
?>