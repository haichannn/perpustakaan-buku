<?php

/**
 * this function utility hash password
 * 
 * @return string 
 **/

function HashPasswordUtil(string $passwordInput) {
    $hashPass = password_hash($passwordInput, PASSWORD_BCRYPT);
    return $hashPass;
}
