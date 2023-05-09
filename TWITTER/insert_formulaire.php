<h1>Formulaire</h1>

<ul>

    <li>
        <?= $_POST['nom']?>
    </li>

    <li>
        <?= $_POST['pseudo']?>
    </li>

    <li>
        <?= $_POST['mail']?>
    </li>

    <li>
        <?= $_POST['mp']?>
    </li>

    <li>
        <img src="https://fastly.picsum.photos/id/2/5000/3333.jpg?hmac=_KDkqQVttXw_nM-RyJfLImIbafFrqLsuGO5YuHqD-qQ" alt="photo">
    </li>

</ul>

<?php 

require 'template/database.php';
$insert = $database->prepare("INSERT INTO utilisateurs (nom, pseudo, mail, mp, photo) VALUES (:blaze, :user, :gmail, :mdp, :pics)");

//Pour twitter il y aura qu'une seule valeur. 

$insert->execute(
    [
        ":blaze" => $_POST['nom'],
        ":user" => $_POST['pseudo'],
        ":gmail" => $_POST['mail'],
        ":mdp" => $_POST['mp'],
        ":pics" => "https://fastly.picsum.photos/id/2/5000/3333.jpg?hmac=_KDkqQVttXw_nM-RyJfLImIbafFrqLsuGO5YuHqD-qQ",
    ]

);

