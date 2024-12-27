<?php

/**
 * parse int util
 *
 * this function for parse string to integer
 *
 * @param string
 * @return int
 * 
 **/
function ParseStrToInt(string $dataStr): int
{
    $resultParse = intval($dataStr);
    return $resultParse;
}

?>