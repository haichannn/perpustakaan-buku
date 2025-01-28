<?php

/**
 * this function for utilty verify password
 *
 **/

function VerifyPassword (string $passwordInput, string $passwordFromDb): bool 
{
    return password_verify($passwordInput, $passwordFromDb);
}