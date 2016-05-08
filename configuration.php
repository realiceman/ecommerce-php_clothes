<?php
$sql_serveur = "localhost"; 
$sql_login = "admin";  
$sql_pass = "admin"; 
$sql_bdd = "projet";  

	
$link = mysql_connect($sql_serveur, $sql_login, $sql_pass);
if (!$link)
{
   die('Impossible de se connecter : ' . mysql_error());
}
$db_selected = mysql_select_db($sql_bdd);
if (!$db_selected) 
{
   die ('Impossible de sélectionner la base de données : ' . mysql_error());
}



?>