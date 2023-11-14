<?php
require_once('./connect.php');
require_once('./addToDb.php');
require_once('./delete.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>weatherapp</title>
    <style>

        *{
            margin: auto;
            text-align: center;
            padding: 15px
        }
        table {
            border-collapse: collapse;
            width: 50%;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>
    <header>
        <h1>Weather App</h1>
    </header>

    <form method="post" action="delete.php" >
        <?php
        echo '<table>
        <tr>
            <th>Ville</th>
            <th>Haut</th>
            <th>Bas</th>
        </tr>';

    foreach ($bdd->query('SELECT * from meteo') as $row) {
        // Pour chaque enregistrement, afficher une ligne de données
        echo 
        '<tr>
        <td>' . $row["ville"] . '</td>
        <td>' . $row["haut"] . '</td>
        <td>' . $row["bas"] . '</td>
        <td> <input type= "checkbox" name="checkbox[]" value="'. $row["ville"] .'"></td>
        </tr>';
    }

    // Fin de la table
    echo '</table>';

    // Fermeture de la connexion à la base de données
        $bdd = null;
        ?>
        <input type="submit" name="deleteVille" value="Supprimer les villes sélectionées">
    </form>

    <h2>Toi aussi partage ta météo locale ! </h2>
    
    <form method="post" action="">
        <label for="city">Ville:</label>
        <input id="city" type="text" name="ville"> <!-- ajouter l'attibut name afin de pouvoir recup les info du formulaire coté serveur-->
        <label for="min">Bas</label>
        <input id="min" type="number" name="bas">
        <label for="max">Haut</label>
        <input id="max" type="number" name="haut">
        <input type="submit" name="submit">
    </form>

    
</body>

</html>
