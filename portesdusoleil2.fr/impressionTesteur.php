<!DOCTYPE html >

<?php

	// récupération des formulaires de la page inscriptionTesteur.html 
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
		$datedenaissance = $_POST["q3"];
	}else{
		$datedenaissance = null;
	}
	
	if ( isset($_POST["q4"]) ){
		$mail = $_POST["q4"];
	}else{
		$mail = null;
	}
	
	if ( isset($_POST["q5"]) ){
		$adresse = $_POST["q5"];
	}else{
		$adresse = null;
	}
	
		if ( isset($_POST["q6"]) ){
		$codepostal = $_POST["q6"];
	}else{
		$codepostal = null;
	}
	
		if ( isset($_POST["q7"]) ){
		$ville = $_POST["q7"];
	}else{
		$ville = null;
	}
	
		if ( isset($_POST["q8"]) ){
		$telephone = $_POST["q8"];
	}else{
		$telephone = null;
	}
	
		if ( isset($_POST["q9"]) ){
		$commentaire = $_POST["q9"];
	}else{
		$commentaire = null;
	}
		
	mysql_connect("localhost", "root", "") ; // connexion à la base de donnée
	mysql_select_db("portesdusoleil") ; // selection de la base
	
	// Ajout d'un testeur
	mysql_query("INSERT INTO testeur (Nom, Prenom, Datedenaissance, Mail, Adresse, Codepostal, Ville, Telephone, Commentaire)
				VALUES ('".$nom."', '".$prenom."', '".$datedenaissance."', '".$mail."','".$adresse."','".$codepostal."','".$ville."','".$telephone."','".$commentaire."')
				") ;	
	mysql_close() ; // déconnexion de la base
	
?>

<html> 
	<head>
		<meta charset="UTF-8" />
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
		<title>Impression</title>
		<link rel="stylesheet" type="text/css" href="./css/ma_feuille_css_generale.css" />
		<link rel="stylesheet" type="text/css" href="./css/ma_feuille_css_imprimante.css" media="print" />
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/cs-select.css" />
		<link rel="stylesheet" type="text/css" href="css/cs-skin-boxes.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	
	<!--[if IE 6 ]><body class="ie6 old_ie"><![endif]-->
    <!--[if IE 7 ]><body class="ie7 old_ie"><![endif]-->
    <!--[if IE 8 ]><body class="ie8"><![endif]-->
    <!--[if IE 9 ]><body class="ie9"><![endif]-->
    <!--[if !IE]><!--><body><!--<![endif]-->
    
			<div class="fs-form-wrap" id="fs-form-wrap">
				<!--Affichage du justificatif d'inscription d'un exposant -->
				<title>Récapitulatif de votre inscription</title>
				<meta charset="UTF-8">
				<div class="fs-title">
					<h1>Inscription réussie !</h1>
					<div class="codrops-top">
						<a class="codrops-icon codrops-icon-prev" href="./index.php"><span>Retour à l'accueil</span></a>
						<a class="codrops-icon codrops-icon-info" href="#"><span>L'impression de votre justification est importante ! Gardez précieusement le papier avec vous tout au long de votre séjour !</span></a>
					</div>
				</div>
				<div id="bloc">
					<div class='police' style='float:left'>Nom : </div>
					<div class='police' style='float:left'><?php echo $nom ; ?></div><br/>
					<div class='police' style='clear:left ; float:left'>Prénom : </div>
					<div class='police' style='float:left'><?php echo $prenom ; ?></div><br/>
					<div class='police' style='clear:left ; float:left'>Date de naissance : </div>
					<div class='police' style='float:left'> 	<?php echo $datedenaissance; ?></div><br/>
					<div class='police' style='clear:left ; float:left'>Mail :</div>
					<div class='police' style='float:left'> 	<?php echo $mail; ?></div><br/>
					<div class='police' style='clear: left ; float:left'>Adresse : </div>
					<div class='police' style='float:left'>	<?php echo $adresse ; ?></div>
					<div class='police' style='clear: left ; float:left'>Code postal : </div>
					<div class='police' style='float:left'>	<?php echo $codepostal ; ?></div>
					<div class='police' style='clear: left ; float:left'>Ville : </div>
					<div class='police' style='float:left'>	<?php echo $ville ; ?></div>
					<div class='police' style='clear: left ; float:left'>Telephone : </div>
					<div class='police' style='float:left'>	<?php echo $telephone ; ?></div>
				</div>
				<p style='clear:left ; text-align:center'>
					<br/>
					<button style="margin-top:150px;" ONCLICK="window.print()" class='fs-submit'>Imprimez votre justificatif</button>
				</p>
			</div>			
		
		
		
				<script src="js/classie.js"></script>
		<script src="js/selectFx.js"></script>
		<script src="js/fullscreenForm.js"></script>
		<script>
			(function() {
				var formWrap = document.getElementById( 'fs-form-wrap' );

				[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
					new SelectFx( el, {
						stickyPlaceholder: false,
						onChange: function(val){
							document.querySelector('span.cs-placeholder').style.backgroundColor = val;
						}
					});
				} );

				new FForm( formWrap, {
					onReview : function() {
						classie.add( document.body, 'overview' ); // for demo purposes only
					}
				} );
			})();
		</script>
	</body> 
</html>
