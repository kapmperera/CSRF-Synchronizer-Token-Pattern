<?php

class token {
   
	public static function checkToken($token,$sessionIdentifier){
		
		
		$wsfile = fopen("savedTokens.txt", "r") or die("Unable to open file!");
		list($tok,$sid) = explode(",",chop(fgets($wsfile)),2);
		fclose($wsfile);
		
		//compare the token which stored in server side with token which in hidden field
		if($tok == $token){
			if($sessionIdentifier == $sid ) {
		       return true;
			}
		}
	}
}
?>