
<?php
/*
* Anti DDOS PHP Script
* By S@n1X D4rk3r
*/

function getFromfile_source($type)
{

	$ad_check_file = 'check.txt'; // file to write the current state during the monitoring
	$ad_all_file = 'all_ip.txt'; // temporary file
	$ad_black_file = 'black_ip.txt'; // will be entered into a zombie machine ip
	$ad_white_file = 'white_ip.txt'; // ip logged visitors
	$ad_temp_file = 'ad_temp_file.txt'; // ip logged visitors
	$ad_dir = 'anti_ddos/files'; // directory with scripts

	return ($type == "black") ? explode(',', implode(',', file("{$ad_dir}/{$ad_black_file}"))) : (($type == "white") ? explode(',', implode(',', file("{$ad_dir}/{$ad_white_file}"))) : explode(',', implode(',', file("{$ad_dir}/{$ad_temp_file}"))));
}

$ad_ip = "";
// if you'r working on your local machine, you can add these conditions
//and getenv(" HTTP_CLIENT_IP ") != '127.0.0.1'
//and getenv(" HTTP_X_FORWARDED_FOR") != '127.0.0.1'

$ad_ip = (getenv("HTTP_CLIENT_IP") and preg_match("/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/", getenv(" HTTP_CLIENT_IP "))) ? getenv("HTTP_CLIENT_IP") : ((getenv("HTTP_X_FORWARDED_FOR") and preg_match("/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/", getenv(" HTTP_X_FORWARDED_FOR "))) ? getenv("HTTP_X_FORWARDED_FOR") : getenv("REMOTE_ADDR"));

$ad_source = getFromfile_source('black');
if (in_array($ad_ip, $ad_source)) {
	die();
}

$ad_source = getFromfile_source('white');
if (!in_array($ad_ip, $ad_source)) {

	$ad_source = getFromfile_source('temp');
	if (!in_array($ad_ip, $ad_source)) {
		$_SESSION['nbre_essai'] = 3;
		$ad_file = fopen("{$ad_dir}/{$ad_temp_file}", "a+");
		$ad_string = $ad_ip . ',';
		fputs($ad_file, "$ad_string");
		fclose($ad_file);
		$array_for_nom = array('maN', 'bZ', 'E', 'S', 'i', 'P', 'u', '1', '4', 'Ds', 'Er', 'FtGy', 'A', 'd', '98', 'z1sW');
		$nom_form = $array_for_nom[rand(0, 15)] . $array_for_nom[rand(0, 15)] . $array_for_nom[rand(0, 15)] . $array_for_nom[rand(0, 15)] . $array_for_nom[rand(0, 15)];
		$_SESSION['variable_du_form'] = str_shuffle($nom_form) . $array_for_nom[rand(0, 15)] . $array_for_nom[rand(0, 15)];

		include('Verify_your_identity.php');

		die();
	} elseif (isset($_POST[$_SESSION['variable_du_form']]) and $_SESSION['nbre_essai'] > 0) {
		$secure = isset($_POST['valCAPTCHA']) ? ($_POST['valCAPTCHA']) : '';

		if ($secure == $_SESSION['securecode']) {
			$ad_file = fopen("{$ad_dir}/{$ad_white_file}", "a+");
			$ad_string = $ad_ip . ',';
			fputs($ad_file, "$ad_string");
			fclose($ad_file);
			unset($_SESSION['securecode']);
			unset($_SESSION['nbre_essai']);
		} else {
			$_SESSION['nbre_essai']--;
			$array_for_nom = array('maN', 'bZ', 'E', 'S', 'i', 'P', 'u', '1', '4', 'Ds', 'Er', 'FtGy', 'A', 'd', '98', 'z1sW');
			$nom_form = $array_for_nom[rand(0, 15)] . $array_for_nom[rand(0, 15)] . $array_for_nom[rand(0, 15)] . $array_for_nom[rand(0, 15)] . $array_for_nom[rand(0, 15)];
			$_SESSION['variable_du_form'] = str_shuffle($nom_form) . $array_for_nom[rand(0, 15)] . $array_for_nom[rand(0, 15)];

			include('Verify_your_identity_LASTCHANCE.php');

			die();
		}
	} else {
		$ad_file = fopen("{$ad_dir}/{$ad_black_file}", "a+");
		$ad_string = $ad_ip . ',';
		fputs($ad_file, "$ad_string");
		fclose($ad_file);
		die();
	}
}
?>
