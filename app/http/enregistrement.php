<?php include "../../bdd/connexion.php"; ?>
<?php 
if (empty($_POST["nom"])) {
	$n = "Le champ nom est obligatoire";
	header("location:../../inscription.php?message=$n");

}
elseif (empty($_POST["postnom"])) {
	$n = "Le champ postnom est obligatoire";
	header("location:../../inscription.php?message=$n");

}
elseif (empty($_POST["mail"])) {
	$n = "Le champ mail est obligatoire";
	header("location:../../inscription.php?message=$n");

}
elseif (empty($_POST["motdepasse"])) {
	$n = "Le champ Mot de passe est obligatoire";
	header("location:../../inscription.php?message=$n");

}

elseif(!empty($_POST["nom"])){
	$dossier = "../../photos/";
	$nom = htmlspecialchars($_POST["nom"]);
	$postnom = htmlspecialchars($_POST["postnom"]);
	$mail = htmlspecialchars($_POST["mail"]);
	$motdepasse = sha1(htmlspecialchars($_POST["motdepasse"]));

	if(strlen($_POST["motdepasse"]) >= 4 and strlen($_POST["motdepasse"]) <= 8){

		$recupMail = $bdd->prepare("SELECT * FROM utilisateur where mail=?");
		$recupMail->execute([$mail]);
		$InfosMail = $recupMail->fetch();
		if(!$InfosMail){
			$photo=$_POST["nom"].'_'.$_FILES["photo"]["name"];
	        move_uploaded_file($_FILES["photo"]["tmp_name"], $dossier.$photo);

	        $infos = $bdd->prepare("INSERT INTO utilisateur(nom, postnom, mail, photo, motdepasse, dateI)values(?,?,?,?,?,NOW())");
	        $infos->execute([$nom, $postnom, $mail, $photo, $motdepasse]);


	        $recuUser = $bdd->prepare("SELECT * FROM utilisateur where mail=? and motdepasse=?");
	        $recuUser->execute([$mail, $motdepasse]);
	        if($info_donnees = $recuUser->fetch()){
	        	$_SESSION['user'] = $info_donnees->iduser;
	        	header("location:../../home.php");
	        }


		}else{
			$n = "La personne qui porte cette adresse mail existe déjà";
		    header("location:../../inscription.php?message=$n");
		}

	}else{
		$n = "Le mot de passe doit contenir 4 à 8 valeurs";
	    header("location:../../inscription.php?message=$n");
	}

}



 ?>