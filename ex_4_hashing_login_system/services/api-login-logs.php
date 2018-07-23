<?php

//Log the successful login attempt
// - called by login($email, $pass)
// - requires: user id and the database connection
function logSuccessfulLogin($user_id, $db) {
    //Create login message
    $error_msg = 'Login success.';
    $log_success = 1;

    $stmt = $db->prepare('INSERT INTO login_logs (user_id, error_type, login_state) VALUES (:user_id, :error_msg, :log_success)');
    $stmt->bindValue(':user_id', $user_id);
    $stmt->bindValue(':error_msg', $error_msg);
    $stmt->bindValue(':log_success', $log_success);
    $stmt->execute();
}

//Log the unsuccessful login attempt
//If the users email matches any in the database
// - called by login($email, $pass)
// - requires: user email and the database connection
function logUnsuccesfulLogin($email_sanitized, $db) {
    //Retreive the data from the database if it matches the data entered
    $stmt = $db->prepare('SELECT id FROM users WHERE email=:email');
    $stmt->bindValue(':email', $email_sanitized);
    $stmt->execute();

    if ($user = $stmt->fetchObject()) {

        $user_id = $user->id;
        $error_msg = 'Possible attack - incorrect password';
        $log_success = 0;

        $stmt = $db->prepare('INSERT INTO login_logs (user_id, error_type, login_state) VALUES (:user_id, :error_msg, :log_success)');
        $stmt->bindValue(':user_id', $user_id);
        $stmt->bindValue(':error_msg', $error_msg);
        $stmt->bindValue(':log_success', $log_success);
        $stmt->execute();
    } else {
        echo "<p>Anonymous attack</p>";
    }
}

//Log the locked account
// - called in lockUserAccount() in api-lock-account
// - requires: user id and the database connection
function logLockedLogin($user_id, $db) {
    //set the account to lock
    $error_msg = 'Login error - Lock login via timeout';
    $lockAccount = 1;

    $stmt = $db->prepare('INSERT INTO users (is_locked) VALUES (:lock_account) WHERE user_id =:user_id');
    $stmt->bindValue(':user_id', $user_id);
    $stmt->bindValue(':lock_account', $lockAccount);
    $stmt->execute();
}
