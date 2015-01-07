<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php");?>
<?php include("layout/header.php"); ?>

<?php
    $pageTitle = "Mina kurser";
    $section = "minakurser";
?>
<link href="css/pages/minakurser.css" rel="stylesheet">

<main> 
    <div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="row">
                    <div class="span9">
                        <h2>Mina kurser</h2>
                        <?php echo logged_in(); ?>
                    </div> <!--span9-->
                </div> <!--row-->
            </div> <!--container-->
        </div> <!--main-inner-->
    </div> <!--main-->
</main>
    
<?php
include("layout/footer.php");
?>