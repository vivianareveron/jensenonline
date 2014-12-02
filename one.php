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
<link href="css/pages/minprofil.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>

<?php
include("includes/header.php");
?>
    <div class="main">
    <div class="account-container">
        <div class="content clearfix">
        <h1>Min profil</h1>
    <p>Här kan du ändra dina uppgifter</p>

<?php

$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$address = $_SESSION['address'];
$postnumber = $_SESSION['postnumber'];
$postaddress = $_SESSION['postaddress'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];
$mobile = $_SESSION['mobile'];
$workphone = $_SESSION['workphone'];
$skype = $_SESSION['skype'];



if(isset($_POST["update"])) {
    
    $address = $_POST['address'];
    $postnumber = $_POST['postnumber'];
    $postaddress = $_POST['postaddress'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $mobile = $_POST['mobile'];
    $workphone = $_POST['workphone'];
    $skype = $_POST['skype'];

try{
    require_once("db_connect.php"); 
        $query = "UPDATE users ";
        $query .= "SET address = :address, postnumber = :postnumber, postaddress = :postaddress, email = :email, phone = :phone, mobile = :mobile, workphone = :workphone, skype = :skype ";
        $query .= "WHERE id = :id"; 

        $ps = $db->prepare($query); 
        $result = $ps->execute(
            array (
                'address'=>$address,
                'postnumber'=>$postnumber, 
                'postaddress'=>$postaddress,
                'email'=>$email,
                'phone'=>$phone,
                'mobile'=>$mobile,
                'workphone'=>$workphone,
                'skype'=>$skype,
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
        <table >
            <tr class= "login-fields">
                <td>Förnamn: </td>
                <td class="field"><input type="text" readonly="" name="firstname" class="login username-field" id="username" value=<?php echo $firstname;?> /></td>
            </tr>
            <tr class= "login-fields">
                <td>Efternamn: </td>
                <td class="field"><input type="text" readonly="" name="lastname" class="login username-field" id="username"value=<?php echo $lastname;?> /></td>
            </tr>
            <tr class= "login-fields">
                <td>Adress: </td>
                <td class="field"><input type="text" name="address" class="login username-field" id="username" value=<?php echo $address;?> /></td>
            </tr>
            <tr class= "login-fields">
                <td>Postnummer: </td>
                <td class="field"><input type="text" name="postnumber" class="login username-field" id="username" value=<?php echo $postnumber;?> /></td>
            </tr>
            <tr class= "login-fields">
                <td>Postadress: </td>
                <td class="field"><input type="text" name="postaddress" class="login username-field" id="username" value=<?php echo $postaddress;?> /></td>
            </tr>
            <tr class= "login-fields">
                <td>E-post: </td>
                <td class="field"><input type="text" name="email" class="login username-field" id="username" value=<?php echo $email;?> /></td>
            </tr>
            <tr class= "login-fields">
                <td>Hemtelefon: </td>
                <td class="field"><input type="text" name="phone" class="login username-field" id="username"value=<?php echo $phone;?> /></td>
            </tr>
            <tr class= "login-fields">
                <td>Mobil: </td>
                <td class="field"><input type="text" name="mobile" class="login username-field" id="username" value=<?php echo $mobile;?> /></td>
            </tr>
            <tr class= "login-fields">
                <td>Arbetstelefon: </td>
                <td class="field"><input type="text" name="workphone" class="login username-field" id="username" value=<?php echo $workphone;?> /></td>
            </tr>
            <tr class= "login-fields">
                <td>Skype: </td>
                <td class="field"><input type="text" name="skype" class="login username-field" id="username" value=<?php echo $skype;?> /></td>
            </tr>
            <tr>
                <td class="login-actions"><input type="submit" name="update" value="Uppdatera" class="button btn btn-success btn-large" /></td>
            </tr>
        </table>
    
    </form> 
<br />
<br />
        <div class="login-extra">
<a href="frontpage.php">Back to start page</a>
            </div> <!-- class login-extra -->
    </div> <!-- class content clearfix -->
 </div> <!--class container --> 
</div> <!-- class main-->
<?php
include("includes/footer.php");
?>    

<script src="js/jquery-1.7.2.min.js"></script> 
<script src="js/excanvas.min.js"></script> 
<script src="js/chart.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.js"></script>

 
<script src="js/base.js"></script> 
    
</body>
</html>
