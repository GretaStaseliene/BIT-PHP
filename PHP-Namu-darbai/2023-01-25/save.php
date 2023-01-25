<!-- 1. Sukurkite failą: save.php, kuriame parašykite programą kuri, toje pačioje direktorijoje,
sukurtų failą skaičius.txt ir jame išsaugotų atsitiktinį stringą sudarytą iš 3 lotyniškų mažųjų raidžių.

2. Sukurkite failą: catch.php, kuriame aprašykite programą kuri generuotų stringą pagal prieš tai buvusią taisyklę ir ją sutikrintų su prieš tai faile išsaugota reikšme. Jei šie du stringai nesutampa veiksmą kartokite tol kol jie abu bus vienodi, o naršyklėje išveskite visus sugeneruotus stringus rezultatui gauti.

3. Pabandykite apsunkinti užduotį didinant simbolių kiekį, patikrinkite kokį didžiausią kiekį operacijų gali atlikti jūsų kompiuteris.
 -->

<?php

    // Pirma uzduotis

    if(!is_dir('skaicius.txt')) {
        mkdir('skaicius.txt');
    }

    $letters = 'abcdefghijklmnopqrstuvwxyz';
    $randomString = '';

    for($i = 0; $i < 3; $i++) {
        $letter = $letters[rand(0, 25)];
        $randomString .= $letter;
    }
    //echo $randomString;

    file_put_contents('skaicius.txt/skaicius.txt', $randomString);

    // Antra uzduotis


?>