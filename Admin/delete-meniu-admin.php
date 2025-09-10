<?php
include "../Fisiere PHP/conectarebd.php";

if (isset($_GET['id_preparat'])) {
    $id_preparat = intval($_GET['id_preparat']); // Convertim in integer pentru securitate

    $sql = "DELETE FROM meniu WHERE id_preparat = $id_preparat";

    if (mysqli_query($conn, $sql)) {
        echo "Preparatul a fost ștears cu succes!";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "ID-ul preparatului nu a fost specificat.";
}

header("Location: meniu-mancare-admin.php");
exit;
?>
