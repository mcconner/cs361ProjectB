<?php

session_save_path('/nfs/stak/students/p/pattejon/php_sessions');
session_destroy();
session_start();

include 'db_conn.php';

include 'authclass.php';

$auth = new Authenticator( $dbhost, $dbuser, $dbpass, $dbname );

$auth->Register($_POST["newuseremail"], $_POST["newuserpassword"], $_POST["newuserconfirm"]);

if($auth->isAuthenticated()){
//	$_SESSION['loggedIn'] = $auth;
	$_SESSION['User'] = $auth->getUser();
}

?>
