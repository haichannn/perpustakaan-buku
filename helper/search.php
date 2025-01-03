<?php

include_once "./model/searchBooks.php";


function SearchHelper($keywordSearch)
{
    $resultSearch = SearchBooks($keywordSearch);

    if (mysqli_num_rows($resultSearch) > 0) {;
        return $resultSearch;
    } else {
        return null;
    }
}
