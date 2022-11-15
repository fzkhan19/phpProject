<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<?php include "include.php"; ?>
</head>
<body class="ab-pos hr-center">
<form action="<?php $_PHP_SELF?>" method="post">
	<input type="text" name="q" <?php if(isset($_POST['q'])){echo "value='".$_POST['q']."'";}?> placeholder="Enter scrambled word">
	<input type="submit" name="submit">
</form>

<?php
	if(isset($_POST["submit"])!=NULL){
		include "Database/Database_api.php";
		include "Classes/Word_Arrange.php";
		$database = new Database_api("wn_pro_mysql");

		$word = Word_Arrange::wordSort($_POST['q']);
		
		$result = $database->unscramble($word);
        if($result!=NULL && mysqli_num_rows($result)!=0){
            echo "<div class='table-all-single-dark-border'>";
                echo "<h1>Matched Words</h1>";
	            echo "<table cellpadding=5>";
	                echo "<tr><th><b>Word</b></th><th><b>Defination</b></th></tr>";
                
                $prevword = "";	
                while($row=mysqli_fetch_assoc($result)){
                	if($prevword==""){
                		echo "<tr><td>".$row['word']."</td><td>".$row['gloss']."</br>";
                	}
                	else if($prevword==$row['word']){
	                	echo $row['gloss']."</br>";
                	}
                	else{
                		echo "</td></tr><tr><td>".$row['word']."</td><td>".$row['gloss']."</br>";
                	}
                	$prevword = $row['word'];
            	}
	            echo "</td></tr></table>";
            echo "</div>";
          
        }
        else{
        	 echo "<h1 style='color:red'>No Match Found</h1>";	
        }


	}

?>
</body>
</html>