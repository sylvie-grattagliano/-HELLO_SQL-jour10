<?php

    $username = "root";
    $password = ""; // Ou "" sous Windows
    $database = new PDO("mysql:host=localhost;dbname=jour09", $username, $password);
// execute la requete
    $query = $database->query("SELECT nom,capacite  FROM salles");

    
    
    //$query = $pdo->query($sql);

$sql = "SELECT  nom, capacite FROM salles";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau  JOB 02</title>
    <style>
        /*bordures des cellules voisines ne sont pas doublées ou séparées,
         mais se combinent pour former une bordure unique là où elles se rencontrent.*/

        table {
            border-collapse: collapse;
            width: 50%;
         
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: gray;
        }
    </style>
</head>
<body>
    <h2>Tableau des données Job 02</h2>
    <table>
               <!-- En-tête du tableau -->
                


                </div>
        <thead>
            <tr>
                
                
                <th>Nom</th>
                <th>capacite</th>
               
            </tr>
        </thead>
               <!-- Corps du tableau -->
        <body>
            <?php while ($line = $query->fetch()): ?>
            <tr>
                
                <td><?php echo ($line['nom']); ?></td>
                <td><?php echo ($line['capacite']); ?></td>
                
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>

   
