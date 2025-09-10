<?php
session_start();

echo '
<!DOCTYPE html>
<html>
<head>
    <title>Creeaza Recenzie</title>
    <link rel="stylesheet" href="../Fisiere CSS/style-creeaza-recenzie.css">
</head>
<body><br><br>';

    echo ' <a href="vezi-recenzii.php" class="myButton">INAPOI LA SITE</a>';

    $error = "";
    $success = "";

    $nota_recenzie = $_POST['nota_recenzie'] ?? "";
    $comentariu_recenzie = $_POST['comentariu_recenzie'] ?? "";
    


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (empty($nota_recenzie) || empty($comentariu_recenzie)) {
            $error = "Toate câmpurile obligatorii trebuie completate!";
        } elseif ($nota_recenzie <= 0 || $nota_recenzie > 10) {
            $error = "Notă invalidă!";
        }  else {
        

        include 'conectarebd.php';

        if (!isset($_SESSION['id_utilizator'])) {
            die("Eroare: Utilizator neautentificat.");
        }

        $data_recenzie = date('Y-m-d H:i:s');
        $id_utilizator_recenzie = $_SESSION['id_utilizator'];
        $sql_insert = "INSERT INTO recenzii (id_utilizator, nota_recenzie, comentariu_recenzie, data_recenzie) 
                        VALUES ($id_utilizator_recenzie, $nota_recenzie, '$comentariu_recenzie', '$data_recenzie')";

        if (mysqli_query($conn, $sql_insert)) {

            $success = "Recenzia dvs. a fost înregistrată cu succes!";
            echo '<div class="success">' . $success ;
            echo '<br><br><a href="vezi-recenzii.php"><button>Vezi recenziile</button></a></div>';
            exit;
        } else {
            $error = "Eroare la salvarea rezervării.";
        }

        }
    }
?>

    <form action="" method="POST">
        <h2>Lasă o recenzie</h2>

        <?php if (!empty($error)): ?>
            <div class="error"> <?php echo $error; ?> </div>
        <?php endif; ?>

        <label for="nota_recenzie">Notă Recenzie (1 - 10)</label>
        <input type="number" id="nota_recenzie" name="nota_recenzie" value="<?php echo htmlspecialchars($nota_recenzie); ?>" required>

        <label for="comentarii">Comentarii</label>
        <textarea id="comentariu_recenzie" name="comentariu_recenzie"><?php echo htmlspecialchars($comentariu_recenzie); ?></textarea>

        <button type="submit">Trimite</button>
    </form>
</body>
</html>
