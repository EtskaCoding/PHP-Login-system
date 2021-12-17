<?php
session_start();
if(!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
}
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo 'Welcome <b>' . $_SESSION['email'] . '</b>';
        ?>
    </body>
</html>
