<?php
$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'vuldata';
$dbc = mysqli_connect($host, $username, $password, $database);
if (!$dbc) {
    die('Could not connect: ' . mysql_error());
}

session_start();

$basedir = '';

require_once('lib.php');
