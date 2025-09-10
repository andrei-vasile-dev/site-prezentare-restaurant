<?php
session_start();

echo '
<!DOCTYPE html>
<html>
<head>
    <title>Rezervare Masă</title>
    <link rel="stylesheet" href="../Fisiere CSS/style-rezervare-masa.css">
</head>
<body><br><br>';

    echo ' <a href="vezi-rezervari-admin.php" class="myButton">INAPOI LA REZERVĂRI</a>';

    $error = "";
    $success = "";

    $numar_persoane = $_POST['numar_persoane'] ?? "";
    $data = $_POST['data'] ?? "";
    $ora = $_POST['ora'] ?? "";
    $loc = $_POST['loc'] ?? "";
    $telefon = $_POST['telefon'] ?? "";
    $comentarii = $_POST['comentarii'] ?? "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (empty($numar_persoane) || empty($data) || empty($ora) || empty($loc) || empty($telefon)) {
            $error = "Toate câmpurile obligatorii trebuie completate!";
        } elseif (!preg_match("/^(\d{4})-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/", $data)) {
            $error = "Data trebuie să fie în formatul yyyy-mm-dd!";
        } elseif (date('w', strtotime($data)) == 6) {
            $error = "Restaurantul este închis sâmbăta!";
        }  elseif ($numar_persoane <= 0) {
            $error = "Numarul de persoane este invalid!";
        } elseif (strtotime($data) <= strtotime(date('Y-m-d'))) {
            $error = "Data trebuie să fie ulterioară datei curente!";
        } elseif (!preg_match("/^([01][0-9]|2[0-3]):[0-5][0-9]$/", $ora)) {
            $error = "Ora trebuie să fie în formatul hh:mm!";
        } elseif (strtotime($ora) < strtotime('11:00') || strtotime($ora) > strtotime('21:00')) {
            $error = "La această oră nu se pot face rezervări!";
        } else {
            // Conectare la baza de date și inserare
            include '../Fisiere PHP/conectarebd.php';


            if (!isset($_SESSION['id_utilizator'])) {
                die("Eroare: Utilizator neautentificat.");
            }
            $id_utilizator_rezervare = $_SESSION['id_utilizator'];
            $sql_insert = "INSERT INTO rezervari (id_utilizator, numar_persoane, data, ora, loc, telefon, comentarii) 
                           VALUES ($id_utilizator_rezervare, $numar_persoane, '$data', '$ora', '$loc', '$telefon', '$comentarii')";
            if (mysqli_query($conn, $sql_insert)) {
                $success = "Rezervarea a fost realizată cu succes!";
                echo '<div class="success">' . $success ;
                echo '<a href="vezi-rezervari-admin.php"><button>Vezi Rezervările</button></a></div>';
                exit;
            } else {
                $error = "Eroare la salvarea rezervării.";
            }

        }
    }
?>

    <form action="" method="POST">
        <h2>Rezervare</h2>

        <?php if (!empty($error)): ?>
            <div class="error"> <?php echo $error; ?> </div>
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
        <select id="telefon" name="telefon" required>
            <option value="" disabled <?php echo empty($telefon) ? 'selected' : ''; ?>>Selectează</option>
            <option value="admin" <?php echo $loc === 'admin' ? 'selected' : ''; ?>>Admin</option>
        </select>


        <label for="comentarii">Comentarii (opțional)</label>
        <textarea id="comentarii" name="comentarii"><?php echo htmlspecialchars($comentarii); ?></textarea>

        <button type="submit">Trimite</button>
    </form>
</body>
</html>
