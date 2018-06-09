<?php

//Si tiene cloudflare le ponemos la ip real del cliente
if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
  	$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
}

include('config.php');
 
require ("{$ad_dir}/{$ad_check_file}");

if ($ad_end_defense > $ad_date) {
	require ("{$ad_dir}/../anti_ddos.php");
} else {

	$ad_num_query = ($ad_sec == $ad_sec_query) ? $ad_num_query++ : '1 ';
	$ad_file = fopen ("{$ad_dir}/{$ad_check_file}", "w");

	$ad_string = ($ad_num_query >= $ad_ddos_query) ? '<?php $ad_end_defense ='.($ad_date + $ad_defense_time).'; ?>' : '<?php $ad_num_query ='. $ad_num_query. '; $ad_sec_query ='. $ad_sec. '; ?>';

	fputs ($ad_file, $ad_string);
	fclose ($ad_file);
}

?>
