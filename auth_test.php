<?php

include 'db_conn.php';
include 'authclass.php';

echo "Testing for Authenticator Class<br>";

echo "Testing for first class construction...<br>";
$auth_test_1 = new Authenticator($dbhost, $dbuser, $dbpass, $dbname);

if(isset($auth_test_1)){
	echo "class successfully constructed..<br>";
} else {
	echo "unable to initialize class!<br>";
}
$newuseremail = "testuser100@test.com";
$newuserpassword = "insecurepassword";
$newuserconfirm = "insecurepassword";

$auth_test_1->Register($newuseremail, $newuserpassword, $newuserconfirm);
echo "<br>";

if($auth_test_1->isAuthenticated()){
	echo "successfully registered user..." . $auth_test_1->getUser() . "<br>";
}else{
	echo "failed to register user!<br>";
}

echo "Testing for second class construction...<br>";
$auth_test_2 = new Authenticator($dbhost, $dbuser, $dbpass, $dbname);
if(isset($auth_test_2)){
	echo "class successfully constructed..<br>";
} else {
	echo "unable to initialize class!<br>";
}

$useremail = "testuser100@test.com";
$userpassword = "insecurepassword";

$auth_test_2->Authenticate($useremail, $userpassword);
echo "<br>";

if($auth_test_2->isAuthenticated()){
	echo "successfully authenticated user..." . $auth_test_2->getUser() . "<br>";
}else{
	echo "failed to authenticate user!<br>";
}

?>
