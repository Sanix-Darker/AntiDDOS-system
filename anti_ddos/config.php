<?php 

// There is all your configuration

 $ad_ddos_query = 3;// ​​number of requests per second to detect DDOS attacks
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
 $ad_defense_time = 600;// ddos ​​attack detection time in seconds at which stops monitoring
 //RECAPTCHA CONFIG
 $publickey = "1LdH41EUAARAAMwX0KBhFlEbSArlxd0CqZrghsIN"; //clave publica
 $privatekey = "1LdH41EUARAAADR0xIQO7PcuZ0V1KpJBfHqtHpyV"; //clave privada