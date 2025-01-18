<?php

function Logged_in_Helper() {
    $logged_in = (isset($_SESSION["logged_in"])) ? true : false;

    // Jika user belum login dan tidak ada session
    if (!$logged_in && !$logged_in === true )
    {
        return false;
    } 
    
    return true;
}

?>