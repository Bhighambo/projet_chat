<?php include "../../bdd/connexion.php"; ?>
<?php 

if (empty($_POST["user_mail"])) {
    $n = "Le champ mail est obligatoire";
    header("location:../../index.php?message=$n");
    
}
elseif (empty($_POST["user_password"])) {
    $n = "Le champ Mot de passe est obligatoire";
    header("location:../../index.php?message=$n");
}

elseif(!empty($_POST["user_mail"])){
    $user_mail = htmlspecialchars($_POST['user_mail']);
    $user_password = sha1(htmlspecialchars($_POST['user_password']));

    $recupUser = $bdd->prepare("SELECT * FROM utilisateur where mail=? and motdepasse=?");
    $recupUser->execute([$user_mail, $user_password]);
    if($donnees_infos = $recupUser->fetch()){
        $_SESSION['user'] = $donnees_infos->iduser;
        header("location:../../home.php");
    }else{
       $n = "L'adresse mail ou/et Mot de passe incorrect";
       header("location:../../index.php?message=$n"); 
    }
}


 ?>