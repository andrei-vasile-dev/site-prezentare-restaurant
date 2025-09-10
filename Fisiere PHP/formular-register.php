<?php

echo '
    <form action="register.php" method="post">
        <table>
            <tr>
                <td><label for="nume">Nume:</label></td>
            </tr>
            <tr>
                <td><input type="text" id="nume" name="nume" value="' . $nume . '"></td>
            </tr>
            <tr>
                <td><label for="prenume">Prenume:</label></td>
            </tr>
            <tr>
                <td><input type="text" id="prenume" name="prenume" value="' . $prenume . '"></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
            </tr>
            <tr>
                <td><input type="text" id="email" name="email" value="' . $email . '"></td>
            </tr>
            <tr>
                <td><label for="username">Username: (litere, cifre, caracterul punct)</label></td>
            </tr>
            <tr>
                <td><input type="text" id="username" name="username" value="' . $username . '"></td>
            </tr>
            <tr>
                <td><label for="parola">Parola: (litere, cifre)</label></td>
            </tr>
            <tr>
                <td><input type="text" id="parola" name="parola" value="' . $parola . '"></td>
            </tr>
            <tr>
                <td><input type="submit" value="CREEAZĂ CONT"></td>
            </tr>
        </table>
    </form>';
?>