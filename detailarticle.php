<?php
include('configuration.php');
     
	 $idurl=$_GET['id'];
     $req=mysql_query("SELECT* FROM article  WHERE id='$idurl'");
	 $data = mysql_fetch_array($req);
	 
	 $id = $data['id']; 
	 $nom = $data['nom'];
	 $chemin = $data['photo1'];
	 $descriptif = $data['descriptif'];
	 $prix = $data['ttc'];
	 
	 
	 echo "<a> <img src='article/".$chemin."'/></a> <br/><br/>"; 
	 echo " <form method='post' action='ajoutpanier.php'>";
	 
	 //but ici : envoyer les infos à traiter pour pouvoir constituer le panier de l'utilisateur courant.
	 //(quantité, id article, taille)
	 ?>
	 
 <p>
	
 <label for='quantity'>Please choose the quantity :</label><br />
<select name='quantity' id='quantity'>
<?php 
for ($i=1; $i<6 ; $i++){
echo "<option value='$i'>$i</option>";

}
  ?>
</select> <br/> <br/>    

	<label for='taille'>Please choose your size :</label><br />
<select name='taille' id='taille'>
<option value='0'>--</option>
<option value='S'>S</option>
<option value='M'>M</option>
<option value='L'>L</option>
<option value='XL'>XL</option>

</select> <br/> <br/>

<input type='image' src='logos/ajouter.png'/>
<input type='hidden' id='idarticle' name='idarticle' value= '<?php echo $id ?>' />

</p>
</form>
	 
	 


