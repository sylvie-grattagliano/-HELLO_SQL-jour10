<?php
// Connexion à la base de données
try {
    $username = "root";  
    $password = "";      
    $database = new PDO("mysql:host=localhost;dbname=jour09", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}

//prepare requete simple // Exécuter la requêtes de type SELECT SUM AS FROM

$query = $database->query("SELECT SUM(capacite) AS capacite_totale FROM salles");

// Récupérer le résultat
$resultat = $query->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job08 Jour 10</title>
</head>
<style>
        /
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
<h2 style="text-align: center;">Capacité Totale des Salles</h2>
<!--condition vérifie si $resultat n'est pas vide et si la clé 'capacite_totale' existe dans le tableau $resultat-->
<?php if ($resultat && isset($resultat['capacite_totale'])): ?>
<body>
<table>
            <thead>
                <tr>
                    <th>Capacité Totale </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td><?php echo htmlspecialchars($resultat['capacite_totale']); ?></td>
                </tr>
            </tbody>
        </table>
    <?php else: ?>
        <p style="text-align: center;">Aucune donnée trouvée.</p>
    <?php endif; ?>
</body>
</html>