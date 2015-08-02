<?php

$dbhost = 'oniddb.cws.oregonstate.edu';
$dbname = 'pattejon-db';
$dbuser = 'pattejon-db';
$dbpass = 'NEPgxdC5DpW28WGl';


$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connnect_error);
  exit();
}

?>
