<?php

include "../Fisiere PHP/conectarebd.php";
$id_rezervare = $_GET['id_rezervare'];




$sql = "DELETE FROM rezervari WHERE id_rezervare='".$id_rezervare."'";


if(mysqli_query($conn, $sql)==TRUE) {
    echo "Rezervarea a fost stearsa cu succes!";
} else {
    echo "Error deleting record: ".$scan->error;
}


header ("Location: vezi-rezervari-admin.php");
exit;

?>