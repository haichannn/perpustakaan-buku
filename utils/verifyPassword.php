<?php

/**
 * this function for utilty verify password
 *
 * Undocumented function long description
 *
 **/

function VerifyPassword (string $passwordInput, string $passwordFromDb): bool 
{
    $verify = password_verify($passwordInput, $passwordFromDb);
    return $verify;
}


?>