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

    </body>
</html>
 <?php
}else{
	header("location:index.php");
}


 ?>