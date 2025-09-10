<?php
session_start();
$id_preparat = $_GET['id_preparat'];

include '../Fisiere PHP/conectarebd.php';


// Obținem datele existente pentru rezervarea specificată
$sql_select = "SELECT * FROM meniu WHERE id_preparat = $id_preparat";
$result = mysqli_query($conn, $sql_select);
if ($result && mysqli_num_rows($result) > 0) {
    $preparat = mysqli_fetch_assoc($result);
} else {
    die("Eroare: Preparatul nu a fost găsit.");
}

$error = "";
$success = "";

// Preluăm datele din formular sau din baza de date
$nume_preparat = $_POST['nume_preparat'] ?? $preparat['nume_preparat'];
$nume_preparat = strtoupper($nume_preparat);
$descriere = $_POST['descriere'] ?? $preparat['descriere'];
$gramaj = $_POST['gramaj'] ?? $preparat['gramaj'];
$pret = $_POST['pret'] ?? $preparat['pret'];
$categorie = $_POST['categorie'] ?? $preparat['categorie'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($nume_preparat) || empty($descriere) || empty($gramaj) || empty($pret) || empty($categorie)) {
        $error = "Toate câmpurile obligatorii trebuie completate!";
    } else {
        // Actualizăm rezervarea în baza de date
        $sql_update = "UPDATE meniu SET nume_preparat = '$nume_preparat', descriere = '$descriere', gramaj = '$gramaj', pret = $pret, categorie = '$categorie' WHERE id_preparat = $id_preparat";
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
    <title>Editează Preparat</title>
    <link rel="stylesheet" href="style-edit-meniu-admin.css">
</head>
<body>
    <br><br>
    <a href="meniu-mancare-admin.php" class="myButton">INAPOI LA MENIU</a>

    <form action="" method="POST">
        <h2>Editează Preparatul</h2>

        <?php if (!empty($error)): ?>
            <div class="error"> <?php echo $error; ?> </div>
        <?php elseif (!empty($success)): ?>
            <div class="success"> <?php echo $success;
            echo '<br><br><a href="meniu-mancare-admin.php" class="myButton2">Vezi meniul</a>';
                exit; ?>
            </div>
        <?php endif; ?>

        <label for="nume_preparat">Nume preparat</label>
        <input type="text" id="nume_preparat" name="nume_preparat" value="<?php echo htmlspecialchars($nume_preparat); ?>" required>

        <label for="gramaj">Gramaj</label>
        <input type="text" id="gramaj" name="gramaj" value="<?php echo htmlspecialchars($gramaj); ?>" required>

        <label for="pret">Preț</label>
        <input type="number" id="pret" name="pret" value="<?php echo htmlspecialchars($pret); ?>" required>
        
        <label for="categorie">Categorie</label>
        <select id="categorie" name="categorie" required>
            <option value="" disabled <?php echo empty($categorie) ? 'selected' : ''; ?>>Selectează</option>
            <option value="ciorbe" <?php echo $categorie === 'ciorbe' ? 'selected' : ''; ?>>Ciorbe</option>
            <option value="garnituri" <?php echo $categorie === 'garnituri' ? 'selected' : ''; ?>>Garnituri</option>
            <option value="aperitive" <?php echo $categorie === 'aperitive' ? 'selected' : ''; ?>>Aperitive</option>
            <option value="gratar" <?php echo $categorie === 'gratar' ? 'selected' : ''; ?>>Grătar</option>
            <option value="preparate pui" <?php echo $categorie === 'preparate pui' ? 'selected' : ''; ?>>Preparate Pui</option>
            <option value="salate aperitiv" <?php echo $categorie === 'salate aperitiv' ? 'selected' : ''; ?>>Salate Aperitiv</option>
            <option value="salate" <?php echo $categorie === 'salate' ? 'selected' : ''; ?>>Salate</option>
            <option value="paste" <?php echo $categorie === 'paste' ? 'selected' : ''; ?>>Paste</option>
            <option value="desert" <?php echo $categorie === 'desert' ? 'selected' : ''; ?>>Desert</option>
        </select>

        <label for="descriere">Ingrediente</label>
        <textarea id="descriere" name="descriere"><?php echo htmlspecialchars($descriere); ?></textarea>

        <button type="submit">Salvează Modificările</button>
    </form>
</body>
</html>
