<?php ob_start();
$bdd = new PDO('mysql:host=mysql;dbname=mediatheque;charset=utf8', 'root', 'root');
if (isset($_POST['titre']) && isset($_POST['realisateur']) && isset($_POST['genre']) && isset($_POST['duree']) && isset($_POST['synopsis'])) {
    $titre = htmlspecialchars($_POST['titre']);
    $realisateur = htmlspecialchars($_POST['realisateur']);
    $genre = htmlspecialchars($_POST['genre']);
    $duree = htmlspecialchars($_POST['duree']);
    $synopsis = htmlspecialchars($_POST['synopsis']);
    $requestcreat = $bdd->prepare('INSERT INTO film(titre,realisateur,genre,duree,synopsis) VALUES(?,?,?,?,?)');
    $requestcreat->execute(array($titre, $realisateur, $genre, $duree, $synopsis));
    header('location:index.php');
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
        <input type="text" name="titre" required><br>
        <label for="realisateur">Réalisateur: </label>
        <input type="text" name="realisateur" required><br>
        <label for="genre">Genre: </label>
        <input type="text" name="genre" required><br>
        <label for="duree">Duree: </label>
        <input type="number" name="duree" required><br>
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

        form {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            align-items: flex-start;
        }
    </style>
</body>

</html>