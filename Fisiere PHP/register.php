<?php
session_start();
include 'conectarebd.php';

echo '
	<!DOCTYPE html>
	<html>
	<head>
	  <title>
	      Creează cont
	  </title>
	  <link rel="stylesheet" href="../Fisiere CSS/style-register.css">
	</head>';

echo ' <body>';
echo '<br><br>';
echo ' <a href="index.php" class="myButton">ÎNAPOI LA SITE</a>';

echo '<div class="register-container">';
echo '  <h1>Creează cont nou</h1>';

if (!isset($_POST["username"])) {
    echo '
    <form action="register.php" method="post">
        <table>
            <tr>
                <td><label for="nume">Nume:</label></td>
            </tr>
            <tr>
                <td><input type="text" id="nume" name="nume"></td>
            </tr>
            <tr>
                <td><label for="prenume">Prenume:</label></td>
            </tr>
            <tr>
                <td><input type="text" id="prenume" name="prenume"></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
            </tr>
            <tr>
                <td><input type="text" id="email" name="email"></td>
            </tr>
            <tr>
                <td><label for="username">Username: (litere, cifre, caracterul punct)</label></td>
            </tr>
            <tr>
                <td><input type="text" id="username" name="username"></td>
            </tr>
            <tr>
                <td><label for="parola">Parola: (litere, cifre)</label></td>
            </tr>
            <tr>
                <td><input type="text" id="parola" name="parola"></td>
            </tr>
            <tr>
                <td><input type="submit" value="CREEAZĂ CONT"></td>
            </tr>
        </table>
    </form>';
} else {
    // Preluam datele din formular
    $nume = trim($_POST["nume"]);
    $prenume = trim($_POST["prenume"]);
    $prenume = preg_replace('/\s+/', ' ', $prenume);
    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);
    $parola = trim($_POST["parola"]);


    // Verificam daca este vreun camp lasat necompletat
    if (empty($nume) || empty($prenume) || empty($email) || empty($username) || empty($parola)) {

        echo '<p style="color: red;">Toate câmpurile sunt obligatorii!</p>';
        include 'formular-register.php';
        die(); 
    }



    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

        echo '<p style="color: red;">Adresă de e-mail invalidă!</p>';
        include 'formular-register.php';
            die(); // Oprirea scriptului
    }


    //verificam username-ul
    if (strlen($username) <= 7) {
        echo '<p style="color: red;">Username-ul trebuie să aibă mai mult de 7 caractere.</p>';
        include 'formular-register.php';
        die();
    }

    if (preg_match('/\s/', $username)) {
        echo '<p style="color: red;">Username-ul nu trebuie să conțină spații.</p>';
        include 'formular-register.php';
        die();
    }

    if (preg_match_all('/[a-zA-Z]/', $username) < 2) {
        echo '<p style="color: red;">Username-ul trebuie să conțină cel puțin 2 litere.</p>';
        include 'formular-register.php';
        die();
    }

    if (preg_match_all('/\d/', $username) < 2) {
        echo '<p style="color: red;">Username-ul trebuie să conțină cel puțin 2 cifre.</p>';
        include 'formular-register.php';
        die();
    }


    //verificam parola
    if (strlen($parola) <= 7) {
        echo '<p style="color: red;">Parola trebuie să aibă mai mult de 7 caractere.</p>';
        include 'formular-register.php';
        die();
    }

    if (preg_match('/\s/', $parola)) {
        echo '<p style="color: red;">Parola nu trebuie să conțină spații.</p>';
        include 'formular-register.php';
        die();
    }

    if (preg_match_all('/[a-zA-Z]/', $parola) < 2) {
        echo '<p style="color: red;">Parola trebuie să conțină cel puțin 2 litere.</p>';
        include 'formular-register.php';
        die();
    }

    if (preg_match_all('/\d/', $parola) < 2) {
        echo '<p style="color: red;">Parola trebuie să conțină cel puțin 2 cifre.</p>';
        include 'formular-register.php';
        die();
    }
    

    // Verificam daca username-ul exista deja in bd
    $sql_check = 'SELECT * FROM utilizatori WHERE username = "' . $username . '"';
    if ($result = mysqli_query($conn, $sql_check)) {
        if (mysqli_num_rows($result) > 0) {
            echo "<p style='color: red;'>Acest username este deja folosit, vă rugăm sa alegeți altul. </p>";
            include 'formular-register.php';
            mysqli_free_result($result);
            die();
        } else {
            mysqli_free_result($result);
            // adaugam noul utilizator in bd
            $sql_insert = "INSERT INTO utilizatori (nume, prenume, username, parola, email) 
                           VALUES ('$nume', '$prenume', '$username', '$parola', '$email')";
            if (mysqli_query($conn, $sql_insert)) {
                echo "<p>Contul a fost creat cu succes!</p>";
                echo '<br>';
                echo ' <a href="login.php" class="buton-login">LOGIN</a>';
            } else {
                echo "Eroare la crearea contului: " . mysqli_error($conn);
            }
        }
    } else {
        echo "ERROR: Nu s-a putut executa $sql_check. " . mysqli_error($conn);
    }
}

echo '</div>';

echo '</body>';
echo '</html>';
?>
