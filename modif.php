<?php ob_start();
session_start();
$bdd = new PDO('mysql:host=mysql;dbname=mediatheque;charset=utf8', 'root', 'root');
$idFilm = htmlspecialchars($_GET['id']);
$requestSelect = $bdd->prepare("SELECT titre, realisateur, genre, duree, synopsis 
                        FROM film 
                        WHERE id = ?");
$requestSelect->execute(array($idFilm));
$data = $requestSelect->fetch();

if (!empty($_POST['titre']) && !empty($_POST['realisateur']) && !empty($_POST['genre']) && !empty($_POST['duree']) && !empty($_POST['synopsis'])) {
    $titre = htmlspecialchars($_POST['titre']);
    $realisateur = htmlspecialchars($_POST['realisateur']);
    $genre = htmlspecialchars($_POST['genre']);
    $duree = htmlspecialchars($_POST['duree']);
    $synopsis = htmlspecialchars($_POST['synopsis']);

    $request = $bdd->prepare('UPDATE film
                              SET titre= ?, realisateur = ?, genre = ?, duree = ?, synopsis = ?
                              WHERE id = ?');
    $request->execute(array($titre, $realisateur, $genre, $duree, $synopsis, $idFilm));
    header('location:total_film.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    echo '<form action="modif.php?id=' . $idFilm . '" method="post">';
    echo '<label for="titre">Titre: </label>';
    echo '<input type="text" name="titre" value="' . $data['titre'] . '"><br>';
    echo '<label for="realisateur">Réalisateur: </label>';
    echo '<input type="text" name="realisateur" value="' . $data['realisateur'] . '"><br>';
    echo '<label for="genre">Genre: </label>';
    echo '<input type="text" name="genre" value="' . $data['genre'] . '"><br>';
    echo '<label for="duree">Duree: </label>';
    echo '<input type="number" name="duree" value="' . $data['duree'] . '"><br>';
    echo ' <label for="synopsis">Synopsys: </label>';
    echo '<input type="text" name="synopsis" value="' . $data['synopsis'] . '"><br>';
    echo '<input type="submit" value="Envoyer!" class="btn">';
    echo '</form>';
    ?>
</body>

</html>