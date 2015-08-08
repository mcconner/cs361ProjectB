<?php
session_destroy();
session_start();

include 'db_conn.php';

include 'authclass.php';

$auth = new Authenticator( $dbhost, $dbuser, $dbpass, $dbname );

$auth->Authenticate($_POST["useremail"], $_POST["userpassword"]);

if($auth->isAuthenticated()){
	$_SESSION['loggedIn'] = $auth;
	$_SESSION['User'] = $auth->getUser();
}

?>