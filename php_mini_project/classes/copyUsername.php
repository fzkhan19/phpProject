<?php

include 'myAutoLoader.php';

$userid = intval($_POST['user']);

$obj = new dbconnection();

$data = $obj->get_password_data($userid);

echo trim($data['username']);
?>