<?php ob_start();
session_start();
$bdd = new PDO('mysql:host=mysql;dbname=mediatheque;charset=utf8', 'root', 'root');
$idFilm = htmlspecialchars($_GET['id']);

$request = $bdd->prepare("SELECT titre, realisateur, genre, duree, synopsis 
                        FROM film 
                        WHERE id = ?");

$request->execute(array($idFilm));



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film</title>
    <style>
        .btn {
            background-color: #2c3e50;
            text-decoration: none;
            color: #e74c3c;
            text-align: center;
            padding: 0.5rem;
            border-radius: 0.8rem 0;
        }
    </style>
</head>

<body>
    <?php
    while ($data = $request->fetch()) {
        echo '<p>Titre: ' . $data['titre'] . ' Réalisateur: ' . $data['realisateur'] . ' Genre: ' . $data['genre'] . ' Durée: ' . $data['duree'] . ' Synopsis: ' . $data['synopsis'] . '</p>';
        if (isset($_SESSION['user'])) {
            echo '<a href="modif.php?id=' . $idFilm . '" class="btn">Modifier</a>';
            echo '<a href="supp.php?id=' . $idFilm . '" class="btn">Supprimer</a>';
        }
    }
    ?>

</body>

</html>