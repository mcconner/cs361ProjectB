<?php
if(!empty($_POST["username"]) && !empty($_POST["password"])){

  $username = $mysqli->real_escape_string($_POST['username']);
  $username = strtolower($username);
  $password = md5($mysqli->real_escape_string($_POST['password']));
  $stmt = $mysqli->prepare("SELECT * FROM users WHERE Username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  if($result->num_rows == 1){
    $jsresult= "Error: That username is already taken.<br>Please submit another username.";
    echo $jsresult;
  } else {
    $stmt = $mysqli->prepare("INSERT into users (Username, Password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    if($mysqli->error){
      $jsresult = "Something went wrong. Please go back and try again.";
      echo $jsresult;
    } else {
      $jsresult = "OK";
      echo $jsresult;
    }
  }
}
?>
