

<? php

// methode sans html

// Connexion à la base de données
// Connexion à la base de données
$username = "root";
$password = ""; // Ou "" sous Windows
$database = new PDO("mysql:host=localhost;dbname=jour09", $username, $password);


// Requête SQL
$sql = "SELECT prenom, nom, naissance FROM etudiants WHERE sexe = 'Femme'";

// Exécuter la requête SQL
$query = $database->query($sql);

// Vérifier si la requête a retourné des résultats
if ($query) {
    // Boucle pour parcourir les résultats
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        echo $row['prenom'] . " " . $row['nom'] . " né(e) le " . $row['naissance'] . "<br>";
    }
} else {
    echo "Aucun résultat trouvé.";
}
?>

