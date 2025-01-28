<?php

/**
 * this function utility hash password
 * 
 * @return string 
 **/

function HashPasswordUtil(string $passwordInput) {
    return password_hash($passwordInput, PASSWORD_BCRYPT);
}
