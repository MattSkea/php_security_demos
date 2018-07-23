<?php

////Compares sanitized strings
// - called by api-login-get-user
function compareSanitizedStr($originalStr, $sanitizedStr) {
    //Count the credentials strings
    $originalStrLength = strlen($originalStr);
    $sanStrLength = strlen($sanitizedStr);

    //Placeholder boolean to check if the string lenths are the same length
    $stringsAreIdentical = 0;

    //Compare the strings
    if ($originalStrLength == $sanStrLength) {
        // echo "<h4 style='color:green'>No illegal characters found</h4>";

        $stringsAreIdentical = 1;
        return $stringsAreIdentical;
    } else if ($originalStrLength != $sanStrLength) {
        // echo "<h4 style='color:red'>Possible attack - the user entered illegal characters</h4>";

        $stringsAreIdentical = 0;
        return $stringsAreIdentical;
    }

    //Returns true if the strings are identical and false if they don't match
    return $stringsAreIdentical;
}