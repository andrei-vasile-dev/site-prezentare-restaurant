<?php
session_start();

function redirect($url) {
    header('Location: '.$url);
    die();
}

if (!$_SESSION['sunt_logat']) {
    redirect('login.php');
}

else
{

include 'conectarebd.php';

echo '
	<!DOCTYPE html>
	<html>
	<head>
	  <title>
	      Recenzii
	  </title>
	  <link rel="stylesheet" href="../Fisiere CSS/style-vezi-recenzii.css">
      <link rel="stylesheet" href="../Fisiere CSS/style-meniu.css">
      <link rel="stylesheet" href="../Fisiere CSS/style-footer.css">
	 
	</head>';

echo ' <body> ';

include 'meniu-navigare.php';


echo '

<div class="main">
    <br><br><br><br><br>
    
    <div class="imagine-container">
        <img src="../Images/restaurant3.jpg" alt="Imagine restaurant" class="imagine-larga">
        <div class="text-peste-imagine">RECENZII</div>
    </div>

    <br><br><br><br><hr>
</div>

<br><br>';

include 'conectarebd.php';

echo '

<div class = "intro">
<h2>Dacă v-a plăcut experiența pe care ați avut-o la restaurantul nostru, ne-ar ajuta dacă ați lăsa o recenzie. Vă mulțumim!</h2>
<br><br><a href="creeaza-recenzie.php" class="myButton">Adauga recenzie</a>
<br><br><br><br>
<h1>Alte recenzii ale clienților:</h1>
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

            if ($row['id_utilizator'] == $_SESSION['id_utilizator']) {
                echo "
                    <td>
                        <a href='editrecenzii.php?id_recenzie=" . $row['id_recenzie'] . "' class='link-recenzii'>Editează</a> | 
                        <a href='deleterecenzii.php?id_recenzie=" . $row['id_recenzie'] . "' class='link-recenzii' 
                            onclick='return confirm(\"Sigur doriți să ștergeți recenzia pe care ați adăugat-o?\")'>Șterge</a>
                    </td>";
            } else {
                echo "<td>Nu este cazul</td>";
            }

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
<div class = "sfarsit">
<h3>Notă: Nu puteți edita / șterge decât recenziile adăugate de dumneavoastră!</h3>
</div>
<br><br><br>';

include 'footer.php';

echo '

</body>
</html>';

}


?>