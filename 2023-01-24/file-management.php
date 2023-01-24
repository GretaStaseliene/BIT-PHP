<?php

    // Tikriname ar direktorija neegzistuoja
    if(!is_dir('failai')) {
        // Sukuriame direktorija
        mkdir('failai');
    }

    // Tikrinme ar nurodytas failas yra direktorija
    // Ta pati galime padaryti su file_exists() funkcija
    if(is_file('failai/tekstas.txt')) {
        // Istriname faila
        unlink('failai/tekstas.txt');
    } else {
        // Sukuriame faila
        file_put_contents('failai/tekstas.txt', 'Sveiki');
    }

    if(!is_dir('html')) {
        mkdir('html');
    }
    
    // Duomenu paemimas
    $html = file_get_contents('https://www.delfi.lt/');

    file_put_contents('html/delfi.html', $html);

    // rusiavimo funkcija
    //https://www.php.net/manual/en/function.sort
?>