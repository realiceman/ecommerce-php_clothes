<?php
session_start();
require('configuration.php');
?>
           <!-- FORMULAIRE  DE  CONTACT  -->
		   
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />  
        <meta name="keywords" content="" /> 
      
		<title>RKTandSIX</title>
		<link rel=stylesheet href="index.css" type="text/css" />
		<style type="text/css"> 
        input { background-color : #F5474A ; } 
         textarea {background-color : #F5474A;}
		 </style> 
		 <script language="JavaScript" src="js/libjs.js" type="text/javascript"></script>
		 <link rel="stylesheet" type="text/css" href="pages/style2.css" />
		
</head>


<body>
<!--permet l'envoi d'email . Si tout les elements sont remplis il y a envoi sinon on renvoie sur le formulaire -->
<?php

 
// Function mail()

if(isset($_POST['envoi'])){ //recuperation du submit
	// To
	$to = 'rktandsix@gmail.com';
	 
	// Subject
	$subject = 'client';
	 
	// Message
	$message = 'message client';
	 
	// Headers
	$headers = 'From: rkt&six <mail@server.com>'."\r\n";
	$headers = "\r\n";
	mail($to, $subject, $message, $headers) ;  
    echo 'Message sent.Thank you';                         							
        
}               
?>

 
    
    
    <div id="content">
    <form action="" method="post" id="envoimail" name="envoimail">
      
      <label for="nom" style="color:black;">Name :</label>
      <span class="error"><?php if(isset($erreurnom)) echo $erreurnom;?></span>
      <input type="text" name="nom" value="<?php if(isset($nom)) echo $nom;?>" />
      
      <label for="email" style="color:black;">Email :</label>
      <span class="error"><?php if(isset($erreuremail)) echo $erreuremail;?></span>
      <input type="text" name="email" value="<?php if(isset($email)) echo $email;?>" />
      
      <label for="sujet" style="color:black;">Subject :</label>
      <span class="error"><?php if(isset($erreursujet)) echo $erreursujet;?></span>
      <input type="text" name="sujet" value="<?php if(isset($sujet)) echo $sujet;?>" />
      
      <label for="message" style="color:black;">Your message :</label>
      <span class="error"><?php if(isset($erreurmessage)) echo $erreurmessage;?></span>
      <textarea name="message"><?php if(isset($message)) echo $message;?></textarea>
      
      <input type="submit" class="submit" name="envoi" value="submit" />
     
      
    </form>
    
  </div>



       

</body>

</html>