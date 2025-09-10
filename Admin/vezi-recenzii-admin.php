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
	      Recenzii
	  </title>
	  <link rel="stylesheet" href="style-vezi-recenzii-admin.css">
      <link rel="stylesheet" href="style-meniu-navigare-admin.css">

	 
	</head>';

echo ' <body> ';

include 'meniu-navigare-admin.php';

echo '

<br><br><br><br><br><br>


<div class = "intro">
<h2>PAGINĂ DE VIZUALIZARE ȘI STERGERE A RECENZIILOR</h2>
<h3>Nu puteți să editați sau să adăugați recenzii.</h3>
<br>
</div>';

$sql1 = "
    SELECT 
        r.id_recenzie, 
        r.id_utilizator, 
        r.nota_recenzie, 
        r.comentariu_recenzie, 
        r.data_recenzie, 
        u.nume, 
        u.prenume 
    FROM recenzii r
    JOIN utilizatori u ON r.id_utilizator = u.id_utilizator";

if ($result = mysqli_query($conn, $sql1)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table class='tabel-recenzii'>";
        echo "<tr>";
        echo "<th class='hidden'>Id Recenzie</th>";
        echo "<th class='hidden'>Id Utilizator</th>";
        echo "<th>Nume Utilizator</th>";
        echo "<th>Nota</th>";
        echo "<th>Comentarii</th>";
        echo "<th>Data</th>";
        echo "<th>Acțiuni</th>";
        echo "</tr>";

        while ($row = mysqli_fetch_array($result)) {
            $nume_si_prenume_utilizator = $row['nume'] . " " . $row['prenume'];

            echo "<tr>";
            echo "<td class='hidden'>" . $row['id_recenzie'] . "</td>";
            echo "<td class='hidden'>" . $row['id_utilizator'] . "</td>";
            echo "<td>" . $nume_si_prenume_utilizator . "</td>";
            echo "<td>" . $row['nota_recenzie'] . " / 10" . "</td>";
            echo "<td class='comentarii'>" . $row['comentariu_recenzie'] . "</td>";
            echo "<td>" . date('Y-m-d', strtotime($row['data_recenzie'])) . "</td>";
            echo "
                <td> 
                    <a href='deleterecenzii-admin.php?id_recenzie=" . $row['id_recenzie'] . "' class='link-recenzii' 
                         onclick='return confirm(\"Sigur doriți să ștergeți această recenzie?\")'>Șterge</a>
                </td>";

            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
    } else {
        echo "Nu au fost găsite rezultate.";
    }
} else {
    echo "ERROR: Could not execute $sql1. " . mysqli_error($conn);
}


echo '

<br><br><br><br><br><br><br><br><br>
</body>
</html>';


?>