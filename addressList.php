<?php
include 'dbConnection.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli($servername, $username, $password, $dbname);

$result = $conn->query("SELECT * from ClientTable");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
   	
    $outp .= '{"Name":"'  . $rs["clientName"] . '",';
    $outp .= '"id":"'  . $rs["id"] . '",';
    $outp .= '"phoneNumber":"'  . $rs["phoneNumber"] . '",';
    $outp .= '"Address":"'   . $rs["Address"]        . '",';
    $outp .= '"City":"'   . $rs["city"]        . '",';
    $outp .= '"ZipCode":"'   . $rs["zip"]        . '",';
    $outp .= '"Country":"'   . $rs["Country"]        . '",';
    $outp .= '"Request":"'   . $rs["requestText"]        . '",';
    $outp .= '"marker":"'. $rs["marker"]     . '"}'; 
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);


?>