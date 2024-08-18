<?php

// Connexion à la base de données
$username = "root";
$password = ""; // Ou "" sous Windows
$database = new PDO("mysql:host=localhost;dbname=jour09", $username, $password);


// Requête SQL pour récupérer les étudiants de sexe féminin

$sql = "SELECT prenom, nom, naissance FROM etudiants WHERE sexe = 'Femme'";

// Exécuter la requête requêtes de type SELECT
// $query est une variable qui stocke le résultat de l'exécution de la méthode query()
$query = $database->query($sql);

   
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau job3</title>
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
            background-color: pink;
        }
    </style>
</head>
<body>
    <h2>Job 03 Jour 10</h2>
    <table>
               <!-- En-tête du tableau -->
                


                </div>
        <thead>
            <tr>
                
                <th>Prenom</th>
                <th>Nom</th>
                <th>naissance</th>
               
            </tr>
        </thead>
               <!-- Corps du tableau -->
        <body>// Vérifier si la requête a retourné des résultats
            <?php if ($query && $query->rowCount() > 0) {
             while ($row = $query->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                
                <td><?php echo ($row['prenom']); ?></td>
                <td><?php echo ($row['nom']); ?></td>
                <td><?php echo ($row['naissance']); ?></td>
                
            </tr>
            <?php endwhile; ?>
            <?php }else {
    // La requête a échoué ou n'a retourné aucun résultat
    echo "Aucune étudiante trouvée.";
} ?>
        </tbody>
    </table>
</body>
           
</html>
