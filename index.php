<?php
session_start();
if(!isset($_SESSION['id']))
{
	$_SESSION['id'] = time()*rand(1,2000);
}
?>

<?php
require('configuration.php');
?>
            <!-- PAGE D'ACCEUIL   -->
			
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
        <meta http-equiv="content-type" content="text/html; meta charset=UTF-8" />
        <meta name="description" content="" />  
        <meta name="keywords" content="" /> 
      
		<title>RKTandSIX</title>
		<link rel=stylesheet href="index.css" type="text/css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/easyslider1.7.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
		    $("#slider").easySlider({
			  continuous:true,
			  auto:true,
			  speed:35000,
			  
			  
			});			
		});
		</script>

</head>


<body>

<!--structure generale -->
 <div id="main">

    <div id="menuhaut">

        <a href="index.php"><img src="logos/rktlogo.jpg"></a>
       
	   <div id="menu"> 
        <b><a href="index1.php" style="text-decoration:none; color:white;font-family:gratis;">ESHOP / PRODUCTS </a>  /////// <a href="pages/medias/index3.php" style="text-decoration:none; color:white;font-family:gratis;">MEDIAS</a> </b>   
         </div>
   
   </div>
   <div class="rouge">
   </div>
   <div id="centre">  <!-- permet d'inclure differentes selon ce que l'on clique -->
      <?php include ('centre.php');?>
   </div>
   <div class="rouge" style="margin-top:15px; margin-bottom:-22px">
   </div>
   
   <div id="footer">
     <h1> <span>KNEE AND ELBOW COLLECTION </span></h1>
	 
	           <div id="contact">
               <a href= "index.php?page=contact" style="text-decoration:none; color:white;font-family:gratis;">CONTACT</a>///////<a href="rktmobile/index.html" style="text-decoration:none; color:white;font-family:gratis;">MOBILE<img src="logos/mobile.png"></a>
			   </div>
   </div>
   <div class="rights">
     <a href="termofuse.php">Terms of Use</a>
    <a href="termofuse.php">Privacy Policy</a>
     <span class="copyright">Copyright 2013 RKT and SIX, Inc. - All rights reserved.</span>
</div>
<div id="black">
</div>

            

</div>
<!--fin structure generale -->

</body>

</html>