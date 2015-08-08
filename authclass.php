<?php
class Authenticator {

	protected $mysqli = null;
	protected $isError = false;
	protected $isAuth = false;
	protected $user = '';


	public function __construct( $dbhost, $dbuser, $dbpass, $dbname ) {
		$this->mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

		if ($this->mysqli->connect_errno) {
  			printf("Connect failed: %s\n", $instance->connnect_error);
 		exit();
	}

	}

	public function getUser() {
		return $this->user;
	}

	public function isError() {
		return $this->isError;	
	}

	public function isAuthenticated(){
		return $this->isAuth;
	}

	public function Authenticate($username, $password) {

		$username = $this->mysqli->real_escape_string($username);
		$username = strtolower($username);
		$password = md5($this->mysqli->real_escape_string($password));

		if(!($stmt = $this->mysqli->prepare("Select UserID FROM cs361users WHERE username = ? AND password = ?"))){
			echo "Prepare failed: (" .$this->mysqli->errno . ") " . $this->mysqli->error;
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
	    	while($row = $result->fetch_row()) {
	    	//$_SESSION['uid'] = $row[0];
	    	}
	    	echo "OK";
	    	$this->isAuth = true;
	    	$this->user = $username;
	
	 	} else {
		  	if(!($stmt = $this->mysqli->prepare("Select UserID FROM cs361users WHERE username = ?"))){
				echo "Prepare failed: (" .$this->mysqli->errno . ") " . $this->mysqli->error;
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

	public function Register($username, $password, $confirm){

		$username = $this->mysqli->real_escape_string($username);
		$username = strtolower($username);
		$password = md5($this->mysqli->real_escape_string($password));
		$confirm = md5($this->mysqli->real_escape_string($confirm));

		if($password == $confirm){
			if(!($stmt = $this->mysqli->prepare("Select UserID FROM cs361users WHERE username = ?"))){
				echo "Prepare failed: (" .$this->mysqli->errno . ") " . $this->mysqli->error;
			}
			if(!($stmt->bind_param("s", $username))) {
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
				if(!($stmt = $this->mysqli->prepare("INSERT INTO cs361users (username, password) VALUES (?, ?)"))) {
					echo "Prepare failed: (" .$this->mysqli->errno . ") " . $this->mysqli->error;
				}
				if(!($stmt->bind_param("ss", $username, $password))){
					echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
				}
				if(!($stmt->execute())){
					echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
				}
				if($this->mysqli->error){
					$jsresult = "Something went wrong. Please go back and try again.";
					echo $jsresult;
				}else{
					//Go ahead and set this to be authenticated
			    	$this->isAuth = true;
			    	$this->user = $username;
					$jsresult = "OK";
					echo $jsresult;
				}
			}
		} else {
			$jsresult = "The two passwords you typed did not match.";
			echo $jsresult;
		}
	}

}

?>
