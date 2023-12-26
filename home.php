<?php include "bdd/connexion.php"; ?>
<?php 
if (isset($_SESSION['user'])) {

	include "app/utilisateurs/conversation.php";
	include "app/utilisateurs/timeAgo.php";
	$recupUser = $bdd->prepare("SELECT * FROM utilisateur where iduser=?");
	$recupUser->execute([$_SESSION['user']]);
	$user = $recupUser->fetch();


	$conversation = getconversation($user->iduser, $bdd);
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
	   <link rel="stylesheet" type="text/css" href="css2/style2.css">
	</head>
	<body class="d-flex justify-content-center align-items-center vh-100">
		<div class="p-2 w-400 rounded shadow">
			<div>
				<div class="d-flex mb-3 p-3 bg-light justify-content-between align-items-center">
					<div class="d-flex align-items-center">
						<img src="photos/<?php echo $user->photo; ?>" class="w-25 rounded-circle">
						<h3 class="fs-xs m-2" style="font-size: 1rem;"><?php echo $user->nom." ".$user->postnom; ?></h3>
					</div>
					<a href="bdd/deconnexion.php" class="btn btn-danger">Dec</a>
				</div>
				<div class="input-group mb-3">
					<input type="text" name="" placeholder="Recherche..." class="form-control">
					<button class="btn btn-primary"><i class="fa fa-search"></i></button>
				</div>
				<ul class="list-group mvh-50 overflow-auto">
					<?php if (!empty($conversation)) {?>

						<?php

						foreach ($conversation as $conversations) {
						 	?>
						 	<li class="list-group-item">
								<a href="chat.php?user=<?php echo $conversations->mail; ?>" class="d-flex justify-content-between align-items-center p-2" style="text-decoration: none;">
									<div class="d-flex align-items-center">
										<img src="photos/<?php echo $conversations->photo; ?>" class="rounded-circle" style="width:10%">
										<h3 class="fs-xs m-2" style="font-size:20px;"><?php echo $conversations->nom." ".$conversations->postnom; ?></h3>
									</div>
									<?php 

									if (last_seen($conversations->dateI) == "Active") {
										?>
										<div title="online">
										    <div class="online"></div>
									    </div>

										<?php
									}

									 ?>
									
								</a>
							</li>

						 	<?php
						 } 

						 ?>
					<?php
				} else{?>
					<div class="alert alert-info text-center"><i class="fa fa-comments d-block fs-big" style="font-size:6rem;"></i>Vous n'avez pas encore démarrer une discussion</div>
					<?php
				}

					?>
					
				</ul>
			</div>
		</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	

	<script>
		$(document).ready(function(){
			//la modification automatique

			let lastseenUpadate = function(){
				$.get("app/ajax/update_last_seen.php", function(data, status){
					console.log(data);

				});
			}
			lastseenUpadate();

			setInterval(lastseenUpadate, 10000);

		});
	</script>
	</body>
	</html>


	<?php
}else{
	header("location:index.php");
}


 ?>