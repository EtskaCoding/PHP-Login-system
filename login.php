<!DOCTYPE html>
<?php
session_start();
require 'service.php';
if (isset($_POST['email'])) {
    login();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        if(isset($_SESSION['error'])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
        ?>
        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit">
        </form>
    </body>
</html>
