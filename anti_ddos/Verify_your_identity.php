<style type="text/css">
	nav{background:red url(/alerticon.png) left no-repeat; background-position: 15px; color: white; text-align:center; position: fixed; top:30%; left:0; width: 100%; } .code{padding: 7px; font-size: 23px; } .clickmoi{border: 0px; padding: 10px; font-size: 23px; border-radius:2px; color:white; background: blue; cursor: pointer; }
</style>
<nav>
	<center>
		<h3>AntiDDOS System activated.</h3>
		<form method="post" name="<?=$nom_form; ?>">
			<input type="hidden" name="<?=$_SESSION['variable_du_form']; ?>" value="JnYHSNp">
			<img height="130" width="400" src="anti_ddos/securitecode.php"><br>
			<input type="text" name="valCAPTCHA" class="code" placeholder="Entrez le code ici.">
			<input type="button" class="clickmoi" onclick="go()" value="Me verifier">
		</form>
	</center>
</nav>
<script type="text/javascript">function go(){ document.<?=$nom_form; ?>.submit(); }</script>