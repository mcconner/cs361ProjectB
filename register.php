<?php
session_start();

if( !empty($_POST["newuseremail"]) && !empty($_POST["newuserpassword"]) ) {
	//Database include goes here
	include "conn.php";

	$username = $mysqli->real_escape_string($_POST['newuseremail']);
	$username = strtolower($username);
	$password = md5($mysqli->real_escape_string($_POST['newuserpassword']));

	if(!($stmt = $mysqli->prepare("Select UserID FROM cs361users WHERE username = ?"))){
		echo "Prepare failed: (" .$mysqli->errno . ") " . $mysqli->error;
	}
	if(!($stmt->bind_param("s", $username))){
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
	}
	if(!($stmt->execute())){
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}
	$result = $stmt->get_result();
	//Perform User account check
	if($result->num_rows == 1){
      $jsresult = "Error: That username is already taken.<br>Please submit another username.";
      echo $jsresult;
    } else {
  	    if(!($stmt = $mysqli->prepare("INSERT INTO cs361users (username, password) VALUES (?, ?)"))) {
			echo "Prepare failed: (" .$mysqli->errno . ") " . $mysqli->error;
		}
		if(!($stmt->bind_param("ss", $username, $password))){
			echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if(!($stmt->execute())){
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if($mysqli->error){
			$jsresult = "Something went wrong. Please go back and try again.";
			echo $jsresult;
		}else{
			$_SESSION['Username'] = $username;
    		$_SESSION['LoggedIn'] = true;
			$jsresult = "OK";
			echo $jsresult;
		}
 	}
}
?>
