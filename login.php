<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="">
    <head>
    <meta charset="utf-8">
    <title>Jense Online 2.0</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="css/style.css" rel="stylesheet" type="text/css">     
<link href="css/pages/signin.css" rel="stylesheet" type="text/css">


<body>
   
    <div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">

			
			<a class="brand" href="index.html">
				<img src=img/Jensen.gif>			
			</a>		
			
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->

    
    
 
          

<?php

if(isset($_POST["submit"])) {
    
$email = $_POST['email'];
$password = $_POST['password'];
$title = $_POST['title'];

try{
    require_once("db_connect.php");
        
        $query = "SELECT * ";
        $query .= "FROM users ";
        $query .= "WHERE email = :email "; //placeholders som..
        $query .= "AND password = :password ";
        $query .= "AND title = :title";

        $ps = $db->prepare($query); //prepared statement
        $result = $ps->execute(
            array(
                'email'=>$email, 
                'password'=>$password,
                'title'=>$title
            ));
        $user = $ps->fetch(PDO::FETCH_ASSOC);
    //..sätts här 'password'=>$password));  //true or false. Arrayen i excecute är tilldelade värden för placeholders i SQL -> :username AND :password
            if ($user) {
                $_SESSION['email'] = $user['email']; //det här gör att de överlever
                $_SESSION['firstname'] = $user['firstname'];
                $_SESSION['lastname'] = $user['lastname'];
                $_SESSION['title'] = $user['title'];
                $_SESSION['class'] = $user['class'];
                $_SESSION['address'] = $user['address'];
                $_SESSION['postnumber'] = $user['postnumber'];
                $_SESSION['postaddress'] = $user['postaddress'];
                $_SESSION['phone'] = $user['phone'];
                $_SESSION['mobile'] = $user['mobile'];
                $_SESSION['workphone'] = $user['workphone'];
                $_SESSION['skype'] = $user['skype'];
                $_SESSION['id'] = $user['id']; //till nästa sida som är frontpage.php
                header("Location: frontpage.php");
        }else {
             echo "Du har angivit felaktigt användarnamn, lösenord eller behörighet. Vänligen försök igen.";
        }

    } catch(Exception $exception) {
        echo "Query failed, see error message below: <br /><br />";
        echo $exception. "<br /> <br />";
    }

    $user = $ps->fetch(PDO::FETCH_ASSOC); //associative array
}else {
    
}
if(isset($_GET["deleted"])) {
    echo "deleted";
}

?>

 <div class="account-container">
      <div class="content clearfix">
    
    <form action="login.php" method="POST">
        <h1>Logga in</h1>
        <table>
            
            <tr>
                <th>
                    <label for="title">Jag är</label>
                </th>
            </tr>
            
            <tr class="field">
                <td>
                <select name="title" id="title">
                    <option value="Student">Elev</option>
                    <option value="Staff">Lärare</option>
                    <option value="Admin">Administratör</option>
                </td>
            </tr>
        
            <tr class="login-fields">
                <td class="field"><input type="text" name="email" class="login username-field" id="username" placeholder="Användarnamn"/></td>
            </tr>
         
         
            <tr class="login-fields" >
                <td class="field"><input type="password" name="password" class="login password-field" placeholder="Lösenord" id="pasword"/></td>
            </tr>
        
            <tr >
                <td class="login-actions"><input type="submit" name="submit" value="Logga in" class="button btn btn-success btn-large"/></td>
            </tr>
            
        </table>
        <div class="login-extra">
        <p>Om du glömt ditt lösenord, klicka här!</p>
        </div> <!-- /login-extra -->
    </form> 
      </div> <!-- content clearfix -->
    </div> <!-- /account-container -->   

<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/signin.js"></script>

</body>
</html>