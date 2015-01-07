<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php");?>
<?php include("layout/header.php"); ?>

<?php
    echo logged_in();   //if-satsen ersatt av en funktion
    
    $pageTitle = "Min Klass";
    $section = "minkass";
?>
<link href="css/pages/minklass.css" rel="stylesheet">

<main> 

<?php
$class = $_SESSION['class'];
?>
    
<div class="main">
  <div class="main-inner">
    <div class="container">
        <div class="row">
            <div class="span9">  
                <div class="widget widget-table action-table">
                    <div class="widget-header"> <i class="icon-group"></i>
                    <h3>Klasslista <?php echo $class ?></h3>
                    </div>
                    <!-- /widget-header -->
                        <div class="widget-content">   
<?php
    
    //alla if and else ersatta av två funktioner
    if($class == 'Jensen') {
        echo show_all_classes($class);
    } else {
        echo show_class($class);
}

?>

                        </div>
                        <!-- /widget-content --> 
                </div>
                <!-- /widget -->
            </div>
            <!-- /span12-->
            
<?php
        include("layout/shortcuts.php");
?>
        </div>
        <!-- /row -->  
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main --> 

</main>

<?php
include("layout/footer.php");
?>
    
            
           