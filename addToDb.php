<?php
require_once('./connect.php');

if(isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $ville = isset($_POST['ville']) ? $_POST['ville'] : '';
    $bas = isset($_POST['bas']) ? $_POST['bas'] : '';
    $haut = isset($_POST['haut']) ? $_POST['haut'] : '';
    
    // Vérifier si les champs ne sont pas vides
    if (!empty($ville) && !empty($bas) && !empty($haut)) {
        // Préparer la requête d'insertion
        $query = $bdd->prepare('INSERT INTO meteo (ville, bas, haut) VALUES (:ville, :bas, :haut)');

        // Exécuter la requête avec les données du formulaire
        $query->execute(array(':ville' => $ville, ':bas' => $bas, ':haut' => $haut));

        // Redirection vers la page principale après l'ajout
        header("Location: index.php");
        exit();

    } else {
        echo "Veuillez remplir tous les champs du formulaire.";
    }
}
?>

