function side_navigation(flag){
	if(flag.localeCompare("close")==0){
		var x = document.getElementsByClassName("side-navigation");
		x[0].style.display="none";
		var x = document.getElementById("openav");   // Get the element with id="demo"
		x.style.display="block";
	}
	else if(flag.localeCompare("open")==0){
		var x = document.getElementsByClassName("side-navigation");
		x[0].style.display="block";
		var x = document.getElementById("openav");   // Get the element with id="demo"
		x.style.display="none";
	}
}


function cir_per_display(per){
	var x = document.getElementsByClassName("cir-per-display");
	x[0].style.backgroundImage="conic-gradient(black "+ per +"%, blue "+ per +"% 100%)";
}