<?php include "bdd/connexion.php"; ?>
<?php 
if (isset($_SESSION['user'])) {
	$recupUser = $bdd->prepare("SELECT * FROM utilisateur where iduser=?");
	$recupUser->execute([$_SESSION['user']]);
	$user = $recupUser->fetch();
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home_chat</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="css/style.css">
	    <link rel="icon" type="text/css" href="images/message.png">
	</head>
	<body class="d-flex justify-content-center align-items-center vh-100">
		<div class="p-2 w-400 rounded shadow">
			<div>
				<div class="d-flex mb-3 p-3 bg-light justify-content-between align-items-center">
					<div class="d-flex align-items-center">
						<img src="photos/JACKSON_conference.jpg" class="w-25 rounded-circle">
						<h3 class="fs-xs m-2" style="font-size: 1rem;"><?php echo $user->nom." ".$user->postnom; ?></h3>
					</div>
					<a href="bdd/deconnexion.php" class="btn btn-danger">Deconnexion</a>
				</div>
			</div>
		</div>
		

	
	</body>
	</html>


	<?php
}else{
	header("location:index.php");
}


 ?>