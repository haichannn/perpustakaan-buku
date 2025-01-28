<?php

include_once "./models/searchBooks.php";

function SearchHelper($keywordSearch)
{
    $resultSearch = SearchBooks($keywordSearch);

    return (mysqli_num_rows($resultSearch) > 0) ? $resultSearch : null;
}
