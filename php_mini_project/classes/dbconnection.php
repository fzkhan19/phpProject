<?php

//declare(strict_types=1);

error_reporting(E_ERROR | E_WARNING | E_PARSE);

class dbconnection {   
   
   private $hostname = "localhost";
   private $username = "root";
   private $password = "";
   private $dbname = "immunera";
   protected $conn;

   
//----------------------------------------------------------
//----------------------------------------------------------
//-----------------## connection method ##------------------   
//----------------------------------------------------------
//----------------------------------------------------------
   
   protected function connection() {
      $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);

      if($this->conn == false) {
         die("connection error: " . mysqli_connect_error() );
      } 
   }
   
   
//----------------------------------------------------------
//----------------------------------------------------------
//----------------## die_connection method ##---------------   
//----------------------------------------------------------
//----------------------------------------------------------
   
   protected function die_connection() {
      mysqli_close($this->conn);
   }
   

//----------------------------------------------------------
//----------------------------------------------------------
//-----------------## authenticate method ##----------------
//----------------------------------------------------------
//----------------------------------------------------------
   
   public function authenticate(string $username, string $password) {
      
      $this->connection();
      
      $query = "SELECT account_status FROM user_master WHERE email='$username'";
      
      $row = mysqli_query($this->conn, $query);
      $status = mysqli_fetch_assoc($row);
      
      if($status['account_status'] == "1") {
      
         $query = "SELECT user_id FROM user_master WHERE email=? AND password=?";

         error_reporting(E_ERROR | E_WARNING | E_PARSE);

         try {
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ss", $username, md5($password));
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();

            if(isset($data['user_id'])) {
               return $data['user_id'];
            }
            else {
               return "false";
            }
         } 
         catch (Exception $ex) {
            return "Something went wrong";
         }
      }
      else {
         return "false";
      }
   }

   
//----------------------------------------------------------
//----------------------------------------------------------   
//-----------------## authenticate method ##----------------
//----------------------------------------------------------
//----------------------------------------------------------
   
   public function add_user(string $firstname, string $lastname, string $email, string $password) {
      
      $this->connection();
      
      $query = "SELECT user_id FROM user_master WHERE email='$email'";
      
      $row = mysqli_query($this->conn, $query);
      
      if(mysqli_num_rows($row) == 0) {
   
         $query = "INSERT INTO user_master (first_name, last_name, email, password, account_status, creation_date, updation_date) VALUES (?,?,?,?,?,?,?)";

         $dateTimeNow = (new DateTime('now', new DateTimeZone("Asia/Kolkata")))->format('Y-m-d H:i:s');
         $password = md5($password);
         $active_status = "1";

         error_reporting(E_ERROR | E_WARNING | E_PARSE);

         try {
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("sssssss", $firstname, $lastname, $email, $password, $active_status, $dateTimeNow, $dateTimeNow);
            if($stmt->execute()) {
               return "true";
            }
         }
         catch (Exception $ex) {
            return "Some error occured! Try again later";
         }
      }
      else {
         return "Account already exist!";
      }
   }
   
//----------------------------------------------------------
//----------------------------------------------------------
//--------------## get Passwords method ##------------------   
//----------------------------------------------------------
//----------------------------------------------------------

   public function get_pass_cards(int $user_id) {
      
      $this->connection();
      
      $getLength = "SELECT password_id FROM password_master WHERE user_id = '" . $user_id . "'";
      
      $getLengthCmd = mysqli_query($this->conn, $getLength);
      return $getLengthCmd;
   }

//----------------------------------------------------------
//----------------------------------------------------------
//--------------## get password row method ##---------------   
//----------------------------------------------------------
//----------------------------------------------------------

   public function get_password_data(int $p_id) {
      $this->connection();
      $getData = "SELECT * FROM password_master WHERE password_id = '" . $p_id . "'";
      
      $getDataCmd = mysqli_query($this->conn, $getData);
      $data = mysqli_fetch_assoc($getDataCmd);

      return $data;
   }
   
//----------------------------------------------------------
//----------------------------------------------------------
//--------------------## add password ##-------------------- 
//----------------------------------------------------------
//----------------------------------------------------------
   
   public function add_password(int $userid, string $title, string $username, string $password, string $notes) {
      $this->connection();
      
      $query = "INSERT INTO password_master (user_id, title, username, password, notes) VALUES (?,?,?,?,?)";
      error_reporting(E_ERROR | E_WARNING | E_PARSE);
      
      try {
         $stmt = $this->conn->prepare($query);
         $stmt->bind_param("issss", $userid, $title, $username, $password, $notes);
         if($stmt->execute()) {
            return "true";
         }
      }
      catch (Exception $ex) {
         return "Some error occured! Try again later";
      }
   }
   
}
?>