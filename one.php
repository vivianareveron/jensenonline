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

        <h1>Sida ett - mina uppgifter</h1>

<?php

$postnumber = $_SESSION['postnumber'];
$postaddress = $_SESSION['postaddress'];


if(isset($_POST["update"])) {
    
$postnumber = $_POST['postnumber'];
$postaddress = $_POST['postaddress'];

try{
    require_once("db_connect.php"); 
        $query = "UPDATE users ";
        $query .= "SET postnumber = :postnumber ";
        $query .= "SET postaddress = :postaddress ";
        $query .= "WHERE id = :id"; 

        $ps = $db->prepare($query); 
        $result = $ps->execute(
            array (
                'postnumber'=>$postnumber, 
                'postaddress'=>$postaddress,
                'id'=>$_SESSION['id']
                ));
    
            if ($result) {
             echo "User updated";
            }else {
             echo "Failed ";
            }

    } catch(Exception $exception) {
        echo "Query failed, see error message below: <br /><br />";
        echo $exception. "<br /> <br />";
    }

}
?>
    
    
    <form action="one.php" method="POST" >
        <table>
            <tr>
                <td>Postnumber: </td>
                <td><input type="text" name="postnumber" value=<?php echo $postnumber;?> /></td>
            </tr>
            <tr>
                <td>Postaddress: </td>
                <td><input type="text" name="postaddress" value=<?php echo $postaddress;?> /></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="text" name="password" /></td>
            </tr>
            <tr>
                <td><input type="submit" name="update" value="Update" /></td>
            </tr>
        </table>
    
    </form> 
<br />
<br />
<a href="frontpage.php">Back to start page</a>
    
    
    
</body>
</html>
