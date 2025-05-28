<?php ob_start();
$bdd = new PDO('mysql:host=mysql;dbname=mediatheque;charset=utf8', 'root', 'root');
if (!empty($_POST['titre']) && !empty($_POST['realisateur']) && !empty($_POST['genre']) && !empty($_POST['duree']) && !empty($_POST['synopsis'])) {
    $titre = $_POST['titre'];
    $realisateur = $_POST['realisateur'];
    $genre = $_POST['genre'];
    $duree = $_POST['duree'];
    $synopsis = $_POST['synopsis'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>

<body>
    <form action="form.php" method="post">
        <label for="titre">Titre: </label>
        <input type="text" name="titre"><br>
        <label for="realisateur">Réalisateur: </label>
        <input type="text" name="realisateur"><br>
        <label for="genre">Genre: </label>
        <input type="text" name="genre"><br>
        <label for="duree">Duree: </label>
        <input type="text" name="duree"><br>
        <label for="synopsis">Synopsys: </label>
        <input type="text" name="synopsis"><br>
        <button> Ajouter !</button>
    </form>

    <style>
        button {
            background-color: #2c3e50;
            text-decoration: none;
            color: #e74c3c;
            text-align: center;
            padding: 0.5rem;
            border-radius: 0.8rem 0;
            border: none;
        }
    </style>
</body>

</html>