<?php require_once("../includes/functions.php");?>

<?php
    session_destroy();
    header("Location: login.php");
?>
