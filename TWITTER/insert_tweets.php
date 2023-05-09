<h1> TWEETS</h1>

<ul>
    <li>
        <?= $_POST['contenu']?>
    </li>

</ul>

<?php 

require 'template/database.php';
$insert = $database->prepare("INSERT INTO tweets(contenu)VALUES (:contenus)");



$insert->execute (
    [
        "contenus" => $_POST['contenu']
    ]
);

header ("Location: twitter.php" );