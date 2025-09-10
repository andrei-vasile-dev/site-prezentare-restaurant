<?php
session_start();

echo '
<!DOCTYPE html>
<html>
<head>
    <title>Adaugă preparat</title>
    <link rel="stylesheet" href="style-adauga-preparat-admin.css">
</head>
<body><br><br>';

    echo ' <a href="meniu-mancare-admin.php" class="myButton">INAPOI LA MENIU</a>';

    $error = "";
    $success = "";

    $nume_preparat = $_POST['nume_preparat'] ?? "";
    $nume_preparat = strtoupper($nume_preparat);
    $descriere = $_POST['descriere'] ?? "";
    $gramaj = $_POST['gramaj'] ?? "";
    $pret = $_POST['pret'] ?? "";
    $categorie = $_POST['categorie'] ?? "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (empty($nume_preparat) || empty($descriere) || empty($gramaj) || empty($pret) || empty($categorie)) {
            $error = "Toate câmpurile sunt obligatorii!";
        } else {
            // Conectare la baza de date și inserare
            include '../Fisiere PHP/conectarebd.php';

            $sql_insert = "INSERT INTO meniu (nume_preparat, descriere, gramaj, pret, categorie) 
                           VALUES ('$nume_preparat', '$descriere', '$gramaj', $pret, '$categorie')";
            if (mysqli_query($conn, $sql_insert)) {
                $success = "Preparatul a fost adăugat cu succes!";
                echo '<div class="success">' . $success ;
                echo '<br><br><a href="meniu-mancare-admin.php"><button>Vezi meniul</button></a></div>';
                exit;
            } else {
                $error = "Eroare la salvarea preparatului.";
            }

        }
    }
?>

    <br><br><br>
    <form action="" method="POST">
        <h2>Adaugă Preparat</h2>

        <?php if (!empty($error)): ?>
            <div class="error"> <?php echo $error; ?> </div>
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

        <button type="submit">Adaugă</button>
    </form>

    <br><br><br>
</body>
</html>
