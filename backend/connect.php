<?php
try
 {
    $pdo = new PDO('mysql:host=localhost;dbname=sports_poll','root', '');
   
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

  ?>