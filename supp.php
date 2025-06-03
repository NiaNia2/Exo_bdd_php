<?php ob_start();
$bdd = new PDO('mysql:host=mysql;dbname=mediatheque;charset=utf8', 'root', 'root');

$idSupp = htmlspecialchars($_GET['id']);
$request = $bdd->prepare("DELETE FROM film 
                          WHERE id = ?");
$request->execute(array($idSupp));

header('location:total_film.php');
