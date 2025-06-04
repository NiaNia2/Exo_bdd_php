<?php ob_start();
session_start();
$bdd = new PDO('mysql:host=mysql;dbname=mediatheque;charset=utf8', 'root', 'root');

$request = $bdd->query('SELECT id, titre, realisateur, genre, duree FROM film ORDER BY id DESC');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Film</title>
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
        echo '<p>Titre: ' . $data['titre'] . ' Réalisateur: ' . $data['realisateur'] . ' Genre: ' . $data['genre'] . ' Durée: ' . $data['duree'] . '</p><a target="_blank" class="btn" href="film.php?id=' . $data['id'] . '"> Voir plus</a>';
    }
    ?>

</body>

</html>