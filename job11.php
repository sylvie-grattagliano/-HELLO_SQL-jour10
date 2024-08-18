<?php
//IMPOSSIBLE A FAIRE SEULE J AI DEMANDE DE L AIDE A DES FORUMS ET A IA ON DOIT FAIRE 2 REQUETES
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

// Requête pour récupérer toutes les informations des salles
$querySalles = $database->query("SELECT * FROM salles ORDER BY capacite DESC");
$salles = $querySalles->fetchAll();

// Requête pour calculer la capacité moyenne des salles
$queryMoyenne = $database->query("SELECT AVG(capacite) AS capacite_moyenne FROM salles");
$resultatMoyenne = $queryMoyenne->fetch();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations des Salles</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .average {
            font-weight: bold;
            background-color: aqua;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Informations des Salles</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Étage</th>
                <th>Capacité</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salles as $salle): ?>
                <tr>
                    <td><?php echo htmlspecialchars($salle['id']); ?></td>
                    <td><?php echo htmlspecialchars($salle['nom']); ?></td>
                    <td><?php echo htmlspecialchars($salle['etage']); ?></td>
                    <td><?php echo htmlspecialchars($salle['capacite']); ?></td>
                </tr>
            <?php endforeach; ?>
            <?php if ($resultatMoyenne): ?>
                <tr class="average">
                    <td colspan="3">Capacité Moyenne</td>
                    <td><?php echo htmlspecialchars(number_format($resultatMoyenne['capacite_moyenne'], 2)); ?></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
