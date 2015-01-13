<?php
    $pageTitle = "Mina kurser";
    $section = "minakurser";
?>

<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php");?>
<?php include("layout/header.php"); ?>

<link href="css/pages/minprofil.css" rel="stylesheet">

    <div class="main">
    <div class="account-container">
        <div class="content clearfix">
            
            <h1>Ändra kurs</h1>
           <p> <?php echo logged_in();   //if-satsen ersatt av en funktion ?></p>     
           <h4>Här kan du ändra kursuppgifter</h4>


<?php
        $id = $_SESSION['id'];
        $class = $_SESSION['class'];
        $course = $_SESSION['course'];
        $status = $_SESSION['status'];
        $startdate = $_SESSION['startdate'];
        $enddate = $_SESSION['enddate'];
        $rating = $_SESSION['rating']; 

    if(isset($_GET['id'])) {
        
    try{
            $query = "SELECT * FROM courses WHERE id = :id";

            $ps = $db->prepare($query);
            $result = $ps->execute(
                array(
                    'id'=>$_GET['id']
            ));

            $posts = $ps->fetch(PDO::FETCH_ASSOC); 
        
            $id = $posts['id'];    
            $class = $posts['class'];
            $course = $posts['course'];
            $status = $posts['status'];
            $startdate = $posts['startdate'];
            $enddate = $posts['enddate'];
            $rating = $posts['rating'];
     
        } catch(Exception $exception) {
            echo "Query failed, see error message below: <br /><br />";
            echo $exception. "<br /> <br />";
        }
    }
  
 if(isset($_POST['update'])) {

            $id = $posts['id'];    
            $class = $posts['class'];
            $course = $posts['course'];
            $status = $posts['status'];
            $startdate = $posts['startdate'];
            $enddate = $posts['enddate'];
            $rating = $posts['rating'];

    try{  
            $query = "UPDATE courses ";
            $query .= "SET status = :status, startdate = :startdate, enddate = :enddate ";
            $query .= "WHERE id = :id"; 

            $ps = $db->prepare($query); 
            $result = $ps->execute(
                array (
                    'status'=>$status, 
                    'startdate'=>$startdate, 
                    'enddate'=>$enddate, 
                    'id'=>$id
                    ));

                if ($result) {
                 echo "Course updated";
                }else {
                 echo "Failed ";
                }

        } catch(Exception $exception) {
            echo "Query failed, see error message below: <br /><br />";
            echo $exception. "<br /> <br />";
        }
     
     

    }elseif (isset($_POST['delete'])){
    
    try{
    require_once("db_connect.php");
        $query = "DELETE FROM courses ";
        $query .= "WHERE id = :id";

        $ps = $db->prepare($query); 
        $result = $ps->execute(
            array(
                'id'=>$id 
            ));
        
            if ($result) {
                header("Location: minakurser.php?deleted=true");

        }else {
             echo "Delete failed! <br /><br />";
        }

    } catch(Exception $exception) {
        echo "Query failed, see error message below: <br /><br />";
        echo $exception. "<br /> <br />";
    }
    
}

?>

    <form action="minakurser_edit.php" method="POST" >
        <table class="table">
            <tr class= "login-fields">
                <td>Klass: </td>
                <td class="field"><input type="text" readonly="" name="class"  id="username" value="<?php echo $class;?>" /></td>
            </tr>
            <tr class= "login-fields">
                <td>Kurs: </td>
                <td class="field"><input type="text" readonly="" name="course" class="login username-field" id="username"value="<?php echo $course;?>" /></td>
            </tr>
            <tr class= "login-fields">
                <td>Status: </td>
                <td class="field"><input type="text" name="status"  id="status" value="<?php echo $status;?>" /></td>
            </tr>
            <tr class= "login-fields">
                <td>Startdatum: </td>
                <td class="field"><input type="text" name="startdate" id="startdate" value="<?php echo $startdate;?>" /></td>
            </tr>
            <tr class= "login-fields">
                <td>Slutdatum: </td>
                <td class="field"><input type="text" name="enddate" id="enddate" value="<?php echo $enddate;?>" /></td>
            </tr>
            <tr>
                
                <td class="login-actions"><input type="submit" name="update" value="Uppdatera" class="button btn btn-success btn-large" /></td>
            </tr>
        
        </table>
  
        
    </form>

<br />
<br />
<a href="minakurser.php">Go to courses</a>
    
    </div> <!-- class content clearfix -->
 </div> <!--class container --> 
</div> <!-- class main-->
       
<?php
include("layout/footer.php");
?>
