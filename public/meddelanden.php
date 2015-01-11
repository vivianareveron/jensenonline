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

<?php echo add_post(); ?>
               
                <div class="row">
                    <div class="span 9">
                    <form action="meddelanden.php" method="POST">
	<table>
	<tr>
		<td>Headline:</td> 
		<td><input type="text-field" name="headline"/></td>
	</tr>
        	<tr>
		<td>Content:</td> 
		<td><input type="text-field" name="content"/></td>
	</tr>
	<tr>
		
		<td><input type="submit" value="Submit" name="submit" /></td>
		<td><input type="reset" value="Reset" name="reset" /></td>
	</tr>
	</table>
</form>
                    </div> <!--span 9-->
                </div> <!--row-->    

                <div class="row">
                    <div class="span9">
                        <div class="widget widget-nopad">
                            <div class="widget-content">
                                <ul class="news-items">
                                    
                                    <?php echo edit_post();
                                          echo delete_post();
                                          echo show_all_posts();?>           
                                </ul>
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