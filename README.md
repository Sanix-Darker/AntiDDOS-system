<img src="img/icone.png" >
<h1>AntiDDOS-system</h1>
A simple way to protect your web application from DDOS attack(FREELY) in *1 line*.

## How it work?
<img src="img/icon.png" >
At each connection, the system temporarily saves the ip address of the client and monitors its connection frequency, if this connection frequency is abnormal, then the system considers it as a black ip address and sends a verification request in the form of a verification. Captcha integrated into the system, if he passes this check, then it is a human and not a robot!

### Testing...
<img src="img/Antiddos.gif">

**"This project has been tested by severals ddos software with a score of 77%."**
## How to use it?

### Basic USAGE
```php
<?php
	include ("anti_ddos/start.php"); //write this at the top of your PHP application and all is done!!!
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Example Web page protected!
	</title>
</head>
	<body>
		...
		<h2>Example Web page protected!</h2>
		...
	</body>
</html>
```

### Advance USAGE:
```php
<?php
	try{
		if (!file_exists('anti_ddos/start.php'))
			throw new Exception ('anti_ddos/start.php does not exist');
		else
			require_once('anti_ddos/start.php'); 
	} 
	//CATCH the exception if something goes wrong.
	catch (Exception $ex) {
		// et's print a message saying there is an error
		echo '<div style="padding:10px;color:white;position:fixed;top:0;left:0;width:100%;background:black;text-align:center;">The <a href="https://github.com/sanix-darker/antiddos-system" target="_blank">"AntiDDOS System"</a> failed to load properly on this Web Site, please de-comment the \'catch Exception\' to see what happening!</div>';
		//Print out the exception message.
		//echo $ex->getMessage();
	}
?>
---- THE HTML PAGE CONTENT ----
```
<img src="img/ddos_.PNG">

## Author

- [Sanix-darker](https://github.com/sanix-darker)

## LICENSE

[MIT License](https://github.com/Sanix-Darker/AntiDDOS-system/blob/master/LICENSE)

PS: Send me some feedback to make this project more powerfull than ever! ;-)


