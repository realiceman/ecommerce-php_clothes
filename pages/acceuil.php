 <div id="slider">
   <ul>
   <?php
	//  recup�rer la liste des photos a afficher pour ma thematique pass�e en parametres pour le slider
	
	
	$req= mysql_query("SELECT * FROM photo");
	$nbenregistrement = mysql_num_rows($req);
	if($nbenregistrement<=0)
	{
		echo "Sorry for the bug , no worry it 'll be fixed asap...";
	}else{
		
		   while($data = mysql_fetch_array($req))
		  {									
			$chemin = htmlentities($data['cheminfichier']);
			echo "<li><img src='photopage/".$chemin."' style='height:457px;'/></li>";	
            		
		  }
	     }
?>
  </ul>
   </div>