<?php

$dbServername = "localhost";  // If you are using the local xampp php server
$dbUsername = "root"; //default value set by the xampp server
$dbPassword =""; //default value set by the xampp
$dbName ="weather";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName );

