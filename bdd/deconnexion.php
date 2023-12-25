<?php include 'connexion.php'; ?>
<?php 
	session_unset();
	session_destroy();
	header("location:../index.php");

 ?>