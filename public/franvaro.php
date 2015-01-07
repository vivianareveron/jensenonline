<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php");?>
<?php include("layout/header.php"); ?>

<?php
    $pageTitle = "Frånvaro";
    $section = "franvaro";
?>
<link href="css/pages/franvaro.css" rel="stylesheet">

<main> 
    
    <div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="row">
                    <div class="span9">
                        <h1>Frånvaro</h1>
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