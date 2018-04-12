<?php 
	// All start here

	// TO verify the session start or not
	if(!isset($_SESSION)){
		session_start();// Never forget this line
	}

    include ("anti_ddos/index.php"); //Include this file here and all is done!!!
?>