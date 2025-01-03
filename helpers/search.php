<?php

include_once "./models/searchBooks.php";


function SearchHelper($keywordSearch)
{
    $resultSearch = SearchBooks($keywordSearch);

    if (mysqli_num_rows($resultSearch) > 0) {;
        return $resultSearch;
    } else {
        return null;
    }
}
