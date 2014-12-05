<?php
    session_start();

    if(isset($_SESSION['email'])){
        echo "Välkommen " .$_SESSION['firstname']." ".$_SESSION['lastname']. ". Du är inloggad som ".$_SESSION['title']. " i klass " .$_SESSION['class']. ".";

    }else{
        header("Location: login.php");
    }  
?>

<!-- Känns som detta nedan skall ligga i header.php --> 

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
<link href="css/pages/minprofil.css" rel="stylesheet">
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
    <div class="main">
    <div class="account-container">
        <div class="content clearfix">
        <h1>Lägg till användare</h1>
    <p>Lägg till nya elever, lärare och övrig personal i Jensen Online. </p>
    <i>Fält markerade med en <span class="error">*</span> är obligatoriska.</i><br /><br />

<?php
    $firstname = $lastname = $address = $postnumber = $postaddress = $email = $phone = $mobile = $workphone = $skype = $password = "" ;
	$titleErr = $classErr = $firstErr = $lastErr = $emailErr = $passErr = "";

//Om användaren trycker på "Sign up"-knappen
if(isset($_POST["submit"])){								
	
		$firstname    = trim($_POST["firstname"]);	
		$lastname     = trim($_POST["lastname"]);
		$address      = trim($_POST["address"]);	
		$postnumber   = trim($_POST["postnumber"]);
        $postaddress  = trim($_POST["postaddress"]);	
		$email 	      = trim($_POST["email"]);
		$phone        = trim($_POST["phone"]);	
		$mobile       = trim($_POST["mobile"]);
        $workphone    = trim($_POST["workphone"]);
		$skype        = trim($_POST["skype"]);	
		$password     = trim($_POST["password"]);

				
		
		if (empty($_POST["title"])) {
			$titleErr = "Title is required";
		}
        if (empty($_POST["class"])) {
			$classErr = "Class is required";
		}
        if (empty($_POST["firstname"])) {
			$firstErr = "Firstname is required";
		}
        if (empty($_POST["lastname"])) {
			$lastErr = "Lastname is required";
		}
	    if (empty($_POST["email"])) {
			$emailErr = "Email is required";
	    }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format"; 
		}
	    if (empty($_POST["password"])) {
			$passErr = "Password is required";
	    }
	    
	
	}
        
?>
            
<!-- Formulär --> 
<form action="signup.php" method="POST" >
        <table>
            <tr>
                <th><label for="title">Titel: </label></th>
                <td>
                <select required name="title" id="title" >
                    <option value="">-- Välj --</option>
                    <option value="student">Elev</option>
                    <option value="staff">Lärare</option>
                    <option value="admin">Admin</option>
                </td>
                <td><span class="error"> * <?php echo $titleErr; ?></span></td>
            </tr>
            <tr>
                <th><label for="class">Klass: </label></th>
                <td>
                <select required name="class" id="class">
                    <option value="">-- Välj --</option>
                    <option value="cbk">CBK14</option>
                    <option value="ipk">IPK14</option>
                    <option value="ptk">PTK14</option>
                    <option value="wuk">WUK14</option>
                    <option value="jensen">Jensen</option>
                </td>
                <td><span class="error">* <?php echo $classErr; ?></span></td>
            </tr>
            <tr>
                <td>Förnamn </td>
                <td><input required type="text" name="firstname" value="<?php echo $firstname; ?>"/><span class="error"> * <?php echo $firstErr; ?></span></td>
            </tr>
            <tr>
                <td>Efternamn </td>
                <td><input required type="text" name="lastname" value="<?php echo $lastname; ?>"/><span class="error"> * <?php echo $lastErr; ?></span></td>
            </tr>
            <tr>
                <td>Adress </td>
                <td><input type="text" name="address" value="<?php echo $address; ?>"/></td>
            </tr>
            <tr>
                <td>Postnummer </td>
                <td><input type="text" name="postnumber" value="<?php echo $postnumber; ?>" /></td>
            </tr>
            <tr>
                <td>Postadress </td>
                <td><input type="text" name="postaddress" value="<?php echo $postaddress; ?>" /></td>
            </tr>
            <tr>
                <td>E-post </td>
                <td><input required type="email" name="email" value="<?php echo $email; ?>"/><span class="error"> * <?php echo $emailErr; ?></span></td>
            </tr>
            <tr>
                <td>Telefon </td>
                <td><input type="text" name="phone" value="<?php echo $phone; ?>"/></td>
            </tr>
            <tr>
                <td>Mobil </td>
                <td><input type="text" name="mobile" value="<?php echo $mobile; ?>"/></td>
            </tr>
            <tr>
                <td>Arbetstelefon </td>
                <td><input type="text" name="workphone" value="<?php echo $workphone; ?>"/></td>
            </tr>
            <tr>
                <td>Skype </td>
                <td><input type="text" name="skype" value="<?php echo $skype; ?>"/></td>
            </tr>
            <tr>
                <td>Password </td>
                <td><input required type="password" name="password" value="<?php echo $password; ?>" /><span class="error"> * <?php echo $passErr; ?></span></td>
            </tr>
            
            <tr>
                <td><input type="submit" name="submit" value="Signup" /></td>
            </tr>
            
        </table>
    </form>            
       
            
            
            
            
<div class="login-extra">
<a href="frontpage.php">Back to start page</a>
            </div> <!-- class login-extra -->
    </div> <!-- class content clearfix -->
 </div> <!--class container --> 
</div> <!-- class main-->

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
    
<!-- Känns som detta ovan skall ligga i footer.php -->
  
