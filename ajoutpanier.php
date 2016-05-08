<?php
session_start();
 
require('configuration.php');

$articles = $_POST['idarticle'];
$quantite = $_POST['quantity'];
$taille = $_POST['taille'];
$ses = session_id();
if (!empty($articles) && !empty($quantite) && !empty($taille)){
	if( $taille == '0'){
		echo'please choose a clothing size';
	}else{
		// on recupere les articles ajoutés dans le panier du client en verifiant que cela est bien la session
		$mareq = 'SELECT id FROM panier  WHERE `id_article`="'.$articles.'" AND `id_client`="'.$ses.'"';
		$req=mysql_query($mareq);

		$nb = mysql_num_rows($req);   
		// on verifie que l'element n'est pas deja dans le panier sinon alerte
	    if($nb==0){	 
			mysql_query("INSERT INTO `panier`(`id`, `id_article`, `id_client`, `quantite` , `taille`) VALUES ('','$articles','$ses','$quantite', '$taille')"); 
			?>
			<!--
			<script type="text/javascript">
             $(function() { parent.$.fancybox.close(); });
             window.parent.location.href = '/shop/basket';
            </script>
			
			<?php
			header("location:panier.php");
		}else{
			echo 'pay attention please , you have already chosen this reference'; 
		}
	}	
}
else{
    echo "please fill all the fields";
}	

	// page de redirection 
// suite à l'ajout dans le panier il faut effectuer la redirection : voir code present dans autre page.
?>

	
	