<body style="background-color: black">
	<head>
		<script src="https://www.google.com/recaptcha/api.js"></script>
	</head>
	<center>
		<h3 style="color: white">We are under attack</h3>
		<h4 style="color: white">ATTEMPTS TO GET IP BANNED: <?=$_SESSION['intentos']; ?></h4>
		<form name="challenge" method="post">
			<div class="g-recaptcha" data-sitekey="6LdH41EUAAAAAMwX9KBhFlEbSArlxd0CqZrehsIN"></div><br>
			<input type="submit" name="submit" class="button" value="Submit">
		</form>
	</center>
</body>