<?php
session_start();
if(!isset($_SESSION["username"]))
{
    header("location:login.php");
}
?>

<html>
    <head>
        <title>
        </title>
    </head>
    <body>
        <h1>This is admin homepage</h1>
        <?php echo  $_SESSION["username"] ?>
        <a href="logout.php">Logout </a>
    </body>
</html> 