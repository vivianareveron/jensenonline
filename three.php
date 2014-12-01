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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Jense Online 2.0</title>
</head>

<body>
    <div class="container">

        <h1>Sida tre</h1>
        
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
        
        
    </div>
</body>
</html>
