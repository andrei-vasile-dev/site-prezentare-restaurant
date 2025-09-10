<?php
session_start();

include '../Fisiere PHP/conectarebd.php';

echo '
	<!DOCTYPE html>
	<html>
	<head>
	  <title>
	      Meniu Mancare Admin
	  </title>
	  <link rel="stylesheet" href="style-meniu-mancare-admin.css">
      <link rel="stylesheet" href="style-meniu-navigare-admin.css">
	</head>';

echo ' <body> ';

include 'meniu-navigare-admin.php';


echo '

<br><br>

<div class = "urare">
<h1>Bun venit, Admin!</h1>
<h2>PAGINĂ DE VIZUALIZARE ȘI EDITARE A MENIULUI</h2>
<a href="adauga-preparat-admin.php" class="myButton">ADAUGĂ PREPARAT</a>
</div>

<br><br>';


$sql1 = "SELECT id_preparat, nume_preparat, descriere, gramaj, pret FROM meniu WHERE categorie='ciorbe'";

if($result = mysqli_query($conn, $sql1)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='tabel-meniu'>";
            echo "<tr>";
                echo "<th class='hidden'>Id Preparat</th>";
                echo "<th>Ciorbe / Supe</th>";
                echo "<th>Ingrediente</th>";
                echo "<th>Gramaj</th>";
                echo "<th>Preț</th>";
                echo "<th class='actiuni'>Acțiuni</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td class='hidden'>" . $row['id_preparat'] . "</td>";
                echo "<td>" . $row['nume_preparat'] . "</td>";
                echo "<td>" . $row['descriere'] . "</td>";
                echo "<td>" . $row['gramaj'] . " g" . "</td>";
                echo "<td>" . $row['pret'] . " lei" . "</td>";
                echo "
                    <td class='actiuni'>
                        <a href='edit-meniu-admin.php?id_preparat=" . $row['id_preparat'] . "' class='link-meniu'>Editează</a> | 
                        <a href='delete-meniu-admin.php?id_preparat=" . $row['id_preparat'] . "' class='link-meniu' 
                            onclick='return confirm(\"Sigur doriți să ștergeți acest preparat?\")'>Șterge</a>
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

echo '<br><br>';

$sql2 = "SELECT id_preparat, nume_preparat, descriere, gramaj, pret FROM meniu WHERE categorie='garnituri'";

if($result = mysqli_query($conn, $sql2)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='tabel-meniu'>";
            echo "<tr>";
                echo "<th class='hidden'>Id Preparat</th>";
                echo "<th>Garinituri</th>";
                echo "<th class='ingrediente'>Ingrediente</th>";
                echo "<th>Gramaj</th>";
                echo "<th>Preț</th>";
                echo "<th class='actiuni'>Acțiuni</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td class='hidden'>" . $row['id_preparat'] . "</td>";
                echo "<td>" . $row['nume_preparat'] . "</td>";
                echo "<td class='ingrediente'>" . $row['descriere'] . "</td>";
                echo "<td>" . $row['gramaj'] . " g" . "</td>";
                echo "<td>" . $row['pret'] . " lei" . "</td>";
                echo "
                    <td class='actiuni'>
                        <a href='edit-meniu-admin.php?id_preparat=" . $row['id_preparat'] . "' class='link-meniu'>Editează</a> | 
                        <a href='delete-meniu-admin.php?id_preparat=" . $row['id_preparat'] . "' class='link-meniu' 
                            onclick='return confirm(\"Sigur doriți să ștergeți acest preparat?\")'>Șterge</a>
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

echo '<br><br>';

$sql3 = "SELECT id_preparat, nume_preparat, descriere, gramaj, pret FROM meniu WHERE categorie='aperitive'";

if($result = mysqli_query($conn, $sql3)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='tabel-meniu'>";
            echo "<tr>";
                echo "<th class='hidden'>Id Preparat</th>";
                echo "<th>Aperitive</th>";
                echo "<th class='ingrediente'>Ingrediente</th>";
                echo "<th>Gramaj</th>";
                echo "<th>Preț</th>";
                echo "<th class='actiuni'>Acțiuni</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td class='hidden'>" . $row['id_preparat'] . "</td>";
                echo "<td>" . $row['nume_preparat'] . "</td>";
                echo "<td class='ingrediente'>" . $row['descriere'] . "</td>";
                echo "<td>" . $row['gramaj'] . " g" . "</td>";
                echo "<td>" . $row['pret'] . " lei" . "</td>";
                echo "
                    <td class='actiuni'>
                        <a href='edit-meniu-admin.php?id_preparat=" . $row['id_preparat'] . "' class='link-meniu'>Editează</a> | 
                        <a href='delete-meniu-admin.php?id_preparat=" . $row['id_preparat'] . "' class='link-meniu' 
                            onclick='return confirm(\"Sigur doriți să ștergeți acest preparat?\")'>Șterge</a>
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

echo '<br><br>';

$sql4 = "SELECT id_preparat, nume_preparat, descriere, gramaj, pret FROM meniu WHERE categorie='gratar'";

if($result = mysqli_query($conn, $sql4)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='tabel-meniu'>";
            echo "<tr>";
                echo "<th class='hidden'>Id Preparat</th>";
                echo "<th>Grătar</th>";
                echo "<th class='ingrediente'>Ingrediente</th>";
                echo "<th>Gramaj</th>";
                echo "<th>Preț</th>";
                echo "<th class='actiuni'>Acțiuni</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td class='hidden'>" . $row['id_preparat'] . "</td>";
                echo "<td>" . $row['nume_preparat'] . "</td>";
                echo "<td class='ingrediente'>" . $row['descriere'] . "</td>";
                echo "<td>" . $row['gramaj'] . " g" . "</td>";
                echo "<td>" . $row['pret'] . " lei" . "</td>";
                echo "
                    <td class='actiuni'>
                        <a href='edit-meniu-admin.php?id_preparat=" . $row['id_preparat'] . "' class='link-meniu'>Editează</a> | 
                        <a href='delete-meniu-admin.php?id_preparat=" . $row['id_preparat'] . "' class='link-meniu' 
                            onclick='return confirm(\"Sigur doriți să ștergeți acest preparat?\")'>Șterge</a>
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

echo '<br><br>';

$sql5 = "SELECT id_preparat, nume_preparat, descriere, gramaj, pret FROM meniu WHERE categorie='preparate pui'";

if($result = mysqli_query($conn, $sql5)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='tabel-meniu'>";
            echo "<tr>";
                echo "<th class='hidden'>Id Preparat</th>";
                echo "<th>Preparate Pui</th>";
                echo "<th class='ingrediente'>Ingrediente</th>";
                echo "<th>Gramaj</th>";
                echo "<th>Preț</th>";
                echo "<th class='actiuni'>Acțiuni</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td class='hidden'>" . $row['id_preparat'] . "</td>";
                echo "<td>" . $row['nume_preparat'] . "</td>";
                echo "<td class='ingrediente'>" . $row['descriere'] . "</td>";
                echo "<td>" . $row['gramaj'] . " g" . "</td>";
                echo "<td>" . $row['pret'] . " lei" . "</td>";
                echo "
                    <td class='actiuni'>
                        <a href='edit-meniu-admin.php?id_preparat=" . $row['id_preparat'] . "' class='link-meniu'>Editează</a> | 
                        <a href='delete-meniu-admin.php?id_preparat=" . $row['id_preparat'] . "' class='link-meniu' 
                            onclick='return confirm(\"Sigur doriți să ștergeți acest preparat?\")'>Șterge</a>
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

echo '<br><br>';

$sql6 = "SELECT id_preparat, nume_preparat, descriere, gramaj, pret FROM meniu WHERE categorie='salate aperitiv'";

if($result = mysqli_query($conn, $sql6)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='tabel-meniu'>";
            echo "<tr>";
                echo "<th class='hidden'>Id Preparat</th>";
                echo "<th>Salate Aperitiv</th>";
                echo "<th class='ingrediente'>Ingrediente</th>";
                echo "<th>Gramaj</th>";
                echo "<th>Preț</th>";
                echo "<th class='actiuni'>Acțiuni</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td class='hidden'>" . $row['id_preparat'] . "</td>";
                echo "<td>" . $row['nume_preparat'] . "</td>";
                echo "<td class='ingrediente'>" . $row['descriere'] . "</td>";
                echo "<td>" . $row['gramaj'] . " g" . "</td>";
                echo "<td>" . $row['pret'] . " lei" . "</td>";
                echo "
                    <td class='actiuni'>
                        <a href='edit-meniu-admin.php?id_preparat=" . $row['id_preparat'] . "' class='link-meniu'>Editează</a> | 
                        <a href='delete-meniu-admin.php?id_preparat=" . $row['id_preparat'] . "' class='link-meniu' 
                            onclick='return confirm(\"Sigur doriți să ștergeți acest preparat?\")'>Șterge</a>
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

echo '<br><br>';

$sql7 = "SELECT id_preparat, nume_preparat, descriere, gramaj, pret FROM meniu WHERE categorie='salate'";

if($result = mysqli_query($conn, $sql7)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='tabel-meniu'>";
            echo "<tr>";
                echo "<th class='hidden'>Id Preparat</th>";
                echo "<th>Salate</th>";
                echo "<th class='ingrediente'>Ingrediente</th>";
                echo "<th>Gramaj</th>";
                echo "<th>Preț</th>";
                echo "<th class='actiuni'>Acțiuni</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td class='hidden'>" . $row['id_preparat'] . "</td>";
                echo "<td>" . $row['nume_preparat'] . "</td>";
                echo "<td class='ingrediente'>" . $row['descriere'] . "</td>";
                echo "<td>" . $row['gramaj'] . " g" . "</td>";
                echo "<td>" . $row['pret'] . " lei" . "</td>";
                echo "
                    <td class='actiuni'>
                        <a href='edit-meniu-admin.php?id_preparat=" . $row['id_preparat'] . "' class='link-meniu'>Editează</a> | 
                        <a href='delete-meniu-admin.php?id_preparat=" . $row['id_preparat'] . "' class='link-meniu' 
                            onclick='return confirm(\"Sigur doriți să ștergeți acest preparat?\")'>Șterge</a>
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

echo '<br><br>';

$sql8 = "SELECT id_preparat, nume_preparat, descriere, gramaj, pret FROM meniu WHERE categorie='paste'";

if($result = mysqli_query($conn, $sql8)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='tabel-meniu'>";
            echo "<tr>";
                echo "<th class='hidden'>Id Preparat</th>";
                echo "<th>Paste</th>";
                echo "<th class='ingrediente'>Ingrediente</th>";
                echo "<th>Gramaj</th>";
                echo "<th>Preț</th>";
                echo "<th class='actiuni'>Acțiuni</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td class='hidden'>" . $row['id_preparat'] . "</td>";
                echo "<td>" . $row['nume_preparat'] . "</td>";
                echo "<td class='ingrediente'>" . $row['descriere'] . "</td>";
                echo "<td>" . $row['gramaj'] . " g" . "</td>";
                echo "<td>" . $row['pret'] . " lei" . "</td>";
                echo "
                    <td class='actiuni'>
                        <a href='edit-meniu-admin.php?id_preparat=" . $row['id_preparat'] . "' class='link-meniu'>Editează</a> | 
                        <a href='delete-meniu-admin.php?id_preparat=" . $row['id_preparat'] . "' class='link-meniu' 
                            onclick='return confirm(\"Sigur doriți să ștergeți acest preparat?\")'>Șterge</a>
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

echo '<br><br>';

$sql9 = "SELECT id_preparat, nume_preparat, descriere, gramaj, pret FROM meniu WHERE categorie='desert'";

if($result = mysqli_query($conn, $sql9)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='tabel-meniu'>";
            echo "<tr>";
                echo "<th class='hidden'>Id Preparat</th>";
                echo "<th>Desert</th>";
                echo "<th class='ingrediente'>Ingrediente</th>";
                echo "<th>Gramaj</th>";
                echo "<th>Preț</th>";
                echo "<th class='actiuni'>Acțiuni</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td class='hidden'>" . $row['id_preparat'] . "</td>";
                echo "<td>" . $row['nume_preparat'] . "</td>";
                echo "<td class='ingrediente'>" . $row['descriere'] . "</td>";
                echo "<td>" . $row['gramaj'] . " g" . "</td>";
                echo "<td>" . $row['pret'] . " lei" . "</td>";
                echo "
                    <td class='actiuni'>
                        <a href='edit-meniu-admin.php?id_preparat=" . $row['id_preparat'] . "' class='link-meniu'>Editează</a> | 
                        <a href='delete-meniu-admin.php?id_preparat=" . $row['id_preparat'] . "' class='link-meniu' 
                            onclick='return confirm(\"Sigur doriți să ștergeți acest preparat?\")'>Șterge</a>
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