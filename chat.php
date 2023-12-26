<?php include "bdd/connexion.php"; ?>
<?php 
if (isset($_SESSION['user'])) {
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
				<img src="photos/CESAR_20221124_170550.jpg" class="rounded-circle" style="width:10%">
				<h3 class="display-4 fs-sm m-2" style="font-size:20px;">
					JACKSON <br>
					<div class="d-flex align-items-center" title="online">
						<div class="online"></div><small style="color:#bbb; font-size:0.7rem; " class="d-block p-1">En ligne</small>
					</div>
				</h3>
				
			</div>

			<div class="shadow p-4 rounded d-flex flex-column mt-2 h-50 chat-box">
				<p class="rtext align-self-end border rounded p-2 mb-1" style="width: 65%; background: #f8f9fa; color: #444;">
					Bonjour Mr <small class="d-block" style="text-align:right;">12:00</small>
				</p>

				<p class="ltext border rounded p-2 mb-1" style="width: 65%; background: #3289c8; color: #444;">
					Bonjour Mr <small class="d-block" style="text-align:#fff;">12:00</small>
				</p>
			</div>

		</div>

    </body>
</html>
 <?php
}else{
	header("location:index.php");
}


 ?>