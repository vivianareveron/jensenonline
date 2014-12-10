<?php
/*
	session_start();
	$_SESSION['msg'] = "";
	
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