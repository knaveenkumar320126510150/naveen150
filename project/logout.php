<?php

if(isset($_POST['logout'])){
	$_SESSION["username"]='';
	header("location: login.html");
	
}
?>


