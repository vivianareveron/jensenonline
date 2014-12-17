<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php");?>
<?php include("layout/header.php"); ?>

<?php
    $pageTitle = "Frånvaro";
    $section = "franvaro";
?>
<link href="css/pages/franvaro.css" rel="stylesheet">

<main> 
    <h1>Frånvaro</h1>
    <?php echo logged_in(); ?>

</main>
   
<?php
include("layout/footer.php");
?>