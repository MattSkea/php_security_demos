<?php
// get the data being sent
// GET - pass simple data
// everything in computers have an ID
// the ID is and must be unique
$sUniqueId = uniqid();
$dataposted = $_GET;
$datePosted = date('Y-m-d H:i:s');
$remoteAddr = $_SERVER['REMOTE_ADDR'];
$remoteHost = $_SERVER['REMOTE_HOST'];
$clientIp = $_SERVER['HTTP_CLIENT_IP'];
$forwarderFor = $_SERVER['HTTP_X_FORWARDED_FOR'];

// Create an empty array that may contain data after
$usersSessions = [];
// open the file and get the contents of it
$userSessionTxt = file_get_contents( "userssessiondata.txt" );
if( $userSessionTxt != null ){
	// At this moment I have text and text only
	// convert the text to an object
	$usersSessions = json_decode( $userSessionTxt ); // array with json
}

// Create a string that looks like JSON
$userSession = '{}';
// create a JSON object for the data 
$usrSession = json_decode( $userSession );
// add a new key/property to the object - Id

$usrSession->id = $sUniqueId;
$usrSession->dateRetrieved = $datePosted;
if($remoteAddr != null){
	$usrSession->remoteAddr = $remoteAddr;
}
if($remoteHost != null){
	$usrSession->remoteHost = $remoteHost;
}
if($clientIp != null){
	$usrSession->clientIp = $clientIp;
}
if($clientIp != null){
	$usrSession->forwarderFor = $forwarderFor;
}
// create a key and assign a value to the object
$usrSession->usrSession = '{}';
$usrSession->usrSession = $dataposted;



// push the json object to the array
//array_push( $usersSessions , $usrSession );
$usersSessions[] =  $usrSession;
// NOW THE OPPOSITE
// convert the array to text and make it look nice
$userSessionTxt2 = json_encode( $usersSessions , JSON_PRETTY_PRINT );

// echo $sajProperties;
// save the text back to the file 
file_put_contents( "userssessiondata.txt" , $userSessionTxt2 );

?>