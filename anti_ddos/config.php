<?php 

// There is all your configuration

 $ad_ddos_query = 5;// ​​number of requests per second to detect DDOS attacks
 $ad_check_file = 'check.txt';// file to write the current state during the monitoring
 $ad_temp_file = 'all_ip.txt';// temporary file
 $ad_black_file = 'black_ip.txt';// will be entered into a zombie machine ip
 $ad_white_file = 'white_ip.txt';// ip logged visitors
 $ad_temp_file = 'ad_temp_file.txt';// ip logged visitors
 $ad_dir = 'anti_ddos/files/';// directory with scripts
 $ad_num_query = 0;// ​​current number of requests per second from a file $check_file
 $ad_sec_query = 0;// ​​second from a file $check_file
 $ad_end_defense = 0;// ​​end while protecting the file $check_file
 $ad_sec = date ("s");// current second
 $ad_date = date ("is");// current time
 $ad_defense_time = 100;// ddos ​​attack detection time in seconds at which stops monitoring
 
 // Checking if all files exist before launching the cheking
  if (!file_exists("{$ad_dir}/{$ad_check_file}") or 
 		!file_exists("{$ad_dir}/{$ad_temp_file}") or 
 			!file_exists("{$ad_dir}/{$ad_black_file}") or 
 				!file_exists("{$ad_dir}/{$ad_white_file}") or 
 					!file_exists ("{$ad_dir}/../anti_ddos.php")) {

 						die ("Some files does'nt exist!");
 }