<?php
session_start();
if(!empty($_POST["useremail"]) && !empty($_POST["userpassword"])){

	//Database include goes here
	include "conn.php";

	$username = $mysqli->real_escape_string($_POST['useremail']);
	$username = strtolower($username);
	$password = md5($mysqli->real_escape_string($_POST['userpassword']));

	if(!($stmt = $mysqli->prepare("Select UserID FROM cs361users WHERE username = ? AND password = ?"))){
		echo "Prepare failed: (" .$mysqli->errno . ") " . $mysqli->error;
	}
	if(!($stmt->bind_param("ss", $username, $password))){
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
	}
	if(!($stmt->execute())){
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}
	$result = $stmt->get_result();
	//Perform User account check
	if($result->num_rows == 1){
    //Correct login!
    $_SESSION['Username'] = $username;
    $_SESSION['LoggedIn'] = true;
    while($row = $result->fetch_row()) {
      $_SESSION['uid'] = $row[0];
    }
    echo "OK";
  } else {
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
    if($result->num_rows == 1){
      //Username exists, wrong password provided.
      $jsresult = "Error: Invalid password.";
      echo $jsresult;
    } else {
      //Account doesn't exist.
      $jsresult = "Error: Account does not exist.";
      echo $jsresult;
    }
 	}
}
