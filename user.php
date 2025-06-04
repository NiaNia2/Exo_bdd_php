<?php ob_start();
session_start();
$bdd = new PDO('mysql:host=mysql;dbname=mediatheque;charset=utf8', 'root', 'root');

if (!empty($_POST['name']) && !empty($_POST['firstname']) && !empty($_POST['password'])) {
    $name = htmlspecialchars($_POST['name']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_ARGON2I);

    $requestcreate = $bdd->prepare('INSERT INTO user(nom,prenom,mot_passe) VALUES(?,?,?)');
    $requestcreate->execute(array($name, $firstname, $password));

    $requestcreate = $bdd->prepare("SELECT id,nom,prenom FROM user WHERE nom = '$name' AND prenom = '$firstname'");
    $requestcreate->execute(array());
    $data = $requestcreate->fetch();

    $_SESSION['user'] = ['id' => $data['id'], 'nom' => $data['nom'], 'prenom' => $data['prenom']];
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de compte</title>
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
    <form action="user.php" method="post">
        <label for="name"> Nom: </label>
        <input type="text" name="name">
        <label for="firstname">Prénom: </label>
        <input type="text" name="firstname">
        <label for="password">Mot de passe: </label>
        <input type="password" name="password">
        <button class="btn">Envoyer</button>
    </form>


</body>

</html>