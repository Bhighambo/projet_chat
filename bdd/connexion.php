<?php
$bdd = new pdo("mysql:host=localhost; dbname=projet_chat; charset=utf8",  'root', '');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
session_start();
?>