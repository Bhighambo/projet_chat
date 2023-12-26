<?php include "bdd/connexion.php"; ?>
<?php 
if (isset($_SESSION['user'])) {

	include "app/utilisateurs/conversation.php";
	include "app/utilisateurs/timeAgo.php";

	if(!isset($_GET['user'])){
		header("location:home.php");
		exit;
	}

	$chatwith = getconversation($_GET['user'], $bdd);

	$recupUser = $bdd->prepare("SELECT * FROM utilisateur where iduser=?");
	$recupUser->execute([$_GET['user']]);
	$infos = $recupUser->fetch();

	if(empty($chatwith)){
		header("location:home.php");
		exit;
	}
 ?>
<!DOCTYPE html>
 <html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>User_chat</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="css/style.css">
	    <link rel="icon" type="text/css" href="images/message.png">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	    <link rel="stylesheet" type="text/css" href="css2/style2.css">
	</head>
	<body class="d-flex justify-content-center align-items-center vh-100">

		<div class="w-400 shadow p-4 rounded">
			<a href="home.php" class="fs-4 link-dark">&#8592;</a>

			<div class="d-flex align-items-center">
				<img src="photos/<?php echo $infos->photo; ?>" class="rounded-circle" style="width:10%">
				<h3 class="display-4 fs-sm m-2" style="font-size:20px;">
					<?php echo $infos->nom." ".$infos->postnom; ?> <br>
					<div class="d-flex align-items-center" title="En ligne">
						<?php if (last_seen($infos->dateI) == "Active") {
							?>
							<div class="online"></div><small style="color:#bbb; font-size:0.7rem; " class="d-block p-1">En ligne</small>

							<?php
						}else{
							?>
							<small style="color:#bbb; font-size:0.7rem; " class="d-block p-1"><?php echo $infos->dateI; ?></small>

							<?php
						}
						?>
					</div>
				</h3>
				
			</div>

			<div class="shadow p-4 rounded d-flex flex-column mt-2 chat-box" id="chatBox" style="overflow-y: auto; max-height: 50vh;">
				<p class="rtext align-self-end border rounded p-2 mb-1" style="width: 65%; background: #f8f9fa; color: #444;">
					Bonjour Mr <small class="d-block" style="text-align:right;">12:00</small>
				</p>

				<p class="ltext border rounded p-2 mb-1" style="width: 65%; background: #3289c8; color: #fff;">
					Bonjour Mr <small class="d-block" style="text-align:#fff;">12:02</small>
				</p>
				<p class="rtext align-self-end border rounded p-2 mb-1" style="width: 65%; background: #f8f9fa; color: #444;">
					Bonjour Mr <small class="d-block" style="text-align:right;">12:00</small>
				</p>

				<p class="ltext border rounded p-2 mb-1" style="width: 65%; background: #3289c8; color: #fff;">
					Bonjour Mr <small class="d-block" style="text-align:#fff;">12:02</small>
				</p>
				<p class="rtext align-self-end border rounded p-2 mb-1" style="width: 65%; background: #f8f9fa; color: #444;">
					Bonjour Mr <small class="d-block" style="text-align:right;">12:00</small>
				</p>

				<p class="ltext border rounded p-2 mb-1" style="width: 65%; background: #3289c8; color: #fff;">
					Bonjour Mr <small class="d-block" style="text-align:#fff;">12:02</small>
				</p>
				<p class="rtext align-self-end border rounded p-2 mb-1" style="width: 65%; background: #f8f9fa; color: #444;">
					Bonjour Mr <small class="d-block" style="text-align:right;">12:00</small>
				</p>

				<p class="ltext border rounded p-2 mb-1" style="width: 65%; background: #3289c8; color: #fff;">
					Bonjour Mr <small class="d-block" style="text-align:#fff;">12:02</small>
				</p>
				<p class="rtext align-self-end border rounded p-2 mb-1" style="width: 65%; background: #f8f9fa; color: #444;">
					Bonjour Mr <small class="d-block" style="text-align:right;">12:00</small>
				</p>

				<p class="ltext border rounded p-2 mb-1" style="width: 65%; background: #3289c8; color: #fff;">
					Bonjour Mr <small class="d-block" style="text-align: right;">12:02</small>
				</p>
			</div>
			<div class="input-group mb-3">
				<textarea name="" cols="3" class="form-control" style="resize: none;"></textarea>
				<button class="btn btn-primary"><i class="fa fa-paper-plane"></i></button>
			</div>

		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	

	<script>
		var scrollDown = function(){
			let chatBox = document.getElementById('chatBox');
			chatBox.scrollTop = chatBox.scollHeight;
		}
		scrollDown();

		$(document).ready(function(){

			

		});
	</script>

    </body>
</html>
 <?php
}else{
	header("location:index.php");
}


 ?>