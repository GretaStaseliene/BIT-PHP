<?php

if (!isset($_SESSION['id'])) {
    header('Location: index.php');
}

$user = [
    "id" => "65451351",
    "password" => "1234",
    "account" => " LT5515615616515615",
    "name" => "Motiejus",
    "surname" => "Aleksandravičius",
    "ammount" => 9.99
];

?>

<div class="container account">
    
    <div class="card">
        <div class="card-header">
           <h4><?= $user['name'] . ' ' . $user['surname']; ?> </h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Sąskaitos numeris</h5>
            <p><?= $user['account']; ?></p>
            <h5>Sąskaitos likutis</h5>
            <p class="card-text"><?= $user['ammount']; ?> €</p>
            <div>
        <a href="?page=logout" class="btn btn-danger">Atsijungti</a>
    </div>
        </div>
    </div>
</div>