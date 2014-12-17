<?php
	session_start();
	$_SESSION['msg'] = "";

//MARIES funktioner
    
    function logged_in() {                  //används på alla sidor 
        if(isset($_SESSION['email'])) {
            $output = "Välkommen " .$_SESSION['firstname']." ".$_SESSION['lastname']. ". Du är inloggad som ".$_SESSION['title']. " i klass " .$_SESSION['class']. ".";

        }else{
            header("Location: login.php");
        }
        return $output;
    }

    function show_class($myClass) {         //används på minklass.php
        global $db;  
        try{
            $query = "SELECT * FROM users WHERE class=:class AND title='Student' ORDER BY lastname ASC";

            $ps = $db->prepare($query);
            $result = $ps->execute(
                array(
                'class' => $myClass
                ));

            $row = $ps->fetchAll(PDO::FETCH_ASSOC);
            $output = "<table class='table table-striped table-bordered'>";
            $output .= "<thead>";
            $output .= "<tr><th>Namn</th><th>Email</th><th>Mobil</th><th>Skype</th></tr>";
            $output .= "</head>"; 
            $output .= "<tbody>";
             
        foreach($row as $r){
            $output .= '<tr>';
            $output .= '<td>' . $r['lastname'] .','. $r['firstname'] .'</td>';
            $output .= '<td>' . $r['email'] .'</td>';
            $output .= '<td>' . $r['mobile'] .'</td>';
            $output .= '<td>' . $r['skype'] .'</td>';
            }
            $output .= '</tr>';
            $output .= "</tbody>";
            $output .= '</table><br />';
     
        } catch(Exception $exception) {
            echo "Query failed, see error message below: <br /><br />";
            echo $exception. "<br /> <br />";
             
        }
        return $output; 
    }

    function show_all_classes($myClass){    //används på minklass.php
        global $db; 
        try{
            $query = "SELECT * FROM users WHERE class='CBK14' OR class='IPK14' OR class='PTK14' OR class='WUK14' AND title='Student' ORDER BY class, lastname ASC";

            $ps = $db->prepare($query);
            $result = $ps->execute(array());

            $row = $ps->fetchAll(PDO::FETCH_ASSOC);
            $output = "<table class='table table-striped table-bordered'>";
            $output .= "<tr><th>Namn</th><th>Email</th><th>Mobil</th><th>Skype</th><th>Klass</th></tr>";
            
        foreach($row as $r){
            $output .= '<tr>';
            $output .= '<td>' . $r['lastname'] . ',' . $r['firstname'] . '</td>';
            $output .= '<td>' . $r['email'] . '</td>';
            $output .= '<td>' . $r['mobile'] . '</td>';
            $output .= '<td>' . $r['skype'] . '</td>';
            $output .= '<td>' . $r['class'] . '</td>';
            }
            $output .= '</tr>';
            $output .= '</table><br />';
     
        } catch(Exception $exception) {
            echo "Query failed, see error message below: <br /><br />";
            echo $exception. "<br /> <br />";
        }
        return $output;
    }



//SIBARS funktioner

/*	
	function redirect_to($new_location) { 
		header("Location: " . $new_location);
		exit;
	}
	
	function logged_in() {
		return isset($_SESSION["id"]);
	}
	
	function confirm_logged_in() { 
		if (!logged_in()) {
			redirect_to("login.php");
		}
	}
	
	function error_logging($user, $exception){
		$message = date('Y-m-d H:i:s'). "; Username: ". $user . "; errorMsg: " . $exception . "\n";
		$setting = 3;							
		$path = "logs/errors.txt";
			
		error_log($message, $setting, $path);
	}
	
	function find_user_by_name($user){
		global $db;
		
		try{
			$query  = "SELECT * FROM users ";
			$query .= "WHERE username = :user";
						
			$ps = $db->prepare($query);
			$result = $ps->execute([
				'user' => $user
			]);
		} catch (Exception $exception){
			error_logging($user, $exception);
			$_SESSION['msg'] = "Database query failed. Please contact admin";
		}
		return $ps->fetch();
	}
	*/
?>