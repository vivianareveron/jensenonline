<?php
    session_start();

    if(isset($_SESSION['email'])){
        echo "Välkommen " .$_SESSION['firstname']." ".$_SESSION['lastname']. ". Du är inloggad som ".$_SESSION['title']. " i klass " .$_SESSION['class']. ".";

    }else{
        header("Location: login.php");
    }  
?>

<!DOCTYPE html>
<html lang="">
<head>
   <meta charset="utf-8">
<title>Jensen Online 2.0</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>

        <h1>Sida tre - min klasslista</h1>
        
<?php
$class = $_SESSION['class'];

     if($class == 'WUK14') {
try{
        require_once("db_connect.php");

            $query = "SELECT * FROM users WHERE class='WUK14' AND title='Student' ORDER BY lastname ASC";

            $ps = $db->prepare($query);
            $result = $ps->execute(array());

            $row = $ps->fetchAll(PDO::FETCH_ASSOC);
                echo "<h4> Klass WUK14" . "</h4>";
                echo "<p><b> Namn, Email, Mobil, Skype</b></p>";
                foreach($row as $r){
                
                echo $r['lastname'] . ", " . $r['firstname'] . ", " . $r['email'] . ", " . $r['mobile'] . ", ". $r['skype'] . ", " . $r['class'] ."<br>";
            }
     
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
                echo "<h4> Klass PTK14" . "</h4>";
                echo "<p><b> Namn, Email, Mobil, Skype</b></p>";
                foreach($row as $r){
                
                echo $r['lastname'] . ", " . $r['firstname'] . ", " . $r['email'] . ", " . $r['mobile'] . ", ". $r['skype'] . ", " . $r['class'] ."<br>";
            }
     
        } catch(Exception $exception) {
            echo "Query failed, see error message below: <br /><br />";
            echo $exception. "<br /> <br />";
        }
     }
?>
        
        
</body>
</html>
