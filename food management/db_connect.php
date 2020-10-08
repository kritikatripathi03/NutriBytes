<?php

$user = 'root';
$pass = '';
$server = 'localhost';
$db = 'food_management';

$con=mysqli_connect($server,$user,$pass,$db);



if($con){
}else{
	//echo"no connection";
	die("no connection" . mysqli_connect_error());
}

?>
