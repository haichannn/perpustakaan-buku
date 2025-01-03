<?php

/**
 * this function for alert util to send user information 
 **/

function Alert(string $message, bool $condition): string
{
    $conditionResult = ($condition) ? 'success' : 'danger';

    return "
                <div class='alert alert-$conditionResult alert-dismissible fade show' role='alert'>
                    $message
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            ";
}