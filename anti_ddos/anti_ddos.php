<?php
/*
Anti DDOS PHP Script
Posted By Sanix Darker
*/
//and getenv(" HTTP_CLIENT_IP ") != '127.0.0.1' this is a way if you are working on localhost oubien wamp
//and getenv(" HTTP_X_FORWARDED_FOR") != '127.0.0.1'
 function getIP() {
	 if(getenv("HTTP_CLIENT_IP") and preg_match("/^[ 0-9 \ .]*?[ 0-9 \ .]+$/ is ", getenv(" HTTP_CLIENT_IP "))) {
	 	$ip = getenv("HTTP_CLIENT_IP");
	 } elseif(getenv("HTTP_X_FORWARDED_FOR") and preg_match("/^[ 0-9 \ .]*?[ 0-9 \ .]+$/ is ", getenv(" HTTP_X_FORWARDED_FOR "))) {
	 	$ip = getenv("HTTP_X_FORWARDED_FOR");
	 } else {
	 	$ip = getenv("REMOTE_ADDR");
	 }
	 return $ip;
 }
 $ad_ip = getIP();
 
 $ad_source = file("{$ad_dir}/{$ad_black_file}");
 $ad_source = explode(',', implode(',',$ad_source));
 if(in_array($ad_ip, $ad_source)) {die('<br><br><center><h3>Systeme de protection DDOS activ&eacute;!</h3>');}
 
 $ad_source = file("{$ad_dir}/{$ad_white_file}");
 $ad_source = explode(',',implode(',',$ad_source));
 if(!in_array($ad_ip, $ad_source)) {
 
	 $ad_source = file("{$ad_dir}/{$ad_temp_file}");
	 $ad_source = explode(',',implode(',',$ad_source));
	 if(!in_array($ad_ip, $ad_source)) {
		 $ad_file = fopen("{$ad_dir}/{$ad_temp_file}", "a+");
		 $ad_string = $ad_ip.',';
		 fputs($ad_file, "$ad_string");
		 fclose($ad_file); 
		 $array_for_nom = array('maNsd','bsd32Z','Efvfd','S','sdfsdi','45P','safu','1sfg','4d','Ds','Er','FtGy','fd54A','d','98','z1sW');
		 $nom_form = $array_for_nom[rand(0,15)].$array_for_nom[rand(0,15)].$array_for_nom[rand(0,15)].$array_for_nom[rand(0,15)].$array_for_nom[rand(0,15)]; 
		 $_SESSION['variable_du_form'] = str_shuffle($nom_form).$array_for_nom[rand(0,15)].$array_for_nom[rand(0,15)];
		 ?>
		<style type="text/css">
			nav{
			    background:red url(/alerticon.png) left no-repeat; 
			    background-position: 15px; 
			    color: white;
			    text-align:center;
			    position: fixed;
			    top:40%;
			    left:0;
			    width: 100%;
			}
			.clickmoi{
				border: 0px;
				padding: 10px;
				font-size: 23px;
				border-radius:2px;
				color:white;
				background: blue;
				cursor: pointer;
			}
		</style>
		<nav><center>
			<h3>Systeme de protection DDOS By Sd, si vous n'etes pas un robot clickez sur ce bouton!</h3>
			<form method="post" name="<?=$nom_form; ?>">
				<input type="hidden" name="<?=$_SESSION['variable_du_form']; ?>" value="JnYHSNp"><br>
				<input type="button" class="clickmoi" onclick="go()" value="Click Moi!">
			</form></center>
		</nav>
		<script type="text/javascript">
			function go(){ document.<?=$nom_form; ?>.submit(); }
		</script>
		<?php
		 die();
	 }
	 elseif(isset($_POST[$_SESSION['variable_du_form']])){
		 $ad_file = fopen("{$ad_dir}/{$ad_white_file}", "a+");
		 $ad_string = $ad_ip. ',';
		 fputs($ad_file, "$ad_string");
		 fclose($ad_file);
	 }
	 else {
		 $ad_file = fopen("{$ad_dir}/{$ad_black_file}", "a+");
		 $ad_string = $ad_ip.',';
		 fputs($ad_file, "$ad_string");
		 fclose($ad_file);
		 die();
	 }
 }
 ?>
