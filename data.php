<?php
include_once "dbh.php";


$sql = "SELECT * FROM cities;";

	$result = mysqli_query($conn,$sql); // quering the code to the database
	$resultCheck = mysqli_num_rows($result); // checking that the result from the database came is not empty.
    if($resultCheck>0){

    $data = array();

    while($row = mysqli_fetch_assoc($result)){

       // $row is an array containing the database results
       
       $data[] = $row;
 

    }
   // returning the data array in JSON format

   echo json_encode($data);
   
  }


?>