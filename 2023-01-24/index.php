<?php

    // Konstantos deklaravimas

    define('VAISIAI', ['Obuoliai', 'Bananai', 'Abrikosai']);
    define('VARDAS', 'VILIUS');

    $zinute = 'Labas pasauli';
    $black = true;
    $white = null;
    $deepblue = 'class="deepblue"';

    $dokumentai = true;
    $kedes = false;
    $rezultatas = 'Sandelys tuscias';

    // && = AND (and)
    if($dokumentai AND $kedes) {
        $rezultatas = 'Siuo metu sandelyje turime dokumentu ir kedziu';
    }

    // || = OR (or)
    if($dokumentai OR $kedes) {
        $rezultatas = 'Siuo metu sandelyje turime dokumentu ir kedziu';
    }

    // kazkuri is reiksmiu turi buti teigiama,kad issipildyu salyga
    if($dokumentai XOR $kedes) {
        $rezultatas = 'Siuo metu sandelyje turime dokumentu ir kedziu';
    }

    $list = '<ul>';

    for($i = 0; $i < 10; $i++) {
        $list .= '<li>' . $i . '</li>';
    }

    $list .= '</ul>';

    $masyvas = [10, 20, 30, 22, 18, 36, 59];

    $didziausiasSkaicius = max($masyvas);

    $maziausiasSkaicius = min($masyvas);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funkcijos ir operatoriai</title>
    <style>
        .dark {
            background: black;
            color: white;
        }

        .deepblue {
            background: blue;
            color: white;
        }
    </style>
</head>
<!-- <body <?php echo $black ? 'class="dark"' : '' ?> > -->
<!-- <body <?= $black ? 'class="dark"' : '' ?> > -->
<body <?= $white ?? $deepblue ?> >
    <!-- Iprastas php kodo atvaizdavimas html'e -->
    <!-- <h1><?php echo $zinute; ?>!</h1> -->
    <!-- Jeigu norime atvaizduoti tik viena php kodo eilute -->
    <h1> <?= $zinute ?> !</h1>

    <p> <?= $rezultatas ?> </p>

    <?= $list ?>

    <h3>Didziausias skaicius</h3>
    <?= $didziausiasSkaicius ?>

    <h3>Maziausias skaicius</h3>
    <?= $maziausiasSkaicius ?>

    <h3>Kokia tai reiksme?</h3>

    <?php 
        $kintamasis = 10;

        if(is_array($kintamasis)) {
            echo 'Tai yra masyvas';
        }


        if(is_float($kintamasis)) {
            echo 'Tai yra skaicius po kablelio';
        }

        if(is_int($kintamasis)) {
            echo 'Tai yra sveikas skaicius';
        }

        if(is_bool($kintamasis)) {
            echo 'Tai yra boolean reiksme';
        }

        if(is_string($kintamasis)) {
            echo 'Tai yra string reiksme';
        }
    ?>

    <h3>Duomens tipas:</h3>
    <?= gettype($kintamasis) ?>

    <h3>Apvalinimas</h3>

    <?php
        // skaiciaus Pi deklaravimas
        // $pi = pi();
        // echo $pi;

        $number = 3.5;

        echo round($number, 0, PHP_ROUND_HALF_UP);
        echo '<br>';
        echo round($number, 0, PHP_ROUND_HALF_DOWN);
    ?>

    <h4>Konstantos atvaizdavimas</h4>

    <?php
        echo VARDAS;
    ?>

    <h3>Ciklai</h3>

    <?php

        // While ciklas
        // $i = 0;
        // while($i < 10) {
        //     echo 'Ciklas sukasi <br>';
        //     $i++;
        // }

        // // do while ciklas
        // $i = 0;
        // do {
        //     echo 'Ciklas sukasi <br>';
        //     $i++;
        // } while ($i < 10);

        // // For ciklas
        // for($i = 0; $i < 10; $i++) {
        //     echo 'Ciklas sukasi <br>';
        // }

        // Apskaiciuoja masyvo ilgi
        // count();
        
        for($i = 0; $i < count(VAISIAI); $i++) {
            echo VAISIAI[$i] . '<br>';
        }

        echo '<br>';

        $masyvas = ['BMW', 'Audi', 'Toyota', 'Dodge'];

        for($i = 0; $i < count($masyvas); $i++) {
            echo $masyvas[$i] . '<br>';
        }

        echo '<br>';

        // foreach ciklas
        // Norint susigrazinti tik reiksme
        foreach($masyvas as $auto) {
            echo $auto . '<br>';
        }

        echo '<br>';

        // Norint susigrazinti ir key ir reiksme
        foreach($masyvas as $index => $auto) {
            echo $auto . ' Kurio indexas: ' . $index . '<br>';
        }
        ?>

        <h3>Switch'as</h3>

        <?php

        // Switch

        $reiksme = 8;
        
        if($reiksme === 1) {
            echo 'Reiksme yra lygi 1';
        }else if($reiksme === 2) {
            echo 'Reiksme yra lygi 2';
        }else if($reiksme === 3) {
            echo 'Reiksme yra lygi 3';
        }else if($reiksme === 4) {
            echo 'Reiksme yra lygi 4';
        } else {
            echo 'Reiksmes nera';
        }

        echo '<br>';

        switch($reiksme) {
            case 1: 
                echo 'Reiksme yra lygi 1';
            break;
            case 2: 
                echo 'Reiksme yra lygi 2';
            break;
            case 3: 
                echo 'Reiksme yra lygi 3';
            break;
            case 4: 
                echo 'Reiksme yra lygi 4';
            break;
            default: 'Reiksmes nera';
        }

    ?>

    <h3>str_replace funkcija</h3>

    <?php
        $string = 'Mano batai buvo du, vienas dingo nerandu';
        $wovels = array('a', 'e', 'i', 'o', 'u');

        $newString = str_replace($wovels, '%', $string);

        echo $newString;
    ?>
</body>
</html>