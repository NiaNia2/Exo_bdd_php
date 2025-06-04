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

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <style>
        ul {
            list-style: none;
            padding-left: 0px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
        }

        .btn {
            background-color: #2c3e50;
            text-decoration: none;
            color: #e74c3c;
            text-align: center;
            padding: 0.5rem;
            border-radius: 0.8rem 0;
            margin-right: 1rem;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="total_film.php?titre= . $data['titre'] " class="btn" target="_blank"> Voir les films</a></li>
                <li><a href="user.php" class="btn" target="_blank"> Inscription</a></li>
                <li><a href="login.php" class="btn" target="_blank"> Se connecter</a></li>
            </ul>
        </nav>
    </header>






    <?php if (isset($_SESSION['user'])) {
        $nameUser = $_SESSION['user']['nom'];
        $firstNameUser = $_SESSION['user']['prenom'];
        echo '<p>bienvenue ' . $nameUser . ' ' . $firstNameUser . '</p>';
        echo '<a href="form.php" target="_blank" class="btn">Ajouter un film</a>';
        echo '<a href="deco.php" class="btn">Deconnection</a>';
    }
    ?>

    <?php while ($data = $request->fetch()) {
        echo '<p>Titre: ' . $data['titre'] . ' Réalisateur: ' . $data['realisateur'] . ' Genre: ' . $data['genre'] . ' Durée: ' . $data['duree'] . '</p><a target="_blank" class="btn" href="film.php?id=' . $data['id'] . '"> Voir plus</a>';
    } ?>

</body>

</html>