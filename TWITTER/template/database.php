<?php 

try { 
    $database = new PDO ( 
        "mysql:host=localhost;dbname=twitterphp", 
        "root",
        ""
    );
    
} catch(PDOxception $error) {
    die($error);
}
