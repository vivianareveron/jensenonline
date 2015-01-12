<?php
    $pageTitle = "Meddelanden";
    $section = "meddelanden";
?>

<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php");?>
<?php include("layout/header.php"); ?>


<link href="css/pages/meddelanden.css" rel="stylesheet">

<main> 
    
    <div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="row">
                    <div class="span12 headline">
                        <h2>Meddelanden</h2>
                        <?php echo logged_in(); ?>
                    </div> <!--span12-->
                </div> <!--row-->


<?php 
    echo add_post(); 
      
?>
               
                <div class="row">
                    <div class="span 9">
                    <form action="meddelanden.php" method="POST">
	                   <table>
	                       <tr>
		                      <td>Headline:</td> 
		                      <td><input type="text-field" id="headline" name="headline"/><span class="error"> * <?php echo $headlineErr; ?></span></td>
	                       </tr>
        	               <tr>
		                      <td>Content:</td> 
		                      <td><input type="text-field" id="content" name="content"/><span class="error"> * <?php echo $contentErr; ?></span</td>
	                       </tr>
	                       <tr>
		                      <td><input type="submit" value="Submit" name="submit" class="button btn btn-success btn-large"/></td>
		                      <td><input type="reset" value="Reset" name="reset" class="button btn btn-success btn-large" /></td>
	                       </tr>
	                   </table>
                    </form>
                </div> <!--span 9-->
                </div> <!--row-->    

<?php echo edit_post();
echo delete_post(); ?> 
                
                    <div class="row">
                    <div class="span9">
                        <div class="widget widget-nopad">
                            <div class="widget-content">
                                    
                                    <?php echo show_all_posts();?>           
                                
                            </div> <!--widget content-->
                        </div> <!--widget-->
                    </div> <!--span 9-->
                </div> <!--row-->       
            </div> <!--container-->
        </div> <!--main-inner-->
    </div> <!--main-->
        
    
    

</main>
    
<?php
include("layout/footer.php");
?>