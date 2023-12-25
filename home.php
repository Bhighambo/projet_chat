<?php include "bdd/connexion.php"; ?>
<?php 
if (isset($_SESSION['user'])) {

	include "app/utilisateurs/conversation.php";
	$recupUser = $bdd->prepare("SELECT * FROM utilisateur where iduser=?");
	$recupUser->execute([$_SESSION['user']]);
	$user = $recupUser->fetch();


	$conversation = getconversation($user->iduser, $bdd);
	print_r($conversation);
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
	   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	</head>
	<body class="d-flex justify-content-center align-items-center vh-100">
		<div class="p-2 w-400 rounded shadow">
			<div>
				<div class="d-flex mb-3 p-3 bg-light justify-content-between align-items-center">
					<div class="d-flex align-items-center">
						<img src="photos/<?php echo $user->photo; ?>" class="w-25 rounded-circle">
						<h3 class="fs-xs m-2" style="font-size: 1rem;"><?php echo $user->nom." ".$user->postnom; ?></h3>
					</div>
					<a href="bdd/deconnexion.php" class="btn btn-danger">Deconnexion</a>
				</div>
				<div class="input-group mb-3">
					<input type="text" name="" placeholder="Recherche..." class="form-control">
					<button class="btn btn-primary"><i class="fa fa-search"></i></button>
				</div>
				<ul class="list-group mvh-50 overflow-auto">
					<li class="list-group-item">
						<a href="chat.php" class="d-flex justify-content-between align-items-center p-2" style="text-decoration: none;">
							<div class="d-flex align-items-center">
								<img src="photos/CESAR_20221124_170550.jpg" class="rounded-circle" style="width:10%">
								<h3 class="fs-xs m-2" style="font-size:20px;">Cesar Mabhuluko</h3>
							</div>
						</a>
					</li>
					<li class="list-group-item">
						<a href="chat.php" class="d-flex justify-content-between align-items-center p-2" style="text-decoration: none;">
							<div class="d-flex align-items-center">
								<img src="photos/CESAR_20221124_170550.jpg" class="rounded-circle" style="width:10%">
								<h3 class="fs-xs m-2" style="font-size:20px;">Cesar Mabhuluko</h3>
							</div>
						</a>
					</li>
					<li class="list-group-item">
						<a href="chat.php" class="d-flex justify-content-between align-items-center p-2" style="text-decoration: none;">
							<div class="d-flex align-items-center">
								<img src="photos/CESAR_20221124_170550.jpg" class="rounded-circle" style="width:10%">
								<h3 class="fs-xs m-2" style="font-size:20px;">Cesar Mabhuluko</h3>
							</div>
						</a>
					</li>

				</ul>
			</div>
		</div>
		

	
	</body>
	</html>


	<?php
}else{
	header("location:index.php");
}


 ?>