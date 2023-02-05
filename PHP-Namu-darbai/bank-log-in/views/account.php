<?php

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

// print_r($_SESSION['user']->$name);
$data = file_get_contents('database.json');
$users = json_decode($data, true);

foreach ($users as $index => $user) {
    $user['name'] = $user['name'];
    $user['last_name'] = $user['last_name'];
    $user['iban'] = $user['iban'];
    $user['ammount'] = $user['ammount'];
    $user['index'] = $index;
}

?>

<div class="container account">

    <div class="card">
        <div class="card-header">
            <h4><?= $user['name'] . ' ' . $user['last_name']; ?> </h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Sąskaitos numeris</h5>
            <p><?= $user['iban']; ?></p>
            <h5>Sąskaitos likutis</h5>
            <p class="card-text"><?= $user['ammount']; ?> €</p>
            <div>
                <a href="?page=logout" class="btn btn-danger">Atsijungti</a>
            </div>
        </div>
    </div>
</div>