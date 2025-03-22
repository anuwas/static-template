<?php
include 'dbConnection.php';
$iconURLPrefix = 'http://maps.google.com/mapfiles/ms/icons/';
$jsonaddress=array();


$mysqli = new mysqli($servername, $username, $password, $dbname);
$result = mysqli_query($mysqli,"SELECT * FROM ClientTable");

$total_results =mysqli_num_rows($result);

while ( $row = $result->fetch_assoc() ){
	$jsonaddress[]=array('lat'=>$row['lat'],'lng'=>$row['lng'],'name'=> $row['clientName'],
      'address1'=>$row['Address'],
	  'address2'=>$row['city'].','.$row['zip'].','.$row['Country'],
	  'phone'=>$row['phoneNumber'],
	  'servicerequest'=>$row['requestText'],
	  'postalCode'=>$row['zip'],
			
	  'icon'=>$iconURLPrefix.$row['marker']
	);
     }
     print_r(json_encode($jsonaddress));
?>