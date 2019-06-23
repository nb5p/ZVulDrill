<?php
$db = new mysqli("localhost", "root", "root", "vuldata");
if ($db->connect_error) {
	die($db->connect_error);
}
echo "Successfully connected to MariaDB";