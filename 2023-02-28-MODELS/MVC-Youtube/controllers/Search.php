<?php

namespace Controllers;

use Model\Videos;

class Search {
    public static function search() {
        $searchingFor = $_GET['search'];

        $videos = new Videos;
        $results = $videos->searchFor($searchingFor);

        include ("views/search.php");
    }
}