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

// Requête SQL pour récupérer superficie salles
$query = $database->query("SELECT SUM(superficie) AS superficie_totale FROM etages");

// Récupération du résultat
$result = $query->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job 07 Jour 10</title>
</head>
<style>
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid black;
            text-align: center;
        }
        th {
            background-color: aqua;
        }
    </style>
</head>
<body>
<h1> Job 07 Jour 10 <h1>
<h2 style="text-align: center;">superficie totale des étages</h2>

<table>
    <thead>
        <tr>
            <th>superficie_totale </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo htmlspecialchars($result['superficie_totale']); ?></td>
        </tr>
    </tbody>
</table>


    
</body>
</html>