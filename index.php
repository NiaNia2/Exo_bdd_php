<?php $bdd = new PDO('mysql:host=mysql;dbname=nom_de_bdd;charset=utf8', 'nom_utilisateur', 'mot_de_passe'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php $request = $bdd->query('SELECT prenom, nom FROM user');
    while ($data = $request->fetch()) {
        echo '<p>nom' . $data['nom'] . 'prenom' . $data['prenom'] . '</p>';
    }
    ?>
</body>

</html>