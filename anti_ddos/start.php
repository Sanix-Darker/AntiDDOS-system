<?php 
/**
 * AntiDDOS System
 * FILE: index.php
 * By Sanix Darker
 */

if(!isset($_SESSION)){
	session_start();
}
if(isset($_SESSION['standby'])){

	// There is all your configuration

	$_SESSION['standby'] = $_SESSION['standby']+1;

	$ad_ddos_query = 5;// ​​number of requests per second to detect DDOS attacks
	$ad_check_file = 'check.txt';// file to write the current state during the monitoring
	$ad_all_file = 'all_ip.txt';// temporary file
	$ad_black_file = 'black_ip.txt';// will be entered into a zombie machine ip
	$ad_white_file = 'white_ip.txt';// ip logged visitors
	$ad_temp_file = 'ad_temp_file.txt';// ip logged visitors
	$ad_dir = 'anti_ddos/files';// directory with scripts
	$ad_num_query = 0;// ​​current number of requests per second from a file $check_file
	$ad_sec_query = 0;// ​​second from a file $check_file
	$ad_end_defense = 0;// ​​end while protecting the file $check_file
	$ad_sec = date ("s");// current second
	$ad_date = date ("is");// current time
	$ad_defense_time = 100;// ddos ​​attack detection time in seconds at which stops monitoring
		

	$config_status = "";
	function Create_File($the_path){

		$handle = fopen($the_path, 'w') or die('Cannot open file:  '.$the_path);
		return "Creating ".$the_path." .... done";
	}


	// Checking if all files exist before launching the cheking
	$config_status .= (!file_exists("{$ad_dir}/{$ad_check_file}")) ? Create_File("{$ad_dir}/{$ad_check_file}") : "ERROR: Creating "."{$ad_dir}/{$ad_check_file}<br>";
	$config_status .= (!file_exists("{$ad_dir}/{$ad_temp_file}")) ? Create_File("{$ad_dir}/{$ad_temp_file}") : "ERROR: Creating "."{$ad_dir}/{$ad_temp_file}<br>";
	$config_status .= (!file_exists("{$ad_dir}/{$ad_black_file}")) ? Create_File("{$ad_dir}/{$ad_black_file}") : "ERROR: Creating "."{$ad_dir}/{$ad_black_file}<br>";
	$config_status .= (!file_exists("{$ad_dir}/{$ad_white_file}")) ? Create_File("{$ad_dir}/{$ad_white_file}") : "ERROR: Creating "."{$ad_dir}/{$ad_white_file}<br>";
	$config_status .= (!file_exists("{$ad_dir}/{$ad_all_file}")) ? Create_File("{$ad_dir}/{$ad_all_file}") : "ERROR: Creating "."{$ad_dir}/{$ad_all_file}<br>";

	if(!file_exists ("{$ad_dir}/../anti_ddos.php")){
		$config_status .= "anti_ddos.php does'nt exist!";
	}

	if (!file_exists("{$ad_dir}/{$ad_check_file}") or 
			!file_exists("{$ad_dir}/{$ad_temp_file}") or 
				!file_exists("{$ad_dir}/{$ad_black_file}") or 
					!file_exists("{$ad_dir}/{$ad_white_file}") or 
						!file_exists("{$ad_dir}/{$ad_all_file}") or 
							!file_exists ("{$ad_dir}/../anti_ddos.php")) {

								$config_status .= "Some files does'nt exist!";
								die($config_status);
	}


	// TO verify the session start or not
	require ("{$ad_dir}/{$ad_check_file}");

	if ($ad_end_defense and $ad_end_defense> $ad_date) {
		require ("{$ad_dir}/../anti_ddos.php");
	} else {

		$ad_num_query = ($ad_sec == $ad_sec_query) ? $ad_num_query++ : '1 ';
		$ad_file = fopen ("{$ad_dir}/{$ad_check_file}", "w");

		$ad_string = ($ad_num_query >= $ad_ddos_query) ? '<?php $ad_end_defense ='.($ad_date + $ad_defense_time).'; ?>' : '<?php $ad_num_query ='. $ad_num_query. '; $ad_sec_query ='. $ad_sec. '; ?>';

		fputs ($ad_file, $ad_string);
		fclose ($ad_file);
	}

}else{

		$_SESSION['standby'] = 1;
		
		$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		header("refresh:8,".$actual_link);
	?>
		<style type="text/css">
		.loading {display: flex; flex-direction: column; align-items: center; } .loading__msg {font-family: Roboto; font-size: 16px; } .loading__dots {display: flex; flex-direction: row; width: 100%; justify-content: center; margin: 100px 0 30px 0; } .loading__dots__dot {background-color: #44BBA4; width: 20px; height: 20px; border-radius: 50%; margin: 0 5px; color: #587B7F; } .loading__dots__dot:nth-child(1) {animation: bounce 1s 1s infinite; } .loading__dots__dot:nth-child(2) {animation: bounce 1s 1.2s infinite; } .loading__dots__dot:nth-child(3) {animation: bounce 1s 1.4s infinite; } @keyframes bounce {0% {transform: translate(0, 0); } 50% {transform: translate(0, 15px); } 100% {transform: translate(0, 0); } }
		</style>
	<div class="loading" style="margin-top: 11%;">
		<div class="loading__dots">
		<div class="loading__dots__dot"></div>
		<div class="loading__dots__dot"></div>
		<div class="loading__dots__dot"></div>
		</div>
		<div class="loading__msg"><center><b style="font-size: 22px;"><a href="https://github.com/Sanix-Darker/AntiDDOS-system" target="_blank" style="color: black;">ANTIDDOS</a> is checking....</b><br><br>Hi, don't worry, this is a simple security verfication, you will see this only one time;<br> your webpage will show up soon!<br> This security wall was build by <a href="https://github.com/sanix-darker" target="_blank">Sanix darker</a> </center></div>
	</div>

<?php exit();

}
?>