<?php

    $username = "root";
    $password = ""; // Ou "" sous Windows
    $database = new PDO("mysql:host=localhost;dbname=jour09", $username, $password);

    $query = $database->query("SELECT * FROM etudiants");// requete SIMPLE

    

    
    /*while($line = $query->fetch()) {
        echo "<br/> <br/> ";
        

       echo "L'utilisateur n°" . $line["id"]; 
       echo $line["prenom"];"<br/>";
       echo $line["nom"];"<br/>";
       echo $line["naissance"];"<br/>";
       echo $line["sexe"];"<br/>";
       echo " avec l'adresse email " . $line["email"];"<br/>";

     
    }
       */

$sql = "SELECT id, prenom, nom, naissance, sexe, email FROM etudiants";

//$sql : C'est une variable PHP qui contient une chaîne de caractères a mettre dans mon tableau 
//$query = $pdo->query($sql);
?>



       <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau  Jour 10</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
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
    <h2>Tableau des données</h2>
    <table>
               
        <thead>
            <tr>
                <th>ID</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Date de Naissance</th>
                <th>Sexe</th>
                <th>Email</th>
            </tr>
        </thead>
               
        <body>
            <?php while ($line = $query->fetch()): ?>
            <tr>
                <td><?php echo ($line['id']); ?></td>
                <td><?php echo ($line['prenom']); ?></td>
                <td><?php echo ($line['nom']); ?></td>
                <td><?php echo ($line['naissance']); ?></td>
                <td><?php echo ($line['sexe']); ?></td>
                <td><?php echo ($line['email']); ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>

   
</html>