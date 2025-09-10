<?php
session_start();
$id_rezervare = $_GET['id_rezervare'];

include 'conectarebd.php';

// Verificăm dacă utilizatorul este autentificat
if (!isset($_SESSION['id_utilizator'])) {
    die("Eroare: Utilizator neautentificat.");
}

// Obținem datele existente pentru rezervarea specificată
$sql_select = "SELECT * FROM rezervari WHERE id_rezervare = $id_rezervare";
$result = mysqli_query($conn, $sql_select);
if ($result && mysqli_num_rows($result) > 0) {
    $rezervare = mysqli_fetch_assoc($result);
} else {
    die("Eroare: Rezervarea nu a fost găsită.");
}

$error = "";
$success = "";

// Preluăm datele din formular sau din baza de date
$numar_persoane = $_POST['numar_persoane'] ?? $rezervare['numar_persoane'];
$data = $_POST['data'] ?? $rezervare['data'];
$ora = $_POST['ora'] ?? substr($rezervare['ora'], 0, 5);
$loc = $_POST['loc'] ?? $rezervare['loc'];
$telefon = $_POST['telefon'] ?? $rezervare['telefon'];
$comentarii = $_POST['comentarii'] ?? $rezervare['comentarii'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($numar_persoane) || empty($data) || empty($ora) || empty($loc) || empty($telefon)) {
        $error = "Toate câmpurile obligatorii trebuie completate!";
    } elseif (!preg_match("/^\\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/", $data)) {
        $error = "Data trebuie să fie în formatul yyyy-mm-dd!";
    } elseif (date('w', strtotime($data)) == 6) {
        $error = "Restaurantul este închis sâmbăta!";
    } elseif ($numar_persoane <= 0) {
        $error = "Numarul de persoane este invalid!";
    } elseif (!preg_match("/^([01][0-9]|2[0-3]):[0-5][0-9]$/", $ora)) {
        $error = "Ora trebuie să fie în formatul hh:mm!";
    } elseif (strtotime($ora) < strtotime('11:00') || strtotime($ora) > strtotime('21:00')) {
        $error = "La această oră nu se pot face rezervări!";
    } elseif (!preg_match("/^07\\d{8}$/", $telefon)) {
        $error = "Număr de telefon invalid!";
    } else {
        // Actualizăm rezervarea în baza de date
        $sql_update = "UPDATE rezervari SET numar_persoane = $numar_persoane, data = '$data', ora = '$ora', loc = '$loc', telefon = '$telefon', comentarii = '$comentarii' WHERE id_rezervare = $id_rezervare";
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
    <title>Editează Rezervare</title>
    <link rel="stylesheet" href="../Fisiere CSS/style-editrezervari.css">
</head>
<body>
    <br><br>
    <a href="vezi-rezervari.php" class="myButton">INAPOI LA SITE</a>

    <form action="" method="POST">
        <h2>Editează Rezervare</h2>

        <?php if (!empty($error)): ?>
            <div class="error"> <?php echo $error; ?> </div>
        <?php elseif (!empty($success)): ?>
            <div class="success"> <?php echo $success;
            echo '<br><br><a href="vezi-rezervari.php" class="myButton2">Vezi rezervările</a>';
                exit; ?>
            </div>
        <?php endif; ?>

        <label for="numar_persoane">Număr de persoane</label>
        <input type="number" id="numar_persoane" name="numar_persoane" value="<?php echo htmlspecialchars($numar_persoane); ?>" required>

        <label for="data">Data (yyyy-mm-dd)</label>
        <input type="date" id="data" name="data" value="<?php echo htmlspecialchars($data); ?>" required>

        <label for="ora">Ora</label>
        <input type="text" id="ora" name="ora" value="<?php echo htmlspecialchars($ora); ?>" placeholder="hh:mm" required>

        <label for="loc">Loc</label>
        <select id="loc" name="loc" required>
            <option value="" disabled <?php echo empty($loc) ? 'selected' : ''; ?>>Selectează</option>
            <option value="restaurant" <?php echo $loc === 'restaurant' ? 'selected' : ''; ?>>Restaurant</option>
            <option value="terasa" <?php echo $loc === 'terasa' ? 'selected' : ''; ?>>Terasa</option>
        </select>

        <label for="telefon">Număr de telefon</label>
        <input type="text" id="telefon" name="telefon" value="<?php echo htmlspecialchars($telefon); ?>" required>

        <label for="comentarii">Comentarii (opțional)</label>
        <textarea id="comentarii" name="comentarii"><?php echo htmlspecialchars($comentarii); ?></textarea>

        <button type="submit">Salvează Modificările</button>
    </form>
</body>
</html>
