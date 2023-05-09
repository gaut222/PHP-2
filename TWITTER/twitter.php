<?php

require "template/database.php";

// étape 1 : PREPARATION

$requete = $database->prepare("SELECT * FROM tweets");
$requete1 = $database->prepare("SELECT * FROM utilisateurs");

// étape 2 : EXECUTION 

$requete->execute();
$requete1->execute();


// étape 3 - ON EN FAIT QLQ CHOSE 


$allCourses = $requete->fetchALL(PDO::FETCH_ASSOC);
$allCourses1 = $requete1->fetchALL(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/css2?family=Poller+One&display=swap" rel="stylesheet">
            <title> TWITTER </title>
            <link rel="stylesheet" href="style.css">
        </head>

<body>

    <?php require "template/barre_navigation.php"; ?>

    <main> 

        <form class="form" method="POST" action="insert_formulaire.php"> 
            <input type="text" name="nom" placeholder="nom" required>
            <input type="text" name="pseudo" placeholder="pseudo">
            <input type="text" name="mail" placeholder="mail">
            <input type="text" name="mot de passe" placeholder="mot de passe">
            <button type="submit">SEND</button>
        </form>

        <form class="form" method="POST" action="insert_tweets.php"> 
            <input type="text" name="contenu" placeholder="tweet" required>
            <button type="submit">SEND</button>
        </form>

    <?php foreach($allCourses as $tweets) { ?>
            <ul>
                <li><?= $tweets['contenu'] ?></li>
                    <form action="delete.php" method="POST">
                        <input type="hidden" name="supp" value="<?=$tweets['id']?>">
                        <button type="submit">DELETE</button>
                    </form>
                </li>
            </ul>
        <?php } ?>

    </main>

</body>
    </html>