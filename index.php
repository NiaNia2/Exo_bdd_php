<?php ob_start();
$bdd = new PDO('mysql:host=mysql;dbname=mediatheque;charset=utf8', 'root', 'root');

if (!empty($_POST['name']) && !empty($_POST['firstname'])) {
    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    // requete creation
    // $requestcreate = $bdd->prepare('INSERT INTO film(nom,prenom) VALUES(?,?)');
    // $data = $requestcreate->execute(array($name, $firstname));
}
// $request = $bdd->query('SELECT nom, prenom FROM user');
// while ($data = $request->fetch()) {
// echo '<p>nom' . $data['nom'] . 'prenom' . $data['prenom'] . '</p>';
// }
$request = $bdd->query('SELECT titre, realisateur, genre, duree FROM film ORDER BY id DESC LIMIT 3');
while ($data = $request->fetch()) {
    echo '<p>Titre: ' . $data['titre'] . 'Réalisateur: ' . $data['realisateur'] . 'Genre: ' . $data['genre'] . 'Durée: ' . $data['duree'] . '</p>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="index.php" method="post">
        <label for="name">Entrée nom</label>
        <input type="text" name="name">
        <label for="firstname">Entrée prénom</label>
        <input type="text" name="firstname">
        <button>Envoyer</button>
    </form>


    <a href="form.php" target="_blank" class="btn">Ajouter un film</a>

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
</body>

</html>