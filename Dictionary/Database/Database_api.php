<?php
	
class Database_api{
		private $db_hostname; 
		private $db_database; 
		private $db_username; 
		private $db_password;
		private $conn;
			
		public function __construct($database){
			$this->db_database = $database;
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
			$query = "SELECT username,password from user WHERE username='$username' AND password='$password'";
			$row = mysqli_num_rows(mysqli_query($this->conn,$query));
			$this->disconnect();
			return $row;
		}
		public function unscramble($str){
			$this->connect();
			$query = "SELECT DISTINCT s.word, s.synset_id, s.w_num, s.ss_type, s.sense_number, s.tag_count, s.word_arranged, g.gloss FROM wn_synset s,wn_gloss g WHERE s.word_arranged='$str' AND s.synset_id=g.synset_id ORDER BY s.word";
			$result = mysqli_query($this->conn,$query);
			$this->disconnect();
			return $result;
		}
	}
?>