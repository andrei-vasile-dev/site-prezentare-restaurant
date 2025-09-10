<?php
session_start();

function redirect($url) {
    header('Location: '.$url);
    die();
}

include '../Fisiere PHP/conectarebd.php';

echo '
	<!DOCTYPE html>
	<html>
	<head>
	  <title>
	      Rezervari
	  </title>
	  <link rel="stylesheet" href="style-vezi-rezervari-admin.css">
	  <link rel="stylesheet" href="style-meniu-navigare-admin.css">
	</head>';

echo ' <body> ';

include 'meniu-navigare-admin.php';


echo '

<br><br><br><br><br><br>


<div class = "intro">
<h2>PAGINĂ DE VIZUALIZARE ȘI EDITARE A REZERVĂRILOR</h2>
<br>
<a href="rezervare-masa-admin.php" class="myButton">ADAUGĂ REZERVARE</a>
</div>

<br><br><br>';

$sql1 = "SELECT id_rezervare, id_utilizator, numar_persoane, data, ora, loc, comentarii FROM rezervari";

if($result = mysqli_query($conn, $sql1)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='tabel-rezervari'>";
            echo "<tr>";
                echo "<th class='hidden'>Id Rezervare</th>";
                echo "<th class='hidden'>Id Utilizator</th>";
                echo "<th>Număr Persoane</th>";
                echo "<th>Data</th>";
                echo "<th>Ora</th>";
                echo "<th>Loc</th>";
                echo "<th>Comentarii</th>";
                echo "<th>Acțiuni</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td class='hidden'>" . $row['id_rezervare'] . "</td>";
                echo "<td class='hidden'>" . $row['id_utilizator'] . "</td>";
                echo "<td>" . $row['numar_persoane'] . "</td>";
                echo "<td>" . $row['data'] .  "</td>";
                echo "<td>" . substr($row['ora'], 0, 5) . "</td>";
                echo "<td>" . $row['loc'] . "</td>";

                if ($row['comentarii'] == "") {
                    echo "<td class='comentarii'>" . "Nu sunt comentarii" . "</td>";}
                else {
                    echo "<td class='comentarii'>" . $row['comentarii'] . "</td>";}


                echo "
                <td> 
                    <a href='deleterezervari-admin.php?id_rezervare=". $row['id_rezervare'] . "' class='link-rezervari' 
                            onclick='return confirm(\"Sigur doriți să ștergeți rezervarea?\")'>Șterge</a>
                </td>";
                echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
    } else{
        echo "Nu au fost gasite rezultate.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

echo '<br><br><br>

</body>
</html>';


?>