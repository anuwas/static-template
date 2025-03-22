<?php
	include 'dbConnection.php';
	$clientName='';
	$phoneNumber='';
	$Address='';
	$city='';
	$zip='';
	$Country='';
	$requestText='';
	
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    if(isset($request->clientName)){
    	$clientName=$request->clientName;
    }
    if(isset($request->phoneNumber)){
    	$phoneNumber=$request->phoneNumber;
    }
    if(isset($request->Address)){
    	$Address=$request->Address;
    }
    if(isset($request->city)){
    	$city=$request->city;
    }
    if(isset($request->zip)){
    	$zip=$request->zip;
    }
    if(isset($request->requestText)){
    	$requestText=$request->requestText;
    }
    
    $latlong=getLatitudeLongitude($Address.','.$city.','.$zip);
    $latlongarr=explode("_",$latlong);
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO ClientTable (clientName, Address, city,zip,requestText,lat,lng)
		VALUES ('".$clientName."','".$Address."','".$city."','".$zip."','".$requestText."','".$latlongarr[0]."','".$latlongarr[1]."')";
    $conn->query($sql);
    
    function getLatitudeLongitude($clientaddress){
    	$latitude='';
    	$longitude='';
    	$address = $clientaddress;
    	$geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');
    	$geo = json_decode($geo, true);
    	if ($geo['status'] = 'OK') {
    		$latitude = $geo['results'][0]['geometry']['location']['lat'];
    		$longitude = $geo['results'][0]['geometry']['location']['lng'];
    	}
    
    	return $latitude.'_'.$longitude;
    }
    
?>