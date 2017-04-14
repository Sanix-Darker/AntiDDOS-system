# AntiDDOS-system
A simple way to protect your web site from DDOS attack

<h4> How to use it!</h4>
In your webpage(for example produits.php or index.php), you just have to include the file index.php from anti_ddos:<br>
<hr>
<.?php <br>
    session_start();// NEver forget this line<br>
    include ("anti_ddos/index.php"); //Systeme de protection DDOS</br>
?><br>
<.!DOCTYPE html><br>
<.html><br>
  &nbsp; &nbsp; <.head><br>
      
  &nbsp; &nbsp; 
  &nbsp; &nbsp; <.meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/><br>
      
  &nbsp; &nbsp; 
  &nbsp; &nbsp; ...<br>
  
  &nbsp; &nbsp; <./head><br>
  
  &nbsp; &nbsp; <.body><br>
    
  &nbsp; &nbsp; 
  &nbsp; &nbsp; <.!-- My Web Page --><br>
  
  &nbsp; &nbsp; <./body><br>
<./html><br>

NB:Remove the "." in the begining of tags, all br tags and nbsp code before use it!!!
