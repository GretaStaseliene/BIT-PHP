<?php
    $kintamasis = '<h1>Tai yra kintamojo reiksme</h1>';
    echo $kintamasis;
    // reiksmes keitimas
    $kintamasis = 10;
    echo '<h1>' . $kintamasis . '</h2>';
    // inkrementas
    $kintamasis++;
    echo '<h1>' . $kintamasis . '</h2>';
    // dekrementas
    $kintamasis--;
    echo '<h1>' . $kintamasis . '</h2>';
    // atimtis
    $kintamasis = $kintamasis - 20;
    echo '<h1>' . $kintamasis . '</h2>';
    // sudetis
    $kintamasis = $kintamasis + 50;
    echo '<h1>' . $kintamasis . '</h2>';
    // daugyba
    $kintamasis = $kintamasis * 2;
    echo '<h1>' . $kintamasis . '</h2>';
    //dalyba
    $kintamasis = $kintamasis / 2;
    echo '<h1>' . $kintamasis . '</h2>';

    $kinatmasis = 10;

    // atimtis is esamojo kintamojo
    $kintamasis -= 20;
    echo '<h1>' . $kintamasis . '</h2>';
    // sudetis is esamojo kintamojo
    $kintamasis += 50;
    echo '<h1>' . $kintamasis . '</h2>';
    // daugyba is esamojo kintamojo
    $kintamasis *= 2;
    echo '<h1>' . $kintamasis . '</h2>';
    //dalyba is esamojo kintamojo
    $kintamasis /= 2;
    echo '<h1>' . $kintamasis . '</h2>';

    $pimras = 5;
    $antras = 80;

    echo '<h3>Rezultatas' . ($pimras - $antras) * 3 . '</h3>';

    $trecias = 3.587;

    echo '<h4>' . $trecias . '<h/4>';

    // Klasikinis masyvo aprasymas
    $masyvas = array('raktinis_zodis' => 'jo reiksme');

    // print_r funkcija skirta atvaizduoti masyvus
    print_r($masyvas);
    
    echo '<br>';

    var_dump($masyvas);

    echo '<br>';

    $masyvas = array(15, 20, 30, 10.2, 18);
    var_dump($masyvas);

    echo '<br>';

    $masyvas = [15, 20, 30, 10.2, 18];
    var_dump($masyvas);

    echo '<br>';
    
    $masyvas = ['pirmas_raktas' => 15, 1 => 20, true => 30, 3 => 10.2, 4 => 18];

    var_dump($masyvas);

    echo '<br>';

    echo $masyvas['pirmas_raktas'];
    unset($masyvas['pirmas_raktas']);

    echo '<br>';
    
    var_dump($masyvas);

    echo '<br>';

    $masyvas[1] = 'Pakeista reiksme';
    var_dump($masyvas);

    $raktas = 3;

    echo '<br>';

    $masyvas[$raktas] = 'Kintamojo pagalba surastas elementas';
    var_dump($masyvas);

    echo '<br>';
    
    $masyvas['raktazodis'] = 'Naujai prideta reiksme su raktazodziu';

    var_dump($masyvas);

    echo '<br>';

    for($i = 0; $i < 100; $i++) {
        echo $i . ' cikle aprasyta eilute <br>';
    }

    echo '<br>';

    for($i = 0; $i < 100; $i++) {
        echo $i . ' cikle aprasyta eilute ir sugeneruotas skaicius: ' . rand(0, 500) . '<br>';
    }
?>