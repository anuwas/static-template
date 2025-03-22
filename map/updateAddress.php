<?php
	include 'dbConnection.php';
	
	$clientName='';
	$phoneNumber='';
	$Address='';
	$city='';
	$zip='';
	$Country='';
	$requestText='';
	$marker='';
	
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $id=$request->id;
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
    if(isset($request->Country)){
    	$Country=$request->Country;
    }
    if(isset($request->requestText)){
    	$requestText=$request->requestText;
    }
    if(isset($request->marker)){
    	$marker=$request->marker;
    }
    
    $latlong=getLatitudeLongitude($Address.','.$city.','.$zip);
    $latlongarr=explode("_",$latlong);
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "UPDATE ClientTable set clientName='".$clientName."',Address='".$Address."',phoneNumber='".$phoneNumber."',city='".$city."',zip='".$zip."',Country='".$Country."',requestText='".$requestText."',lat='".$latlongarr[0]."',lng='".$latlongarr[1]."',marker='".$marker."' where id=$id";
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