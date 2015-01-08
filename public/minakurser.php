<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php");?>
<?php include("layout/header.php"); ?>

<?php
    $pageTitle = "Mina kurser";
    $section = "minakurser";
?>
<link href="css/pages/minakurser.css" rel="stylesheet">

<main> 
    
<?php
$class = $_SESSION['class'];
$title = $_SESSION['title'];
?>
    
    <div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="row">
                    <div class="span12 headline">
                        <h2>Kurslista</h2>
                        <?php echo logged_in(); //if-satsen ersatt av en funktion?>


        </div> <!--span12--> 
      </div> <!--row--> 
          
      <div class="row">
            <div class="span9">  
                <div class="widget widget-table action-table">
                    <div class="widget-header"> <i class="icon-group"></i>
                    <h3>Kurslista <?php echo $class ?></h3>
                    </div>
                    <!-- /widget-header -->
                        <div class="widget-content">   
<?php
    
    //alla if and else ersatta av två funktioner
    if($class == 'Jensen') {
        echo show_all_courses($class);
    } else {
        echo show_courses($class);
}

?>

                        </div>
                        <!-- /widget-content --> 
                </div>
                <!-- /widget -->
            </div>
            <!-- /span12-->
          
<!-- Start of Admin shortcuts -->  
<?php if($title == 'Admin'): ?>         
    <div class="span3">
              <div class="widget">
                <div class="widget-header"> <i class="icon-bookmark"></i>
                  <h3>Admin</h3>
                </div>
                <!-- /widget-header -->
                <div class="widget-content">

                    <div class="shortcuts">
                        <div> 
                            <a href="signup.php" class="shortcut"><i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Put up new course</span> </a>
                        </div>
                        <div>    
                        <a href="signup.php" class="shortcut"><i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Change course</span> </a>
                        </div>
                        <div>
                        <a href="signup.php" class="shortcut"><i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">Delete course</span> </a>
                        </div>

                </div>
             <!-- /shortcuts-->    
                </div>
                <!-- /widget-content --> 
              </div>
              <!-- /widget -->
            </div> 
            <!-- /span3 -->
<?php endif; ?>
<!-- End of Admin shortcuts -->       
          

                </div> <!--row-->
            </div> <!--container-->
        </div> <!--main-inner-->
    </div> <!--main-->
</main>
    
<?php
include("layout/footer.php");
?>