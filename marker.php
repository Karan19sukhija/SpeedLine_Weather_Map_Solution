<?php
include_once "dbh.php";
header("Content-type: text/xml");

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Select all the rows in the cities table
$query = "SELECT * FROM cities WHERE 1";
$result = mysqli_query($conn,$query);


// Start XML file, echo parent node
echo "<?xml version='1.0' encoding='UTF-8' ?>";
echo '<cities>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'id="' . $row['id'] . '" ';
  echo 'name="' . parseToXML($row['name']) . '" ';
  echo 'temp="' . parseToXML($row['temp']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lon="' . $row['lon'] . '" ';
  echo 'descr="' . $row['descr'] . '" ';
  echo '/>';
  $ind = $ind + 1;
}
// End XML file
echo '</cities>';

header("Location: ./index.html");
?>



