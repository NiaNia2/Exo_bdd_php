<?php ob_start();
session_start();
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
$request = $bdd->query('SELECT id, titre, realisateur, genre, duree FROM film ORDER BY id DESC LIMIT 3');
while ($data = $request->fetch()) {
    echo '<p>Titre: ' . $data['titre'] . ' Réalisateur: ' . $data['realisateur'] . ' Genre: ' . $data['genre'] . ' Durée: ' . $data['duree'] . '</p><a target="_blank" class="btn" href="film.php?id=' . $data['id'] . '"> Voir plus</a>';
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
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


    <a href="form.php" target="_blank" class="btn">Ajouter un film</a>

    <a href="total_film.php?titre= . $data['titre'] " class="btn" target="_blank"> Voir les films</a>

    <a href="user.php" class="btn" target="_blank"> Inscription</a>

    <a href="login.php" class="btn" target="_blank"> Se connecter</a>

    <?php echo '<p>bienvenue ' . isset($_SESSION['user'][1]) . ' ' . isset($_SESSION['user'][2]) . '</p>'; ?>
</body>

</html>