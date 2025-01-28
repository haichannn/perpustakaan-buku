<?php

function InputSanitize($dataInput)
{
    $sanitize_data_array = [];

    foreach ($dataInput as $key => $value) {
        $sanitizeTrim = trim($value);
        $sanitizerChars = htmlspecialchars($sanitizeTrim, ENT_QUOTES);
        $sanitize_data_array[$key] = $sanitizerChars;
    }

    return $sanitize_data_array;
}
