<?php
if(isset($_POST['submit'])){
	$myfile = fopen("code.php", "w") or die("Unable to open file!");
	$txt = $_POST['code'];
	fwrite($myfile, $txt);
	fclose($myfile);
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Online Php Compiler</title>
</head>
<link rel="stylesheet" type="text/css" href="layout.css">
<script type="text/javascript">
window.onload=function(){
    document.getElementById('textbox').addEventListener('keydown', function(e) {
	  	if (e.key == 'Tab') {
	    e.preventDefault();
	    var start = this.selectionStart;
	    var end = this.selectionEnd;

	    // set textarea value to: text before caret + tab + text after caret
	    this.value = this.value.substring(0, start) +
	      "\t" + this.value.substring(end);

	    // put caret at right position again
	    this.selectionStart =
	      this.selectionEnd = start + 1;
	  }
	});
}
	
</script>
<body>

<main>
	<div class="input">
		<form action="index.php" method="POST">
			<input type="submit" name="submit" value="Run">
			<?php
			$myfile = fopen("code.php", "r") or die("Unable to open file!");
			$txt = fread($myfile, filesize("code.php"));
			?>
			<textarea id="textbox" name="code" placeholder="Type your code here" ><?php echo $txt;?></textarea>

		</form>
	</div>
	<div class="output">
		<big>Output</big><hr>
		<?php
		include("code.php");
		?>
	</div>
</main>


</body>
</html>