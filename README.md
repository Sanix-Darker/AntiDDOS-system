# AntiDDOS-system
A simple way to protect your web site from DDOS attack(FREELY)
<h2>This code has been tested by several deep web hackers!</h2>
<h4> How to use it!</h4>
In your webpage(for example produits.php or index.php), you just have to include the file index.php from anti_ddos:<br>
<b><i><u>Note: This system only activates when it detects abnormal activity and protect immediatly your website/server</u></i></b>
<hr>

```php
<?php
     session_start();// NEver forget this line<br>
     include ("anti_ddos/index.php"); //Include file here!</br>
?>
```
<br>

```html
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/><br>
        ...
   </head><br>
   <body>
      <!-- My Web Page -->
    </body>
</html>
```

<img src="ddos_.PNG">
