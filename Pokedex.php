<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel='stylesheet' href="Pokedex.css">
    <title>Pokedex</title>
   
</head>

<header> 

<h1> POKEDEX </h1>

</header>

<body>
    

<h2>Voici vos données enregistrer dans le pokedex</h2><br>

<h3> Starter kalos </h3>

<img src="Pokeball.jpeg" id='Pokeball'>

<p> 
<br><br><br><br>
</p>

<?php
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=pokedex', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare
        (
        '   SELECT Nom_pokemon,Numero,type,genre
            FROM illumis
            JOIN type
            ON illumis.id_type = type.id
            JOIN genre 
            ON illumis.id_genre = genre.id
            
        '
        );

        $stmt->execute();

        echo '<center>';
        echo '<style>';
        echo 'table { width: 1500px; ; text-align: center; }'; 
        echo 'td { width: 900px; }';     
        echo '</style>';
        
        echo "<table border='4'> 
            <th>Image</th>
            <th>Nom du Pokemon</th>
            <th>Numéro Pokedex</th>
            <th>Type</th>
            <th>Genre</th>
        </tr>";

        
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<center>';
    echo '<tr>';
    echo "<td><img src='Pokemon/{$row['Nom_pokemon']}.png' alt='{$row['Nom_pokemon']}'style='width: 100px; height: auto;'></td>";
    echo "<td>{$row['Nom_pokemon']}</td>";
    echo "<td>{$row['Numero']}</td>";
    echo "<td>{$row['type']}</td>";
    echo "<td>{$row['genre']}</td>";
    echo '</tr>';
}
echo "</table>";
} catch (PDOException $e) {
echo 'Erreur de connexion : ' . $e->getMessage();
}
    ?>


<p> 
<br><br><br><br><br><br>
</p>




</body>

<footer> 
    
<h1> Region Kalos </h1>

</footer> 

</html>


