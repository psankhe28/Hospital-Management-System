<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "pratiksha";
$dbname = "hms";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
