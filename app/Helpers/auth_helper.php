<?php

// This is a helper function that checks if the user is logged in and returns the user object if they are, or null if they aren't.
// All helpers are named with _helper at the end of the file name.
if(!function_exists('is_logged_in')) {
    function current_user() {
       $auth = new \App\Libraries\Authentication();
       return $auth->getCurrentUser();
    }
}