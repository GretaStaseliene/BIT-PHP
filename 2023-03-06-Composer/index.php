<?php

require_once('vendor/autoload.php');

// echo 'Kazkas vyksta';

// echo '<br>';

// \Greta\FirstApp\Hello::say();

// echo '<br>';

// echo \Greta\FirstApp\folderis\Goodbye::bye();

$climate = new League\CLImate\CLImate;

$climate->red('Whoa now this text is red.');
$climate->blue('Whoa now this text is blue.');

for($i = 0; $i < 10; $i++) {
    $climate->green('Green text');
}

?>