<?php
session_start();
$id_recenzie = $_GET['id_recenzie'];

include 'conectarebd.php';

if (!isset($_SESSION['id_utilizator'])) {
    die("Eroare: Utilizator neautentificat.");
}


$sql_select = "SELECT * FROM recenzii WHERE id_recenzie = $id_recenzie";
$result = mysqli_query($conn, $sql_select);
if ($result && mysqli_num_rows($result) > 0) {
    $recenzie = mysqli_fetch_assoc($result);
} else {
    die("Eroare: Recenzia nu a fost găsită.");
}

$error = "";
$success = "";

$nota_recenzie = $_POST['nota_recenzie'] ?? $recenzie['nota_recenzie'];
$comentariu_recenzie = $_POST['comentariu_recenzie'] ?? $recenzie['comentariu_recenzie'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($nota_recenzie) || empty($comentariu_recenzie)) {
        $error = "Toate câmpurile obligatorii trebuie completate!";
    } elseif ($nota_recenzie <= 0 || $nota_recenzie > 10) {
        $error = "Notă invalidă!";
    }  else {
        // Actualizăm rezervarea în baza de date
        $data_recenzie = date('Y-m-d H:i:s');
        $sql_update = "UPDATE recenzii SET nota_recenzie = $nota_recenzie, comentariu_recenzie = '$comentariu_recenzie', data_recenzie = '$data_recenzie' WHERE id_recenzie = $id_recenzie";
        if (mysqli_query($conn, $sql_update)) {
            $success = "Modificările au fost salvate cu succes!";
        } else {
            $error = "Eroare la salvarea modificărilor.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editează Recenzia</title>
    <link rel="stylesheet" href="../Fisiere CSS/style-editrecenzii.css">
</head>
<body>
    <br><br>
    <a href="vezi-rezervari.php" class="myButton">INAPOI LA SITE</a>

    <form action="" method="POST">
        <h2>Editează Recenzia</h2>

        <?php if (!empty($error)): ?>
            <div class="error"> <?php echo $error; ?> </div>
        <?php elseif (!empty($success)): ?>
            <div class="success"> <?php echo $success;
            echo '<br><br><a href="vezi-recenzii.php" class="myButton2">Vezi recenziile</a>';
                exit; ?>
            </div>
        <?php endif; ?>
        
        <label for="nota_recenzie">Notă Recenzie (1 - 10)</label>
        <input type="number" id="nota_recenzie" name="nota_recenzie" value="<?php echo htmlspecialchars($nota_recenzie); ?>" required>

        <label for="comentarii">Comentarii</label>
        <textarea id="comentariu_recenzie" name="comentariu_recenzie"><?php echo htmlspecialchars($comentariu_recenzie); ?></textarea>

        <button type="submit">Salvează Modificările</button>
    </form>
</body>
</html>
