<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'portfolio');

$db = mysqli_connect(DB_SERVER,DB_USERNAME, DB_PASSWORD, DB_DATABASE);
?>