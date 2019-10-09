<?php

//checking the login credentials

if(isset($_POST['username'],$_POST['password'])){
	$uname = $_POST['username'];
	$pwd = $_POST['password'];
	if($uname == 'admin' && $pwd == 'Ws2019'){
		
	}
	else{
		echo 'Invalid Credentials !!!!';
		exit();
	}
}
else{
	header('Location:./login.php'); //redirect to login page
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Home</title>
<link rel="stylesheet" type="text/css" href="2home.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

//ajax call
	
$(document).ready(function(){

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("token_value").setAttribute('value', this.responseText) ; //set CSRF token as a hidden field in post request
		}
	
	
	};
	
	//generate and get CSRF token
	xhttp.open("GET", "tokenGen.php", true);
	xhttp.send();
	
	});

</script>

</head>

<body>>
   
    <div class ="msg">Successfully Logged in !!!</div>
		<div class ="mbox1">
		
		<!--form to send a message and CSRF token-->
		
			<h2>Make your Responce</h2>
            <form class="form" action="result.php" method="post" name="update_form">
          
					<label>Your Messege:</label><br>
                    <input type="text" id="msg"  name="msg" placeholder="Please type your Message" ><br><br>
           		
					<input type="hidden" name="token" value="" id="token_value"/> <!--pass CSRF token as a hidden field-->
					        
                    <input type="submit" name="Submit"  value="Send"> 
					
			</form>
                   
                
		</div>

</body>

</html>