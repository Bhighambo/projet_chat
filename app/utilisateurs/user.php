<?php 
function getUser($mail, $bdd){
	$recupUser = $bdd->prepare("SELECT * FROM utilisateur where mail=?");
	$recupUser->execute([$mail]);

	if($recupUser->rowCount()===1){
		$user = $recupUser->fetch();
		return $user; 
	}else{
		$user = [];
		return $user;
	}

}




 ?>