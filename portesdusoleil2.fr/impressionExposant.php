<!DOCTYPE html >

<?php

	// récupération des formulaires de la page inscriptionExposant.html 
	if ( isset($_POST["q1"]) ){		
		$nom = $_POST["q1"];
	}else{
		$nom = null;
	}
	
	if ( isset($_POST["q2"]) ){
		$prenom = $_POST["q2"];
	}else{
		$prenom = null;
	}
	
	if ( isset($_POST["q3"]) ){
		$organisation = $_POST["q3"];
	}else{
		$organisation = null;
	}
	
	if ( isset($_POST["q4"]) ){
		$mail = $_POST["q4"];
	}else{
		$mail = null;
	}
	
	if ( isset($_POST["q5"]) ){
		$motdepasse = $_POST["q5"];
	}else{
		$motdepasse = null;
	}
	
	
	$sha1 = sha1($motdepasse);
	
	mysql_connect("localhost", "root", "") ; // connexion à la base de donnée
	mysql_select_db("portesdusoleil") ; // selection de la base
	
	// Ajout d'un exposant
	mysql_query("INSERT INTO exposant (Nom, Prenom, Organisation, Mail, Motdepasse)
				VALUES ('".$nom."', '".$prenom."', '".$organisation."', '".$mail."','".$sha1."')
				") ;	
	mysql_close() ; // déconnexion de la base
	
?>

<html> 
	<head>
		<meta charset="UTF-8" />
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
		<title>Confirmation</title>
	</head>
	
	<!--[if IE 6 ]><body class="ie6 old_ie"><![endif]-->
    <!--[if IE 7 ]><body class="ie7 old_ie"><![endif]-->
    <!--[if IE 8 ]><body class="ie8"><![endif]-->
    <!--[if IE 9 ]><body class="ie9"><![endif]-->
    <!--[if !IE]><!--><body><!--<![endif]-->
    
    	<div>	
			<div>
				<fieldset>
				<!--Affichage du justificatif d'inscription d'un exposant -->
				<title>Récapitulatif de votre inscription</title>
				<meta charset="UTF-8">
				<p class='police' style='text-align:center; font-style:bold ;'>Récapitulatif de votre inscription</p>
				<div >
					<div class='police' style='float:left'>Nom :</div>
					<div class='policeblue' style='float:left'><?php echo $nom ; ?></div><br/>
					<div class='police' style='clear:left ; float:left'>Prénom :</div>
					<div class='policeblue' style='float:left'><?php echo $prenom ; ?></div><br/>
					<div class='police' style='clear:left ; float:left'>Organisation :</div>
					<div class='policeblue' style='float:left'> 	<?php echo $organisation; ?></div><br/>
					<div class='police' style='clear:left ; float:left'>Mail :</div>
					<div class='policeblue' style='float:left'> 	<?php echo $mail; ?></div><br/>
					<div class='police' style='clear: left ; float:left'>Mot de passe :</div>
					<div class='policeblue' style='float:left'>	<?php echo $motdepasse ; ?></div>
				</div>
				<p style='clear:left ; text-align:center'>
					<br/>
					<!--<INPUT TYPE=button VALUE="IMPRIMER" ONCLICK="window.print()" class='button_blue'></INPUT> -->
					<a href="./index.php"><input type="button" value="Retour" class="register" /></a>
				</p>
				</fieldset>
			</div>			
    	</div>
	</body> 
</html>
