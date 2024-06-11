<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "food_web";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
