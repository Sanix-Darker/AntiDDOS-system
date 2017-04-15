<?php
/*
Posted @ http://www.w3tools.info/2011/12/anti-ddos-php-script.html
*/
 
 $ad_ddos_query = 5;// ​​number of requests per second to detect DDOS attacks
 $ad_check_file = 'check.txt';// file to write the current state during the monitoring
 $ad_temp_file = 'all_ip.txt';// temporary file
 $ad_black_file = 'black_ip.txt';// will be entered into a zombie machine ip
 $ad_white_file = 'white_ip.txt';// ip logged visitors
 $ad_temp_file = 'ad_temp_file.txt';// ip logged visitors
 $ad_dir = 'anti_ddos';// directory with scripts
 $ad_num_query = 0;// ​​current number of requests per second from a file $check_file
 $ad_sec_query = 0;// ​​second from a file $check_file
 $ad_end_defense = 0;// ​​end while protecting the file $check_file
 $ad_sec = date ("s");// current second
 $ad_date = date ("is");// current time
 $ad_defense_time = 100;// ddos ​​attack detection time in seconds at which stops monitoring
 
 if (!file_exists("{$ad_dir}/{$ad_check_file}") or !file_exists("{$ad_dir}/{$ad_temp_file}") or !file_exists("{$ad_dir}/{$ad_black_file}") or !file_exists("{$ad_dir}/{$ad_white_file}") or!file_exists ("{$ad_dir}/anti_ddos.php")) {
 	die ("Not enough files.");
 }
 
 require ("{$ad_dir}/{$ad_check_file}");

 if ($ad_end_defense and $ad_end_defense> $ad_date) {
 	require ("{$ad_dir}/anti_ddos.php");
 } else {
	 if ($ad_sec == $ad_sec_query) {
	 	$ad_num_query++;
	 } else {
	 	$ad_num_query = '1 ';
	 }
	 
	 if ($ad_num_query >= $ad_ddos_query) {
		 $ad_file = fopen ("{$ad_dir}/{$ad_check_file}", "w");
		 $ad_end_defense = $ad_date + $ad_defense_time;
		 $ad_string = '<?php $ad_end_defense ='.$ad_end_defense.'; ?>';
		 fputs ($ad_file, $ad_string);
		 fclose ($ad_file);
	 } else {
		 $ad_file = fopen ("{$ad_dir}/{$ad_check_file}", "w");
		 $ad_string = '<?php $ad_num_query ='. $ad_num_query. '; $ad_sec_query ='. $ad_sec. '; ?>';
		 fputs ($ad_file, $ad_string);
		 fclose ($ad_file);
	 }
 }
 ?>