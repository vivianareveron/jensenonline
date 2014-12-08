<?php
    session_start();

    if(isset($_SESSION['email'])){
        echo "Välkommen " .$_SESSION['firstname']." ".$_SESSION['lastname']. ". Du är inloggad som ".$_SESSION['title']. " i klass " .$_SESSION['class']. ".";

    }else{
        header("Location: login.php");
    }  
    
    $pageTitle = "Min Klass";
    $section = "minkass";
?>

<!DOCTYPE html>
<html lang="">
<head>
   <meta charset="utf-8">
<Title><?php echo $pageTitle; ?></Title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/minklass.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>


<body>

<!-- Känns som detta ovan skall ligga i header.php -->
    
<!-- Header --> 
<?php
include("includes/header.php");
?>

<main> 
<?php
$class = $_SESSION['class'];
?>
    
<h1>Klasslista <?php echo $class ?></h1>
        
<?php

     if($class == 'WUK14') {
try{
        require_once("db_connect.php");

            $query = "SELECT * FROM users WHERE class='WUK14' AND title='Student' ORDER BY lastname ASC";

            $ps = $db->prepare($query);
            $result = $ps->execute(array());

            $row = $ps->fetchAll(PDO::FETCH_ASSOC);
            echo "<table>";
            echo "<tr><th>Namn</th><th>Email</th><th>Mobil</th><th>Skype</th></tr>";
            
        foreach($row as $r){
            echo '<tr>';
            echo '<td>',$r['lastname'],',',$r['firstname'],'</td>';
            echo '<td>',$r['email'],'</td>';
            echo '<td>',$r['mobile'],'</td>';
            echo '<td>',$r['skype'],'</td>';
			}
			echo '</tr>';
		echo '</table><br />';
     
        } catch(Exception $exception) {
            echo "Query failed, see error message below: <br /><br />";
            echo $exception. "<br /> <br />";
        }
     } else if($class == 'PTK14') {
try{
        require_once("db_connect.php");

            $query = "SELECT * FROM users WHERE class='PTK14' AND title='Student' ORDER BY lastname ASC";

            $ps = $db->prepare($query);
            $result = $ps->execute(array());

            $row = $ps->fetchAll(PDO::FETCH_ASSOC);
                echo "<table>";
            echo "<tr><th>Namn</th><th>Email</th><th>Mobil</th><th>Skype</th></tr>";
            
        foreach($row as $r){
            echo '<tr>';
            echo '<td>',$r['lastname'],',',$r['firstname'],'</td>';
            echo '<td>',$r['email'],'</td>';
            echo '<td>',$r['mobile'],'</td>';
            echo '<td>',$r['skype'],'</td>';
			}
			echo '</tr>';
		echo '</table><br />';
     
        } catch(Exception $exception) {
            echo "Query failed, see error message below: <br /><br />";
            echo $exception. "<br /> <br />";
        }
     } else if($class == 'IPK14') {
try{
        require_once("db_connect.php");

            $query = "SELECT * FROM users WHERE class='IPK14' AND title='Student' ORDER BY lastname ASC";

            $ps = $db->prepare($query);
            $result = $ps->execute(array());

            $row = $ps->fetchAll(PDO::FETCH_ASSOC);
                echo "<table>";
            echo "<tr><th>Namn</th><th>Email</th><th>Mobil</th><th>Skype</th></tr>";
            
        foreach($row as $r){
            echo '<tr>';
            echo '<td>',$r['lastname'],',',$r['firstname'],'</td>';
            echo '<td>',$r['email'],'</td>';
            echo '<td>',$r['mobile'],'</td>';
            echo '<td>',$r['skype'],'</td>';
			}
			echo '</tr>';
		echo '</table><br />';
     
        } catch(Exception $exception) {
            echo "Query failed, see error message below: <br /><br />";
            echo $exception. "<br /> <br />";
        }
     } else if($class == 'CBK14') {
try{
        require_once("db_connect.php");

            $query = "SELECT * FROM users WHERE class='CBK14' AND title='Student' ORDER BY lastname ASC";

            $ps = $db->prepare($query);
            $result = $ps->execute(array());

            $row = $ps->fetchAll(PDO::FETCH_ASSOC);
                echo "<table>";
            echo "<tr><th>Namn</th><th>Email</th><th>Mobil</th><th>Skype</th></tr>";
            
        foreach($row as $r){
            echo '<tr>';
            echo '<td>',$r['lastname'],',',$r['firstname'],'</td>';
            echo '<td>',$r['email'],'</td>';
            echo '<td>',$r['mobile'],'</td>';
            echo '<td>',$r['skype'],'</td>';
			}
			echo '</tr>';
		echo '</table><br />';
     
        } catch(Exception $exception) {
            echo "Query failed, see error message below: <br /><br />";
            echo $exception. "<br /> <br />";
        }
     }
?>
    
</main>    

<!-- Footer -->    
<?php
include("includes/footer.php");
?>

<!-- Känns som detta nedan skall ligga i footer.php -->

<!-- ================================================== --> 
<!-- Scripts --> 
<script src="js/jquery-1.7.2.min.js"></script> 
<script src="js/excanvas.min.js"></script> 
<script src="js/chart.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script> 
  

