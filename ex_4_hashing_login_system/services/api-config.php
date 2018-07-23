<?php
	//Create a random pepper 
$pepper_secrect = 'Thisipp';

//Get the peppers length, this is used to slow down encryption
// $pepperSentenceLength = strlen($pepper_secrect);
//Pepper option container
// $pepper_options = ['cost' => $pepperSentenceLength];

// $pepper_options = ['cost' => $pepperSentenceLength];

function setPepper(){
	//Create a random pepper 
	return $pepper_secrect = 'Thisipepperftw';
}

function getConfigOptions(){

	$pepper = setPepper();
	$cost = strlen($pepper);
	$options = [
		'peppercost' => ['cost' => $cost], 
		'pepper' => $pepper];

		return 	$options;
	}
}
?>