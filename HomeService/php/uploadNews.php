<?php
session_start();  
  if(isset($_POST['submit'])){
    include '../Database/Database_api.php';
    $db = new Database_api();

    $date = $_POST['date'];
    $title = $_POST['title'];
    $news = $_POST['news'];
    


  /*---FILE UPLOADING---*/
    $target_dir = "../Data/imgs/news/";
    $filename = basename($_FILES["img"]["tmp_name"]).basename($_FILES["img"]["name"]);
    
    $target_file = $target_dir . $filename;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["img"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["img"]["size"] > 1000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      die("Sorry, your file was not uploaded.");
    
    } else {
      
      if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        $db->insertNews($_SESSION['uid'],$date,$title,$news,$filename);
        header("location:../news.php");
        echo "The file ". htmlspecialchars( basename( $_FILES["img"]["name"])). " has been uploaded.";
      } else {
        die("Sorry, there was an error uploading your file.");
      }

    }


  }

?>