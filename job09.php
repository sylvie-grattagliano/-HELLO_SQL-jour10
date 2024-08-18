<?php
// Connexion à la base de données
try {
    $username = "root";  // Remplacez par vos informations de connexion
    $password = "";      // Remplacez par vos informations de connexion
    $database = new PDO("mysql:host=localhost;dbname=jour09", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}

//prepare requete simple // Exécuter la requêtes de type SELECT
$query=$database->query ("SELECT * FROM salles ORDER BY capacite DESC");


// Récupérer tous les résultats
$resultats = $query->fetchAll();
?>

<!--Vérifier si la requête a retourné des résultats-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job09 Jour10</title>
</head>
<body>
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
            background-color: aqua;
        }
    </style>
</head>
<body>
    
        <h2>Liste des salles triées par capacité décroissante</h2>

<?php if (!empty($resultats )): ?>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Nom</th>
                <th>Étage</th>
                <th>Capacité</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultats  as $salle): ?>
                <tr>
                    <td><?php echo htmlspecialchars($salle['id']); ?></td>
                    <td><?php echo htmlspecialchars($salle['nom']); ?></td>
                    <td><?php echo htmlspecialchars($salle['etage']); ?></td>
                    <td><?php echo htmlspecialchars($salle['capacite']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucune salle trouvée dans la base de données.</p>
<?php endif; ?>
</body>
</html>

   

    
</body>
</html>


