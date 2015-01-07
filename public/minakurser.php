<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php");?>
<?php include("layout/header.php"); ?>

<?php
    $pageTitle = "Mina kurser";
    $section = "minakurser";
?>
<link href="css/pages/minakurser.css" rel="stylesheet">

<main> 
    <h1>Mina kurser</h1>
    <?php echo logged_in(); ?>

</main>
    
<?php
include("layout/footer.php");
?>