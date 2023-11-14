<?php
try {
$bdd = new PDO('mysql:host=localhost;dbname=weatherapp', 'root');

} catch (PDOException $e) {
print "Erreur !: connexion échouée " . $e->getMessage();
die();
}?>
