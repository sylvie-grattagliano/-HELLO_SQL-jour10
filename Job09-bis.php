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

// Exécuter la requête pour sélectionner les salles triées par capacité décroissante
$query = $database->query("SELECT * FROM salles ORDER BY capacite DESC");

// Récupérer tous les résultats
$resultats = $query->fetchAll();


// Affichage en tableau HTML simple
//condition si la variable $resultats n'est pas vide. alors execute le tableau 
if (!empty($resultats)) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nom</th><th>Étage</th><th>Capacité</th></tr>";

    foreach ($resultats as $salle) {
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

//boucle qui permet d'itérer sur les résultats obtenus depuis la base de données. pour chaque salle
//$salle est une variable temporaire utilisée pour représenter chaque élément du tableau $resultats pendant chaque itération de la boucle.
/*À chaque passage dans la boucle, 
$salle contiendra les données d'une seule salle 
(un enregistrement) sous la forme d'un tableau associatif. 
Chaque clé du tableau représente un champ de la table (id, nom, etage, capacite).*/
?>
