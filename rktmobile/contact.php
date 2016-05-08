<?php
require('../configuration.php');
?>

<!doctype html>
<html>
<head>
<title>Contact Form</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scal=1,maximum-scale=1">
<Link rel="stylesheet" type="text/css" href="jquery/jquery.mobile-1.0.1.css"></Link>  
<script type="text/javascript" src="jquery/jquery-1.6.4.js">  </script>
<script type="text/javascript" src="jquery/jquery.mobile-1.0.1.js">  </script>
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


	<div data-role="page" id="contact" data-theme="a">
               
                   <div data-role="header" data-theme="b">
                        <h1>CONTACT-FORM</h1>
                        <a href="#" data-icon="arrow-l" data-theme="a">Back</a>
                        
                </div>


                <div data-role="content">
                	<form action="traitement_form.php" method="post">

                           <div data-role="fieldcontain"class="ui-hide-label">

                                <label for="pseudo">Your name :</label>
                                <input type="text" name="pseudo" id="pseudo" placeholder="enter your name">

                            </div>

                            <div data-role="fieldcontain" class="ui-hide-label">

                                <label for="prenom">Your email address :</label>
                                <input type="text" name="prenom" id="prenom" placeholder="enter your email address">
                             </div>

                            <div data-role="fieldcontain"class="ui-hide-label">

                                <label for="subject">Subject :</label>
                                <input type="text" name="subject" id="subject" placeholder="subject">
                             </div>
                               
                                <div data-role="fieldcontain">

                                <label for="message">Your message : </label>
                                <textarea cols="40" row="8" name="message" id="message" placeholder="enter your message">  </textarea>

                                </div>

                            
                               <div date-role="fieldcontain">
                                <input type="submit"name="envoi" value="SEND">
                                </div>



                        </form>
                </div>



                <div data-role="footer" data-position="fixed" data-id="youtt-footer" data-tap-toggle="false">
            <div data-role="navbar" class="youtt-navbar">
                <ul>
                    <li><a href="articles.html" data-icon="shop" >SHOP</a></li> <!-- permet de pointer licone en bleu quand on est sur cette meme page -->
                    <li><a href="medias.html" data-icon="media">MEDIAS</a></li>
                    <li><a href="contact.hmtl" data-icon="contact" class="ui-btn-active ui-state-persist">CONTACT</a></li>
                </ul>
            </div>
        </div>

	</div>





</body>

</html>