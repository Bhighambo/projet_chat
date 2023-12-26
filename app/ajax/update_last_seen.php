<?php include "../../bdd/connexion.php"; ?>
<?php 

if(isset($_SESSION['mail'])){

	$id = $_SESSION['user'];


	$modifDate = $bdd->prepare("UPDATE utilisateur set dateI = NOW() where iduser=?");
	$modifDate->execute([$id]);
}else{
	header("Location:../../index.php");
}


 ?>