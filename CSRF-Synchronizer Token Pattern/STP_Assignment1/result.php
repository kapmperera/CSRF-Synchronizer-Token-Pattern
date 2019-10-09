<?php

require_once 'token.php';

//get token from hidden field
$val = $_POST["token"];


if(isset($_POST['msg'])){
	
	//pass the token which in the POST request and the session ID to 'token.php' for validate.
	if(token::checkToken($val,$_COOKIE['SesT'])){
		echo "<h2> Valid request, Updated status: ".$_POST['msg']."</h2>";
		echo "<h3> Token:  ".$val."</h2>";	
		echo "<h3> Session ID:  ".$_COOKIE['SesT']."</h2>";	
	}
	else{
	   echo "<h2> Invalid (csrf token does not match) :  ".$_POST['msg']."</h2>";
	}
}
?>