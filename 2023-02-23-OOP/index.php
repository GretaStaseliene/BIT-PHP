<?php

class Klase {
    // Savybes (property)
    public $savybe = 'Labas pasauli';
    //public $savybe;
    const URL = 'https://google.com';

    // Prieigos modifikatoriai (access modifiers)
    // public - viesas prieinamumas
    // private - 
    // protected savybe

    // Automatiskai inicijuojamas metodas po klases paleidimo
    function __construct($labas) {
        if($labas) {
            $this->savybe = $labas;
        }
    }

    // Metodai
    public function funkcija() {
        $this->savybe = 'Paskaita prasidejo';
    }

    public function adresas() {
        // self raktazodis nurodo kreipamasi i klase
        // scope resolution operatorius = "::"
        return file_get_contents(self::URL);
    }
}

// Klase issaukimas ir instancijos (instance) grazinimas
$klase = new Klase('Konstruktorius suveike');
$klase1 = new Klase(false);
$klase2 = new Klase('Siandien ziniose');

// Savybes iskvietimas vykdomas su arrow operatoriumi
echo $klase->savybe;

// Metodo iskvietimas
echo $klase->funkcija();

// Konstantos susigrazinimas is klases
echo '<br>' . Klase::URL;
echo '<br>' . $klase::URL;

// Google.com duomenu paemimas
//echo $klase->adresas();

echo '<pre>';
var_dump($klase);
var_dump($klase1);
var_dump($klase2);


echo '<h2>Statines savybes ir metodai</h2>';
// Statines savybes ir metodai
class StatineKlase {
    // inkapsuliacija - duomenu slepimas
    public static $vardas = 'Jonas <br>';

    public static function keistiVarda() {
        self::$vardas = 'Petras <br>';
    }

    public $pavarde;

    public function __construct($pavarde) {
        $this->pavarde = $pavarde;
    }
}

echo StatineKlase::$vardas;

StatineKlase::keistiVarda();

echo StatineKlase::$vardas;


$klase1 = new StatineKlase('Petraitis');
$klase2 = new StatineKlase('Adomaitis');
$klase3 = new StatineKlase('Jonaitis');
echo "<pre></pre>";
var_dump($klase1);
var_dump($klase2);
var_dump($klase3);

?>