<?php

// Connexion à la base de données
$username = "root";
$password = ""; // Ou "" sous Windows
$database = new PDO("mysql:host=localhost;dbname=jour09", $username, $password);


/// Requête SQL pour récupérer les étudiants qui ont moins de 18 ans
// Requête SQL pour récupérer les étudiants ayant moins de 18 ans
    $sql = "
    SELECT *, 
    TIMESTAMPDIFF(YEAR, naissance, CURDATE()) AS age 
    FROM etudiants 
    HAVING age < 18";

    /*TIMESTAMPDIFF(YEAR, naissance, CURDATE()) AS age :

TIMESTAMPDIFF : C'est une fonction MySQL qui calcule la différence entre deux dates. En l'occurrence, elle calcule la différence en années.
YEAR : Indique que la différence doit être calculée en années.
naissance : La colonne contenant la date de naissance de l'étudiant.
CURDATE() : Fonction MySQL qui retourne la date actuelle.
AS age : Renomme le résultat de la fonction TIMESTAMPDIFF en age. Cela permet de référencer cette colonne calculée sous le nom age dans la clause HAVING.


// Exécuter la requête de type SELECT
// $query est une variable qui stocke le résultat de l'exécution de la méthode query()
$query = $database->query($sql);*/

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau job5</title>
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
    <h2>Job 05 Jour 10</h2>
    <table>
               <!-- En-tête du tableau -->
                


                </div>
        <thead>
            <tr>
                
                <th>Prenom</th>
                <th>Nom</th>
                <th>naissance</th>
                <th>sexe</th>
                <th>email</th>

               
            </tr>
        </thead>
               <!-- Corps du tableau -->
        <body>
            <?php // Vérifier si la requête a retourné des résultats
if ($query && $query->rowCount() > 0) {
    while ($row = $query->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                
                <td><?php echo ($row['prenom']); ?></td>
                <td><?php echo ($row['nom']); ?></td>
                <td><?php echo ($row['naissance']); ?></td>
                <td><?php echo ($row['sexe']); ?></td>
                <td><?php echo ($row['email']); ?></td>
                
            </tr>
            <?php endwhile; ?>
            <?php }else {
    // La requête a échoué ou n'a retourné aucun résultat
    echo "Aucun étudiant de moins de 18 ans n'a été trouvé.";
} ?>
        </tbody>
    </table>
</html>

