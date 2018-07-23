<?php
// get the data being sent
// GET - pass simple data
// everything in computers have an ID
// the ID is and must be unique
$sUniqueId = uniqid();
$dataposted = $_GET;


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
// create a key and assign a value to the object
$usrSession->usrsession = '{}';
$usrSession->usrsession = $dataposted;



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