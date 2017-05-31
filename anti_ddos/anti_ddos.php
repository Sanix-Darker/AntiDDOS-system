<?php
/*
* Anti DDOS PHP Script
* By S@n1X D4rk3r
*/
//and getenv(" HTTP_CLIENT_IP ") != '127.0.0.1'
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
 
 $ad_source = file("{$ad_dir}/{$ad_black_file}"); $ad_source = explode(',', implode(',',$ad_source));
 if(in_array($ad_ip, $ad_source)) {die();}
 
 $ad_source = file("{$ad_dir}/{$ad_white_file}");
 $ad_source = explode(',',implode(',',$ad_source));
 if(!in_array($ad_ip, $ad_source)) {
 
	 $ad_source = file("{$ad_dir}/{$ad_temp_file}");
	 $ad_source = explode(',',implode(',',$ad_source));
	 if(!in_array($ad_ip, $ad_source)) {
	 	$_SESSION['nbre_essai']=3;
		 $ad_file = fopen("{$ad_dir}/{$ad_temp_file}", "a+");
		 $ad_string = $ad_ip.',';
		 fputs($ad_file, "$ad_string");
		 fclose($ad_file); 
		 $array_for_nom = array('maN','bZ','E','S','i','P','u','1','4','Ds','Er','FtGy','A','d','98','z1sW');
		 $nom_form = $array_for_nom[rand(0,15)].$array_for_nom[rand(0,15)].$array_for_nom[rand(0,15)].$array_for_nom[rand(0,15)].$array_for_nom[rand(0,15)]; 
		 $_SESSION['variable_du_form'] = str_shuffle($nom_form).$array_for_nom[rand(0,15)].$array_for_nom[rand(0,15)];
		 ?>
		<style type="text/css">
			nav{
			    background:red url(/alerticon.png) left no-repeat;  background-position: 15px;  color: white; text-align:center; position: fixed; top:30%;  left:0; width: 100%;
			}
			.code{
				padding: 7px; font-size: 23px;
			}
			.clickmoi{
				border: 0px; padding: 10px; font-size: 23px; border-radius:2px; color:white; background: blue; cursor: pointer;
			}
		</style>
		<nav><center>
			<h3>Systeme de protection DDOS de Jebiss.</h3>
			<form method="post" name="<?=$nom_form; ?>">
				<input type="hidden" name="<?=$_SESSION['variable_du_form']; ?>" value="JnYHSNp">
				<img height="130" width="400" src="anti_ddos/securitecode.php"><br>
				<input type="text" name="valCAPTCHA" class="code" placeholder="Entrez le code ici.">
				<input type="button" class="clickmoi" onclick="go()" value="Me verifier">
			</form></center>
		</nav>
		<script type="text/javascript">function go(){ document.<?=$nom_form; ?>.submit(); }</script>
		<?php
		 die();
	 }
	 elseif(isset($_POST[$_SESSION['variable_du_form']]) AND $_SESSION['nbre_essai']>0){
	 	$secure = isset($_POST['valCAPTCHA']) ? ($_POST['valCAPTCHA']) : '';

		if ($secure == $_SESSION['securecode']){
			$ad_file = fopen("{$ad_dir}/{$ad_white_file}", "a+");
			$ad_string = $ad_ip. ',';
			fputs($ad_file, "$ad_string");
			fclose($ad_file);
			unset($_SESSION['securecode']);
			unset($_SESSION['nbre_essai']);
		}else{
			$_SESSION['nbre_essai']--;
			 $array_for_nom = array('maN','bZ','E','S','i','P','u','1','4','Ds','Er','FtGy','A','d','98','z1sW');
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
				    top:30%;
				    left:0;
				    width: 100%;
				}
				.code{
					padding: 7px;
					font-size: 23px;
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
				<h3>Systeme de protection DDOS By S@n1x D4rk3r.</h3>
				<form method="post" name="<?=$nom_form; ?>">
					<input type="hidden" name="<?=$_SESSION['variable_du_form']; ?>" value="JnYHSNp">
					<img height="130" width="400" src="anti_ddos/securitecode.php"><br>
					<h2>Il vous reste <?=($_SESSION['nbre_essai']+1); ?> essai(s)</h2>
					<input type="text" name="valCAPTCHA" class="code" placeholder="Entrez le code ici.">
					<input type="button" class="clickmoi" onclick="go()" value="Me verifier">
				</form></center>
			</nav>
			<script type="text/javascript">function go(){ document.<?=$nom_form; ?>.submit(); }</script>
			<?php
			 die();
		}
		
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
