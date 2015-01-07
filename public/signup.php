<?php
    session_start();
    $section = 'signup';

  /*  if(isset($_SESSION['email'])){
        echo "Välkommen " .$_SESSION['firstname']." ".$_SESSION['lastname']. ". Du är inloggad som ".$_SESSION['title']. " i klass " .$_SESSION['class']. ".";

    }else{
        header("Location: login.php");
    }  */
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
//include("layout/header.php"); //detta krockar med min kod på något sätt??
?>
    
    
    
    
    
    
<main>   
    <div class="main">
    <div class="account-container">
        <div class="content clearfix">
        <h1>Lägg till användare</h1>
    <p>Lägg till nya elever, lärare och övrig personal i Jensen Online. </p>
    <i>Fält markerade med en <span class="error">*</span> är obligatoriska.</i><br /><br />

<?php
    $title = $class = $firstname = $lastname = $address = $postnumber = $postaddress = $email = $phone = $mobile = $workphone = $skype = $username = $password = $re_password = "" ;
	$titleErr = $classErr = $firstErr = $lastErr = $emailErr = $userErr = $passErr = $rePassErr = "";

//Om användaren trycker på "Sign up"-knappen
if(isset($_POST["submit"])){								
	
		$title        = trim($_POST["title"]);
        $class        = trim($_POST["class"]);
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
        $username     = trim($_POST["username"]);
		$password     = trim($_POST["password"]);
        $re_password  = trim($_POST["re_password"]);
	
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
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format"; 
		}
	    if (empty($_POST["email"])) {
			$emailErr = "Email is required";
	    }
        if (empty($_POST["username"])) {
			$userErr = "Username is required";
	    }
	    if (empty($_POST["password"])) {
			$passErr = "Password is required";
	    }
        if (empty($_POST["re_password"])) {
			$rePassErr = "Re-entered password is required";
	    } 
        if($re_password!=$password) {
            $rePassErr = "The re-entered password don't match";
        }
    
        try{
            require_once("../includes/db_connect.php");

            $query = "SELECT * ";
            $query .= "FROM users ";
            $query .= "WHERE username = :username "; 

            $ps = $db->prepare($query); 
            $result = $ps->execute(
                array(
                    'username'=>$username 
                ));
            $result = $ps->fetch(PDO::FETCH_ASSOC);

                if($username){	
                    if ($result ['username']== $username) {

                        $_SESSION["username"] = $result['username'];

                    $userErr = "Username already exist. Please create a new username.<br /><br />";

                    } 
                } 

        } catch(Exception $exception) {
            echo "Query failed, see error message below: <br /><br />";
            echo $exception. "<br /> <br />";
        }

	    
        if(empty($titleErr) && empty($classErr) && empty($firstErr) && empty($lastErr) && empty($emailErr) && empty($userErr) && empty($passErr) && empty($rePassErr)){
                echo "It is validated. You are ready for some DB statements now"; 
		
		try{
        require_once("../includes/db_connect.php");

            $query = "INSERT INTO users (title, class, firstname, lastname, address, postnumber, postaddress, email, phone, mobile, workphone, skype, username, password) ";
            $query .= "VALUES (:title, :class, :firstname, :lastname, :address, :postnumber, :postaddress, :email, :phone, :mobile, :workphone, :skype, :username, :password) ";

            $ps = $db->prepare($query); //prepared statement
            $result = $ps->execute(array(
                'title'=>$title,
                'class'=>$class,
                'firstname'=>$firstname,
                'lastname'=>$lastname, 
                'address'=>$address,
                'postnumber'=>$postnumber,
                'postaddress'=>$postaddress,
                'email'=>$email, 
                'phone'=>$phone,
                'mobile'=>$mobile,
                'workphone'=>$workphone, 
                'skype'=>$skype,
                'username'=>$username,
                'password'=>$password,
            ));

                if ($result) {
                header("Location: login.php");
            }else {
                 echo "Signup failed";
            }

        } catch(Exception $exception) {
            echo "Query failed, see error message below: <br /><br />";
            echo $exception. "<br /> <br />";
        }

        $user = $ps->fetch(PDO::FETCH_ASSOC); //associative array
       }

	
	}
        
?>
            
<!-- Formulär --> 
<form action="signup.php" method="POST" >
        <table>
            <tr>
                <th><label for="title">Titel: </label></th>
                <td>
                <select name="title" id="title" >
                    <option value="">-- Välj --</option>
                    <option value="Student">Elev</option>
                    <option value="Staff">Lärare</option>
                    <option value="Admin">Admin</option>
                </td>
                <td><span class="error"> * <?php echo $titleErr; ?></span></td>
            </tr>
            <tr>
                <th><label for="class">Klass: </label></th>
                <td>
                <select name="class" id="class">
                    <option value="">-- Välj --</option>
                    <option value="CBK14">CBK14</option>
                    <option value="IPK14">IPK14</option>
                    <option value="PTK14">PTK14</option>
                    <option value="WUK14">WUK14</option>
                    <option value="Jensen">Jensen</option>
                </td>
                <td><span class="error">* <?php echo $classErr; ?></span></td>
            </tr>
            <tr>
                <td>Förnamn </td>
                <td><input type="text" name="firstname" value="<?php echo $firstname; ?>"/><span class="error"> * <?php echo $firstErr; ?></span></td>
            </tr>
            <tr>
                <td>Efternamn </td>
                <td><input type="text" name="lastname" value="<?php echo $lastname; ?>"/><span class="error"> * <?php echo $lastErr; ?></span></td>
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
                <td><input type="email" name="email" value="<?php echo $email; ?>"/><span class="error"> * <?php echo $emailErr; ?></span></td>
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
                <td>Username </td>
                <td><input type="text" name="username" value="<?php echo $username; ?>"/><span class="error"> * <?php echo $userErr; ?></span></td>
            </tr>
            <tr>
                <td>Password </td>
                <td><input type="password" name="password" value="<?php echo $password; ?>" /><span class="error"> * <?php echo $passErr; ?></span></td>
            </tr>
            <tr>
			<td>Re-password:</td>
			<td><input type="password" name="re_password" /><span class="error"> * <?php echo $rePassErr; ?></span></td>
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
     
<?php
include("layout/footer.php");
?>