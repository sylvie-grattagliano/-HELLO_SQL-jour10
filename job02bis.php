<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALLES avec BOUCLE FOREACH</title>
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
            background-color: greenyellow;
        }
    </style>
</head>
<body>
    <?php
    $username = "root";
    $password = ""; // Ou "" sous Windows
    $database = new PDO("mysql:host=localhost;dbname=jour09", $username, $password);

    $query = $database->query("SELECT * FROM salles");
    $resultats = $query->fetchAll();
    ?>
    <table>
<thead>
    <tr>
        <th>nom</th>
        <th>capacite</th>
    </tr>

</thead>

<tbody>

<!--boucle -->

<?php foreach ($resultats as $champs) { ?>
    <tr>
        <td><?php echo $champs["nom"]; ?></td>
        <td><?php echo $champs["capacite"]; ?></td>
    </tr>
<?php  }
?>



    




</tbody>



    </table>

</body>
</html>