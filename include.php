<?php
include_once "dbh.php";

$name = $_POST['city'];
$key = 'a4f866f62100f144e23a4a1d4aeaf403';

if(isset($_POST['getweather'])){

    $url = 'http://api.openweathermap.org/data/2.5/weather?q=$name&appid=$key';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.openweathermap.org/data/2.5/weather?q=$name&appid=a4f866f62100f144e23a4a1d4aeaf403");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($ch);
    curl_close($ch);

    $jsondata = json_decode($result);  // Decoding the response of the OpenWeather Map API

    $temp = $jsondata->main->temp;
    $temp = $temp - 273.15 . ' C'; // Converting kelvin to celsius

    $lat = $jsondata->coord->lat;
    $lon = $jsondata->coord->lon;

    $desc = $jsondata->weather[0]->description;

    $sql = "INSERT INTO CITIES(name, descr, lat, lon, temp )VALUES('$name', '$desc', '$lat','$lon', '$temp')";
    $result = mysqli_query($conn,$sql); // quering the code to the database


    header("Location: ./marker.php");

}






    


   

