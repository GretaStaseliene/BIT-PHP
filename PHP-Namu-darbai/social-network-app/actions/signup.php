<?php

$data = json_decode(file_get_contents('database.json'));

if (!empty($_POST)) {

    $data[] = $_POST;

    file_put_contents('data/users.json', json_encode($data), true);

    header('Location: ?page=main');
    exit;
}

?>

<div class="d-flex justify-content-center">
    <div class="text-center">
        <div class="float-start">
            <h2>Džiaugaimės, kad nusprendėte užsiregistruoti svetainėje</h2>
            <p>Teisingai užpildykite visus duomenis</p>
        </div>
    </div>
</div>

<div class="container">
    <form method="POST" class="mt-5">
        <h2>Naujas vartotojas</h2>
        <div class="mb-3">
            <label>ID</label>
            <input type="text" name="id" class="form-control" require />
        </div>
        <div class="mb-3">
            <label>Vardas</label>
            <input type="text" name="name" class="form-control" require />
        </div>
        <div class="mb-3">
            <label>Pavardė</label>
            <input type="text" name="last_name" class="form-control" require />
        </div>
        <div class="mb-3">
            <label>Slaptažodis</label>
            <input type="text" name="password" class="form-control" require />
        </div>
        <button class="btn btn-primary">Sukurti vartotoją</button>
    </form>
</div>