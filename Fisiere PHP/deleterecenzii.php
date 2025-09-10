<?php
include "conectarebd.php";

if (isset($_GET['id_recenzie'])) {
    $id_recenzie = intval($_GET['id_recenzie']); // Convertim in integer pentru securitate

    $sql = "DELETE FROM recenzii WHERE id_recenzie = $id_recenzie";

    if (mysqli_query($conn, $sql)) {
        echo "Recenzia a fost ștearsă cu succes!";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "ID-ul recenziei nu a fost specificat.";
}

header("Location: vezi-recenzii.php");
exit;
?>
