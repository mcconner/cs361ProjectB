<?php

session_save_path('/nfs/stak/students/p/pattejon/php_sessions');
session_start();
session_destroy();
header("Location: index.html");

?>
