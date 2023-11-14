<?php
require_once('./connect.php');


if(isset($_POST["deleteVille"]) && isset($_POST["checkbox"])){
    $deleteVilles= $_POST["checkbox"];

    foreach($deleteVilles as $deleteVille){
        $delete='DELETE FROM meteo WHERE ville = "'.$deleteVille.'"';

        // on execute la requête
        $nb = $bdd->exec($delete);
    }

    // Redirection vers la page principale après l'ajout
    header("Location: index.php");
    exit();
}
?>
