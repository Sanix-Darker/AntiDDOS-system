<?php

function checkip($ip, $file){
	$matches = array();
	$handle = fopen("anti_ddos/files/".$file.".txt", "r");
	if ($handle){
    	while (!feof($handle)){
        	$buffer = fgets($handle);
        	if(strpos($buffer, $ip) !== FALSE){
            	return true;
        	}
    	}
    	fclose($handle);
	}
}

	$ad_ip = $_SERVER['REMOTE_ADDR'];

	if(checkip($ad_ip, "black_ip") == true){die();}

	if(checkip($ad_ip, "white_ip") == false){
	 
		if(checkip($ad_ip, "temp") == false){
		 	if(!isset($_SESSION['intentos'])){$_SESSION['intentos']=3;}
		 	
				$f = fopen("anti_ddos/files/temp.txt", "a");
				fputs($f, $ad_ip . "\n");
				fclose($f); 
			
			if (isset($_POST['submit'])) {
				if ($_POST["g-recaptcha-response"]) {
					$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$privatekey."&response=".$_POST["g-recaptcha-response"]."&remoteip=".$ad_ip);
					$rcaptcha = json_decode($response);
				}

				if ($rcaptcha->success == true) {
					//quitar challenge
					$f = fopen("anti_ddos/files/white_ip.txt", "a");
					fputs($f, $ad_ip . "\n");
					fclose($f);
					unset($_SESSION['securecode']);
					unset($_SESSION['intentos']);
					header("Location: /");
					die();
				}else{
					//quitar intento
					echo $ad_ip;
					$_SESSION['intentos']--;
				}
			}

			 include('verify.php');

			 die();
		}elseif($_SESSION['intentos']>0){
			$_SESSION['intentos']--;

			if (isset($_POST['submit'])) {
				if ($_POST["g-recaptcha-response"]) {
					$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdH41EUAAAAADR0xIQO7PcuZ0V1KpJBfWqtHpyV&response=".$_POST["g-recaptcha-response"]."&remoteip=".$ad_ip);
					$rcaptcha = json_decode($response);
				}

				if ($rcaptcha->success == true) {
					//quitar challenge
					$f = fopen("anti_ddos/files/white_ip.txt", "a");
					fputs($f, $ad_ip . "\n");
					fclose($f);
					unset($_SESSION['securecode']);
					unset($_SESSION['intentos']);
					header("Location: /");
					die();
				}else{
					//quitar intento
					echo $ad_ip;
					$_SESSION['intentos']--;
				}
			}

			include('verify.php');
			die();
		}else{
			$f = fopen("anti_ddos/files/black_ip.txt", "a");
			fputs($f, $ad_ip . "\n");
			fclose($f);
		}
	 }
	 ?>
