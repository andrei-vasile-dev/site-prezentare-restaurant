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
	      Rezervari
	  </title>
	  <link rel="stylesheet" href="../Fisiere CSS/style-vezi-rezervari.css">
      <link rel="stylesheet" href="../Fisiere CSS/style-meniu.css">
      <link rel="stylesheet" href="../Fisiere CSS/style-footer.css">
	 
	</head>';

echo ' <body> ';

include 'meniu-navigare.php';


echo '

<div class="main">
    <br><br><br><br><br>
    
    <div class="imagine-container">
        <img src="../Images/restaurant1.jpg" alt="Imagine restaurant" class="imagine-larga">
        <div class="text-peste-imagine">REZERĂRI</div>
    </div>

    <br><br><br><br><hr>
</div>

<br><br>';

include 'conectarebd.php';

echo '

<div class = "intro">
<h2>Doriți să ne faceți o vizită? Puteți adăuga o rezervare și noi vom știi să vă așteptăm.</h2>
<h2>Rezervările se pot face în toate zilele săptămanii, mai puțin Sâmbăta când nu avem program, în intervalul de timp
11:00 - 21:00. </h2>
<br><br><a href="rezervare-masa.php" class="myButton">Fă o rezervare</a>
<br><br><br><br>
<h1>Alte rezervări ale clienților:</h1>
</div>';

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

                if($row['id_utilizator'] == $_SESSION['id_utilizator']){
                    echo "
                    <td>
                        <a href='editrezervari.php?id_rezervare=". $row['id_rezervare'] . "' class='link-rezervari'>Editează</a> | 
                        <a href='deleterezervari.php?id_rezervare=". $row['id_rezervare'] . "' class='link-rezervari' 
                                 onclick='return confirm(\"Sigur doriți să ștergeți rezervarea pe care ați făcut-o?\")'>Șterge</a>

                    </td>";}
                else {
                    echo "<td>" . "Nu este cazul" . "</td>";}

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

echo '
<div class = "sfarsit">
<h3>Notă: Nu puteți edita / șterge decât rezervările făcute de dumneavoastră!</h3>
</div>
<br><br><br>';

include 'footer.php';

echo '

</body>
</html>';

}


?>