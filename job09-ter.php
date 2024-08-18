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

// Exécute la requête pour sélectionner les salles triées par capacité décroissante
$query = $database->query("SELECT * FROM salles ORDER BY capacite DESC");



// Vérifier si la requête a retourné des résultats:

if ($query->rowCount() > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nom</th><th>Étage</th><th>Capacité</th></tr>";

    // Utiliser la boucle while pour itérer sur chaque enregistrement while est utilise avec fetch et non fetchAll
    while ($salle = $query->fetch()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($salle['id']) . "</td>";
        echo "<td>" . htmlspecialchars($salle['nom']) . "</td>";
        echo "<td>" . htmlspecialchars($salle['etage']) . "</td>";
        echo "<td>" . htmlspecialchars($salle['capacite']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Aucune salle trouvée dans la base de données.";
}