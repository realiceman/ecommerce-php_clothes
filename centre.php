<!-- page appell�e selon ce que l'on clique dans l'index et donc par d�faut c'est la galerie photo "acceuil.php"-->
<?php
    $page = htmlentities($_GET['page']);

     if ($page == 'contact') {include('pages/contact.php');}
	 
	 else { include('pages/acceuil.php'); }

?>