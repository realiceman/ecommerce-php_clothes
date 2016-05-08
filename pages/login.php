<?php
session_start();

setcookie('projet',$_SESSION['username'],time()+(30*24*3600));

include("../configuration.php");
?>
 
 <!-- LOGIN   UTILISATEUR  -->
 
<?php 
//je traite les elements saisis
if(isset($_POST['login']))
	{ 

	$username = $_POST["username"]; 
	$password = sha1($_POST["password"]); 
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);


	$match = "SELECT * FROM client where prenom = '".$username."';"; 
	 
	$qry = mysql_query($match);

	$tabResp = mysql_fetch_array($qry); 

	$count = mysql_num_rows($qry);

	if ($count ==1) {
	//si l'utilisateur existe et si le nb res >=1
	//je teste le mot de passe:
		$mdpBdd = $tabResp['password'];
		
		if ($mdpBdd == $password) {
		
		

	//si le mdp est ok, j'ouvre la session (initiliation des variables  de session et redirection vers page index1

		$_SESSION['user']= $_POST["username"];
	header("location:../index1.php");
	// page de redirection

		}

		else{
		$error = "wrong password" ;
		}


	}else{
		 $error = "Wrong first name or/and wrong password. Please try again." ;
	}
}

?>

<html>
<head> <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="csslogin.css" />
<link rel="stylesheet" type="text/css" href="../js/tooltipster.css" />

         <script type="text/javascript" src="../js/jquery.tooltipster.min.js"></script>
        <SCRIPT language="Javascript"> 
        function Chargement() { } 
         
        $(document).ready(function() {
            $('.tooltip').tooltipster();
        });
	
    </script> <!-- boite de dialogue pour le homepage -->

</head>
<body>
<div style="margin-left=600px;">
<a href="../index.php"><img src="../logos/homepage.jpg" title="Homepage" class="tooltip"/></a>
</div> <br/> <br/>

<?php if(!empty($error)){echo $error;}?>
<form action="login.php" method="post">
<div class="login">
    <input type="text" placeholder="first name" name="username" >  
  <input type="password" placeholder="password" name="password" >  
  <input type="submit" value="Login" id='login' name='login'><br/>
                     <a href="register.php" style="text-decoration:none;color:black; margin-left:75px;"> Need to create an account ?</a>
</div>

</form> <br/>

<div id="snake">
 <img src='../logos/snake.jpg'/>

</div>





</body>
</html>

