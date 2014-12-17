<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php");?>
<?php include("layout/header.php"); ?>

<?php
    echo logged_in();   //if-satsen ersatt av en funktion 

    $pageTitle = "Meddelanden";
    $section = "meddelanden";
?>
<link href="css/pages/meddelanden.css" rel="stylesheet">

<main> 


</main>
    
<?php
include("layout/footer.php");
?>