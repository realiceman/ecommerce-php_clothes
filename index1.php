<?php
session_start();

?>

<?php
require('configuration.php');
?>

   <!-- PARTIE ESHOP : AFFICHAGE DES VETEMENTS  -->
   
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
        <meta http-equiv="content-type" content="text/html; meta charset=UTF-8"  />
        <meta name="description" content="" />  
        <meta name="keywords" content="" /> 
      
		<title>RKTandSIX</title>
		<link rel="stylesheet" href="js/fancybox/source/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
		   <link rel="stylesheet" type="text/css" href="js/tooltipster.css" />
		<link rel=stylesheet href="index1.css" type="text/css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
		
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		
		<script type="text/javascript" src="js/fancybox/source/jquery.fancybox.pack.js?v=2.1.4"></script>
		
		<script type="text/javascript" src="js/jquery.tooltipster.min.js"></script>
		
		<SCRIPT type="text/javascript" language="Javascript"> <!--  permet l'affichage de la fenetre quand on clique sur un article  -->
	
      
        function Chargement() { } 
      
	    $(document).ready(function() {
            $('.tooltip').tooltipster();
        });
        
			
			$(document).ready(function() {
    $(".iframe").fancybox({
        'width'             : '38%',
        'height'            : '75%',
        'autoScale'         : false,
        'transitionIn'      : 'elastic',
        'transitionOut'     : 'elastic',
        'type'              : 'iframe'
    });
});
	
    </script>
	
	
</head>


<body>

<!--structure generale -->
 <div id="main">

    <div class="menuGauche">
	    <div class="home">
		
		<a href="index.php"><img src="logos/homepage.jpg" title="Homepage" class="tooltip"/></a>
		

        <div class="shop">

          <h2> <b title="Welcome to the store" class="tooltip">ESHOP//PRODUCTS</b></h2>
			
		</div>
		<div class="container">


<span class="box">
<a href="pages/medias/index3.php">MEDIA</a>
</span>

<span class="box">
<a href="index.php?page=contact">CONTACT</a>
</span>
<span class="box">
<a href="pages/register.php">REGISTER</a>
</span>
<span class="box">
<a href="pages/login.php" name="login" id="login" >LOGIN</a>
</span>

<br style="clear:both;"/>
</div><br /><br />

			
    <form method="post" action="" class="formulaire">
        
            <label for="newsletter" class="news" style='color:white;'>Newsletter</label>
        
        
           <input type="text" title="S'abonner � la newsletter" placeholder="Adresse email"  id="newsletter" name="email" style='background-color : #F5474A;'>
        
        
            <button title="S'abonner" type="submit">ok</button>
        
    </form><br/> 

     
           
		   
		  <!-- fonction javascript qui permet l'affichage d'une autre image quand on passe la souris dessus -->
		   <div class= "logo" >
           <a href="#" onMouseOver="document.Img_1.src='logos/logo2.jpg';" onMouseOut="document.Img_1.src='logos/logo.jpg';"> <img name="Img_1" src="logos/logo.jpg"> </a> 
		   </div> </br>
		   
		     <span class="social"><a href="https://www.facebook.com/rktandsix"> <img src="logos/facebook.jpg" style='width:100px;height:35px;margin-left:7px;'/></a></span>
             <span class="social"><a href="https://plus.google.com/u/0/114291219729979891723/posts"> <img src="logos/google.png" style='width:100px;height:35px;'/></a></span>  <br/> <br/>              
           <div class="cb">
		   <img src="logos/payment.png" style='padding-top:25px; margin-left:7px;'/>
		   
		   </div>

    </div>
	</div>

            <div class="centre" style="width:auto;height:auto;float:left;">
			


<!-- je demarre le traitement pour l'affichage des categories d'articles  -->	
<?php	$req= mysql_query("SELECT * FROM categorie ORDER BY nom ASC", $link); //je recupere toute les categories dans la bdd
	while($data = mysql_fetch_array($req))
	{
		
		$id = htmlentities($data['id']); //je les recupere par leur id et noms
		$nom = htmlentities($data['nom']);
		echo "-   <a href='index1.php?id=".$id."' style='text-decoration:none;color:black;font-weight:bold;font-family:gratis'>".$nom."</a>  "; //et je leur donne un style d'affichage
	}
	?>
	<ul>
	<?php
	
	 $idencours=$_GET['id']; //j'utilise l'id des categories pour recuperer les articles associes une fois que l'on clique dessus
	if(!empty($idencours)) {
	$req= mysql_query("SELECT * FROM article WHERE id_categorie='$idencours' ORDER BY id_categorie"); //je recupere les articles en bdd si je clique sur la categorie ,sinon .....
	}else {
	$req= mysql_query("SELECT * FROM article ORDER BY id_categorie");  //.....j'affiche tout
	}
	$nbenregistrement = mysql_num_rows($req);
	if($nbenregistrement<=0)
	{
		echo "Sorry for the bug , no worry it 'll be fixed asap...";
	}else{
		 $cpt=1; //initialisation du compteur pr le nombre de photos par ligne
		while($data = mysql_fetch_array($req))  
		{	
            			
			$chemin = $data['photo1'];  //je recupere le chemin des articles pour afficher les images
			echo "<a class='iframe' href='http://localhost:82/test/projet/detailarticle.php?id=".$data['id']."'> <img src='article/".$chemin."'style='width:300px;height:250px;margin:30px;'/></a>";
		
            
           		
           	if($cpt %3 == 0) echo "<br />";
			$cpt++;
			
		}
	} 
	
?>
			<br style="clear:both;"/>
			
     </ul>
			</div>

                <div class="menuDroit">
			         <div class= "loupe">
                     <img src="logos/Loupe.png" style='width:30px;height:30px;'/>
					 </div>
		             <div class= "panier">
                     <a href="panier.php"><img src="logos/panier.png" style='width:32px;height:30px;'/></a>
		             </div>
		             <div class= "enveloppe">
                     <a href="index.php?page=contact"><img src="logos/enveloppe.jpg" style='width:30px;height:25px;'/></a>
		             </div>			   
			               
                </div>
<!--fin structure generale -->


</body>

</html>