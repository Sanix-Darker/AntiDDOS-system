# AntiDDOS-system
A simple way to protect your web site from DDOS attack

<h4> How to use it!</h4>
In your webpage(for example produits.php or index.php), you just have to include the file index.php from anti_ddos:<br>

<?php 
	session_start();
	include ("anti_ddos/index.php"); //Systeme de protection DDOS
?>
<!DOCTYPE html>
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      ...
  </head>
  <body>
    <!-- My Web Page -->
  </body>
</html>
