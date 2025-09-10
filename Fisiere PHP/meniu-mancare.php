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
	      Meniu
	  </title>
	  <link rel="stylesheet" href="../Fisiere CSS/style-meniu-mancare.css">
      <link rel="stylesheet" href="../Fisiere CSS/style-meniu.css">
      <link rel="stylesheet" href="../Fisiere CSS/style-footer.css">
	 
	</head>';

echo ' <body> ';

include 'meniu-navigare.php';


echo '

<div class="main">
    <br><br><br><br><br>
    
    <div class="imagine-container">
        <img src="../Images/meniu2.jpg" alt="Imagine meniu" class="imagine-larga">
        <div class="text-peste-imagine">MENIU</div>
    </div>

    <br><br><br><br><hr>
</div>

<br><br>

<h2>În fiecare zi de Luni până Vineri pregătim Meniul Zilei la prețul de doar 32 de lei!</h2>
<h2>Primim comenzi telefonice la numărul de telefon 0747 232 569.</h2>

<br><br>';


$sql1 = "SELECT nume_preparat, descriere, gramaj, pret FROM meniu WHERE categorie='ciorbe'";

if($result = mysqli_query($conn, $sql1)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='tabel-meniu'>";
            echo "<tr>";
                echo "<th>Ciorbe / Supe</th>";
                echo "<th>Ingrediente</th>";
                echo "<th>Gramaj</th>";
                echo "<th>Preț</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['nume_preparat'] . "</td>";
                echo "<td>" . $row['descriere'] . "</td>";
                echo "<td>" . $row['gramaj'] . " g" . "</td>";
                echo "<td>" . $row['pret'] . " lei" . "</td>";
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

echo '<br><br>';

$sql2 = "SELECT nume_preparat, descriere, gramaj, pret FROM meniu WHERE categorie='garnituri'";

if($result = mysqli_query($conn, $sql2)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='tabel-meniu'>";
            echo "<tr>";
                echo "<th>Garnituri</th>";
                echo "<th>Ingrediente</th>";
                echo "<th>Gramaj</th>";
                echo "<th>Preț</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['nume_preparat'] . "</td>";
                echo "<td>" . $row['descriere'] . "</td>";
                echo "<td>" . $row['gramaj'] . " g" . "</td>";
                echo "<td>" . $row['pret'] . " lei" . "</td>";
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

echo '<br><br>';

$sql3 = "SELECT nume_preparat, descriere, gramaj, pret FROM meniu WHERE categorie='aperitive'";

if($result = mysqli_query($conn, $sql3)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='tabel-meniu'>";
            echo "<tr>";
                echo "<th>Aperitive</th>";
                echo "<th>Ingrediente</th>";
                echo "<th>Gramaj</th>";
                echo "<th>Preț</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['nume_preparat'] . "</td>";
                echo "<td>" . $row['descriere'] . "</td>";
                echo "<td>" . $row['gramaj'] . " g" . "</td>";
                echo "<td>" . $row['pret'] . " lei" . "</td>";
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

echo '<br><br>';

$sql4 = "SELECT nume_preparat, descriere, gramaj, pret FROM meniu WHERE categorie='gratar'";

if($result = mysqli_query($conn, $sql4)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='tabel-meniu'>";
            echo "<tr>";
                echo "<th>Grătar</th>";
                echo "<th>Ingrediente</th>";
                echo "<th>Gramaj</th>";
                echo "<th>Preț</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['nume_preparat'] . "</td>";
                echo "<td>" . $row['descriere'] . "</td>";
                echo "<td>" . $row['gramaj'] . " g" . "</td>";
                echo "<td>" . $row['pret'] . " lei" . "</td>";
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

echo '<br><br>';

$sql5 = "SELECT nume_preparat, descriere, gramaj, pret FROM meniu WHERE categorie='preparate pui'";

if($result = mysqli_query($conn, $sql5)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='tabel-meniu'>";
            echo "<tr>";
                echo "<th>Preparate Pui</th>";
                echo "<th>Ingrediente</th>";
                echo "<th>Gramaj</th>";
                echo "<th>Preț</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['nume_preparat'] . "</td>";
                echo "<td>" . $row['descriere'] . "</td>";
                echo "<td>" . $row['gramaj'] . " g" . "</td>";
                echo "<td>" . $row['pret'] . " lei" . "</td>";
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

echo '<br><br>';

$sql6 = "SELECT nume_preparat, descriere, gramaj, pret FROM meniu WHERE categorie='salate aperitiv'";

if($result = mysqli_query($conn, $sql6)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='tabel-meniu'>";
            echo "<tr>";
                echo "<th>Salate Aperitiv</th>";
                echo "<th>Ingrediente</th>";
                echo "<th>Gramaj</th>";
                echo "<th>Preț</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['nume_preparat'] . "</td>";
                echo "<td>" . $row['descriere'] . "</td>";
                echo "<td>" . $row['gramaj'] . " g" . "</td>";
                echo "<td>" . $row['pret'] . " lei" . "</td>";
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

echo '<br><br>';

$sql7 = "SELECT nume_preparat, descriere, gramaj, pret FROM meniu WHERE categorie='salate'";

if($result = mysqli_query($conn, $sql7)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='tabel-meniu'>";
            echo "<tr>";
                echo "<th>Salate</th>";
                echo "<th>Ingrediente</th>";
                echo "<th>Gramaj</th>";
                echo "<th>Preț</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['nume_preparat'] . "</td>";
                echo "<td>" . $row['descriere'] . "</td>";
                echo "<td>" . $row['gramaj'] . " g" . "</td>";
                echo "<td>" . $row['pret'] . " lei" . "</td>";
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

echo '<br><br>';

$sql8 = "SELECT nume_preparat, descriere, gramaj, pret FROM meniu WHERE categorie='paste'";

if($result = mysqli_query($conn, $sql8)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='tabel-meniu'>";
            echo "<tr>";
                echo "<th>Paste</th>";
                echo "<th>Ingrediente</th>";
                echo "<th>Gramaj</th>";
                echo "<th>Preț</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['nume_preparat'] . "</td>";
                echo "<td>" . $row['descriere'] . "</td>";
                echo "<td>" . $row['gramaj'] . " g" . "</td>";
                echo "<td>" . $row['pret'] . " lei" . "</td>";
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

echo '<br><br>';

$sql9 = "SELECT nume_preparat, descriere, gramaj, pret FROM meniu WHERE categorie='desert'";

if($result = mysqli_query($conn, $sql9)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='tabel-meniu'>";
            echo "<tr>";
                echo "<th>Desert</th>";
                echo "<th>Ingrediente</th>";
                echo "<th>Gramaj</th>";
                echo "<th>Preț</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['nume_preparat'] . "</td>";
                echo "<td>" . $row['descriere'] . "</td>";
                echo "<td>" . $row['gramaj'] . " g" . "</td>";
                echo "<td>" . $row['pret'] . " lei" . "</td>";
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

echo '<br><br>


<h2 class="urare">Vă dorim poftă bună!</h2>

<br>';

include 'footer.php';

echo '

</body>
</html>';
}
?>