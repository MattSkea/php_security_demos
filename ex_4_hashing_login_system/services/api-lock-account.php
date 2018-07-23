<?php

require_once 'api-connection.php';
require_once 'api-login-logs.php';

function lockUserAccount($userId, $db) {
    //Get the users login records
    $stmt = $db->prepare('SELECT * FROM login_logs WHERE user_id =:userId ORDER BY active_date DESC LIMIT 3');
    $stmt->bindValue(':userId', $userId);
    $stmt->execute();
    //Selected rows place holder
    $rows = array();

    $i = 0;
    //Retreive all the users login attempts
    while ($user_logs = $stmt->fetchObject()) {
        $rows[] = $user_logs;
    }
    //Count amount of objects in array
    $log_row_count = sizeof($rows);
    $log_login_error_count = 0;

    //Flag user login 1 = true
    $time_diff = "";


    
/*echo "<br>";*/
    //Iterate over each object in array
    for ($i = 0; $i < $log_row_count; $i++) {
        //Extract users login data from db
        $login_states = $rows[$i]->login_state;
        $login_datetime = $rows[$i]->active_date;
        date_default_timezone_set('Europe/Copenhagen');
     
        $login_time = new DateTime($login_datetime);
        //Get current time
        $current_time = new DateTime();

        //Calculate the difference intime
        $time_diff = $current_time->diff($login_time);

        //Extract the differnce in days
        $time_diff_days = $time_diff->d;
        //Extract the differnce in hours
        $time_diff_hours = $time_diff->h;
        //Extract the differnce in minutes
        $time_diff_minutes = $time_diff->i;

        //Check if the user has failed to login
        if ($login_states == 0) {
            $log_login_error_count++;
        }
    }

/*
    echo "<br>";

    echo "Total failed login attempts: " . $log_login_error_count . "<br>";
    echo "<h1>$time_diff_minutes</h1>";
   */
    //Can't work with $time_diff if there is nothing in the db
   // echo "Last login attempt: " . $time_diff->format('%d days,  %H hours, %i minutes, %s seconds') . "<br>";

    //Create placeholder to check if the user has been timed out
    $user_timed_out = 0;

    //Working with the total error count and the last time that was received from the list
    if (($log_login_error_count === 3) && ($time_diff_minutes <= 1) && ($time_diff_hours >= 0)) {
        echo "<h1 style='color:red'>LOCK THE USERS ACCOUNT</h1>";
        $user_timed_out = 1;
    } else if (($log_login_error_count === 3) && ($time_diff_minutes >= 1) && ($time_diff_hours >= 0)) {
        echo "<h1 style='color:green'>UNLOCKED THE USERS ACCOUNT VIA 2 MINUTE TIMEOUT!!</h1>";

        $user_timed_out = 0;
    } 
 /* 
    echo "<p>User timed out:" . $user_timed_out . "</p>";
*/
    return $user_timed_out;
}


?>