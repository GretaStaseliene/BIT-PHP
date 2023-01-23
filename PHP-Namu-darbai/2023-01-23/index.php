<?php

    // Sugeneruokite masyvą iš 30 elementų (indeksai nuo 0 iki 29), kurių reikšmės yra atsitiktiniai skaičiai nuo 5 iki 25.

    echo '<h2>Sugeneruokite masyvą iš 30 elementų (indeksai nuo 0 iki 29), kurių reikšmės yra atsitiktiniai skaičiai nuo 5 iki 25.</h2>';

    $array = array();

    for($i = 0; $i < 30; $i++) {
        $array[$i] = rand(5, 25);
    }

    print_r($array);

    // Sugeneruokite masyvą, kurio reikšmės atsitiktinės raidės A, B, C ir D, o ilgis 200. 

    echo '<h2>Sugeneruokite masyvą, kurio reikšmės atsitiktinės raidės A, B, C ir D, o ilgis 200. </h2>';

    $array2 = array();

    $letters = 'ABCD';

    for($i = 0; $i < 200; $i++) {
        $letter = $letters[rand(0, 3)];
        $array2[$i] = $letter;
    }

    print_r($array2);

    echo '<h2>Sugeneruokite 3 masyvus pagal 2 uždavinio sąlygą. Sudėkite masyvus, sudėdami reikšmes pagal atitinkamus indeksus. </h2>';

    $array1 = array();
    $array2 = array();
    $array3 = array();
    $array4 = array();

    for($i = 0; $i < 200; $i++) {
        $letter = $letters[rand(0, 3)];
        $array1[$i] = $letter;
    }

    for($i = 0; $i < 200; $i++) {
        $letter = $letters[rand(0, 3)];
        $array2[$i] = $letter;
    }

    for($i = 0; $i < 200; $i++) {
        $letter = $letters[rand(0, 3)];
        $array3[$i] = $letter;
    }

    for($i = 0; $i < 200; $i++) {
        $array4[$i] = $array1[$i] . $array2[$i] . $array3[$i];
    }
    
    echo 'Pirmas masyvas: ';
    print_r($array1);
    echo '<br>';
    echo '<br>';
    echo 'Antras masyvas: ';
    print_r($array2);
    echo '<br>';
    echo '<br>';
    echo 'Trecias masyvas: ';
    print_r($array3);
    echo '<br>';
    echo '<br>';

    echo 'Ketvirtas masyvas: ';
    print_r($array4);
    echo '<br>';
    echo '<br>';

    echo '<h2>Nupieškite kvadratą iš “*”, kurio kraštines sudaro 100 “*”. Panaudokite css stilių, kad kvadratas ekrane atrodytų kvadratinis. Nupieštam kvadratui nupieškite raudonas įstrižaines.
    </h2>';


    for($i = 0; $i < 100; $i++) {
        for($j = 0; $j < 100; $j++) {
            if($i === $j || $j === (100 - $i)) {
                echo '<span style="color:red;">*</span>';
            } else {
                echo '*';
            }
        }
        echo '<br>';
    }
    
?>