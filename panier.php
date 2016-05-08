<?php
session_start();

require('configuration.php');
?>

   
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
        <meta http-equiv="content-type" content="text/html; meta charset=UTF-8"  />
        <meta name="description" content="" />  
        <meta name="keywords" content="" /> 
		<style>
body {color:white; background-color:black;}
div {color:black ; background-color:grey; width:250px;}

</style>

</head>

<body>
<?php

$ses = session_id();
//jointure permettant de recuperer les elements dont on a besoin dans le panier et article
  $requete =  'SELECT *   
              FROM  panier , article
			  WHERE panier.id_article = article.id 
			  AND id_client = "'.$ses.'"';
			  
  $req= mysql_query($requete);
  $nb = mysql_num_rows($req); 
  
  if($nb==0){
  
     echo'votre panier est vide';
  }else{
      
	  // on recupere les lignes que l'on veut afficher
	  $prixtotal=0;
	  while($data = mysql_fetch_array($req))
	{
	  ?>
	 <form method="post" action="payer.php">
    	<div class="entete-panier"></div>
        <span>
	  <?php  echo "---REFERENCE :     ".$data['titre']."<br />"; ?>
	 </span>
	 <?php echo "The price is : ".$ttc =$data['ttc']." euros"."<br />";?>
	 <span>
	<?php echo "The quantity is : ".$quantite =$data['quantite']."<br />";?>
	 </span><a href="delete.php?nom=<?php echo $data['titre']; ?>"><img src="logos/delete.png" style="padding-top:8px;"/></a><br/><br/>
	 
   <?php $prixtotalarticle = $ttc * $quantite;
	 /*  echo "Price is : ".$prixtotalarticle."<br />";*/
	   $prixtotal +=$prixtotalarticle; // on cumule les article dans prixtotal
	  
	}?><br/>
	<div id="total">
	<?php echo" The total of your basket is :  ".$prixtotal." euros";?>
	</div> </br>
	<input type='image' src='logos/checkout.jpg'/>
	<input type='hidden' id='idarticle' name='idarticle' value= '<?php echo $id ?>' />
	</form>
 <?php }


?>


</body>

</html>