<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php");?>
<?php include("layout/header.php"); ?>

<?php
    $pageTitle = "Mina uppgifter";
    $section = "minauppgifter";
?>
<link href="css/pages/minauppgifter.css" rel="stylesheet">

<main> 
    <h1>Mina uppgifter</h1>
    <?php echo logged_in(); ?>

</main>
   
<?php
include("layout/footer.php");
?>