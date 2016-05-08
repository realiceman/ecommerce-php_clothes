<?php
session_start();

require('../configuration.php');
//1er chargement de page: je rend toujours valide le forumlaire
$visible = true;

//tester si on recupere un formulaire ou non.
if(!isset($_POST['send']))
	{ 

	$Fname=$_POST['Fname'];
	$Lname=$_POST['Lname'];
	$username=$_POST['username'];
	$password=sha1($_POST['pwd']);
	$email=$_POST['email'];
	$address=$_POST['add'];
	$ptc=$_POST['ptc']; 
	//1 : verifier quz toutes les chaines obligatoires sont saisies
	if((!empty($Fname)) && (!empty($Lname)) && (!empty($username)) && (!empty($password)) && (!empty($email)) && (!empty($address)) && (!empty($ptc))){
	     //2: verifier que login et mail existe pas deja.
		 $mareq = "SELECT mail FROM client WHERE mail ='".$email."'";
		 $req = mysql_query($mareq);
		// si je trouve au moins un mail, je ne permet pas l'inscription, il doit utiliser un autre mail.
		 $estpresent = mysql_num_rows($req);
		 if($estpresent==1){
		     $msg = 'you are already registered';
		 }else {
		 // sinon il peut s'inscrire, je  cache le formulaire, et j'insere en bdd les datas du user.
		mysql_query("INSERT INTO client(prenom, nom, adresse_postale, password, mail, code_postal)VALUES('$Fname', '$Lname', '$address', '$password' , '$email', '$ptc' )");
		 $msg = 'you are registered'; // le message permet d'avoir un statut que tout s'est bien passé.
		$visible = false;
		        }
		     
	}else{
	  $msg= 'please fill all the required details';
	 
	}
	
	
	
	
 }
 
?>
               <!-- FORMULAIRE  D'ENREGISTREMENT   -->
			   
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 
    <head>
	<meta http-equiv="content-type" content="text/html; meta charset=utf-8" />
        <meta name="description" content="" />  
        <meta name="keywords" content="" /> 
		<title>RKTandSIX</title>
		<link rel=stylesheet href="../index1.css" type="text/css" />
		  <link rel="stylesheet" type="text/css" href="../js/tooltipster.css" />
        <style type="text/css">
 
        
 
            #contain {width:300px; margin:0 auto;}
 
      
            .line label {display:inline-block; width:140px;}
 
            
            form input[type="text"],
            form input[type="password"],
            form input[type="email"] {width:160px;}
 
            form .line {clear:both;}
            form .line.submit {text-align:right;}
			p {color:black;}
			
           
          
         
		 </style>
		 <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
         <script type="text/javascript" src="../js/jquery.tooltipster.min.js"></script>
        <SCRIPT language="Javascript"> 
        function Chargement() { } 
         
        $(document).ready(function() {
            $('.tooltip').tooltipster();
        });
	
    </script> <!-- boite de dialogue pour le homepage -->
    </head>
    <body>
	

 <div class="main">

    <div class="menuGauche">
	    <div class="home">
		<a href="../index.php"><img src="../logos/homepage.jpg" title="Homepage" class="tooltip"/></a>
		</div> <br /><br />

        <div class="shop">

            <h2> <b><a href="../index1.php"  title="go back to the store !" style='text-decoration:none; color:black;'>ESHOP//PRODUCTS </a></b></h2>
			
		</div>
		<div class="container">


<span class="box">
<a href="medias/index3.php">MEDIA</a>
</span>

<span class="box">
<a href="../index.php?page=contact">CONTACT</a>
</span>
<span class="box">
<a href="register.php">REGISTER</a>
</span>
<span class="box">
<a href="login.php">LOGIN</a>
</span>

<br style="clear:both;"/>
</div><br /><br />

			
    <form method="post" action="" class="formulaire" name="monform" id="monform" style='margin-left:15px;'>
        
            <label for="newsletter" class="new" style='font-family:arial; font-size:15px;' >Newsletter</label>
        
        
           <input type="text" placeholder="Adresse email"  id="newsletter" name="email" style='width:100px; text-align:center;'>
        
        
            <button title="S'abonner" type="submit">ok</button>
        
    </form><br/> 

     
           
		   
		  
		   <div class= "logo" onLoad="Chargement();">
           <a href="#" onMouseOver="document.Img_1.src='../logos/logo2.jpg';" onMouseOut="document.Img_1.src='../logos/logo.jpg';"> <img name="Img_1" src="../logos/logo.jpg"> </a>
		   </div> </br>
		   
		     <span class="social"><a href="https://www.facebook.com/rktandsix"> <img src="../logos/facebook.jpg" style='width:100px;height:35px;margin-left:7px;'/></a></span>
             <span class="social"><a href="http://www.google.com/+/learnmore/"> <img src="../logos/google.png" style='width:100px;height:35px;'/></a></span>  <br/> <br/>              
            <div class="cb">
		   <img src="../logos/payment.png" style='padding-top:25px; margin-left:7px;'/>
		   </div>

    </div>

            <div  style='float:left;margin-left:650px'>
        <div id="contain">
		<?php
		
				echo "<span style='color:red;'>".$msg."</span>";

		if($visible==true){ ?>
          <fieldset style='color:#6B0E0E;'> <form method="post" name="registerForm">
                <h1>SIGN IN / CREATE NEW ACCOUNT </h1>
				 <div class="line"><label for="Fname">First name  : </label><input type="text" id="Fname" name="Fname"/></div>
                <div class="line"><label for="Lname">Last name *: </label><input type="text" id="Lname" name="Lname"/></div>
				 <div class="line"><label for="username">Username : </label><input type="text" id="username" name="username"/></div>
                <div class="line"><label for="pwd">Password *: </label><input type="password" id="pwd" name="pwd" /></div>               
                <div class="line"><label for="email">Email *: </label><input type="email" id="email" name="email" /></div>
                <div class="line"><label for="add">Address *: </label><input type="text" id="add" name="add"/></div>
                <div class="line"><label for="ptc">Post Code *: </label><input type="text" id="ptc" name="ptc"/></div>
				 <div class="line"><label for="country">Country *: </label><input type="text" id="username" name="username"/></div>
                <div class="line submit" ><input type="submit" value="send" id="send" style='background-color:black;color:white;'/></div>
 
                <p>Note: Please make sure your details are correct before submitting form and that all fields marked with * are completed!.</p>
            </form></fieldset>
			<?php }
			
			
			?>
        </div>



	
		</div>

                <div class="menuDroit">
			         <div class= "loupe">
                     <img src="../logos/Loupe.png" style='width:30px;height:30px;'/>
					 </div>
		             <div class= "panier">
                     <img src="../logos/panier.png" style='width:32px;height:30px;'/>
		             </div>
		             <div class= "enveloppe">
                     <a href="../index.php?page=contact"><img src="../logos/enveloppe.jpg" style='width:30px;height:25px;'/></a>
		             </div>			   
			               
                </div>
    </body>
</html>
