<!DOCTYPE html >

<?php

if ( isset($_POST["mail"]) ){		
		$mail = $_POST["mail"];
	}else{
		$mail = null;
	}
	
	if ( isset($_POST["motdepasse"]) ){		
		$motdepasse = $_POST["motdepasse"];
	}else{
		$motdepasse = null;
	}
$motdepasse_sha = sha1($motdepasse);

// Vérification des identifiants
mysql_connect("localhost", "root", "") ; // connexion à la base de donnée
mysql_select_db("portesdusoleil") ; // selection de la base
// Ajout d'un exposant
$result = mysql_result(mysql_query("SELECT COUNT(*) FROM exposant WHERE Mail='".$mail."' AND Motdepasse='".$motdepasse_sha."'"), 0); 


   // si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
	if($result != 1)
	{
		$erreur = "Le compte n'existe pas, vérifiez votre mail et votre mot de passe à nouveau.";
		echo $erreur;
	} 
	
	// si on obtient une réponse, alors l'utilisateur est un membre
	else
	{
		$id = mysql_query("SELECT Id FROM exposant WHERE Mail='".$mail."' AND Motdepasse='".$motdepasse_sha."'"); 
		session_start(); 
		$_SESSION['mail'] = $mail;
		$_SESSION['id'] = $id;
		echo 'Connexion reussie';
		echo $_SESSION['mail'];
		echo $_SESSION['id'];

	} 
mysql_close() ; // déconnexion de la base


?>

<a href ="login.php"> Se deconnecter </a>