<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php");?>
<?php include("layout/header.php"); ?>

<?php
    $pageTitle = "Meddelanden";
    $section = "meddelanden";
?>
<link href="css/pages/meddelanden.css" rel="stylesheet">

<main> 
    <h1>Meddelanden</h1>
    <?php echo logged_in(); ?>

</main>
    
<?php
include("layout/footer.php");
?>