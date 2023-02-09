<?php

$data = json_decode(file_get_contents('data/users.json'), true);
// print_r($data);

if (!empty($_POST)) {

    $idExists = array_filter($data, function ($user) {
        if ($user['id'] === $_POST['id']) return true;

        return false;
    });

    $params = [
        'page' => 'signup',
        'message' => 'Toks vartotojo ID jau egzistuoja',
        'status' => 'danger'
    ];

    if (!empty($idExists)) {
        header('Location: ?' . http_build_query($params));
        exit;
    }

    $_POST['password'] = md5($_POST['password']);
    $data[] = $_POST;

    file_put_contents('data/users.json', json_encode($data), true);

    $_SESSION['user'] = $_POST;

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

<div class="container signup">
    <form method="POST" class="mt-5">

        <?php include('views/alerts.php') ?>

        <h2 class="text-center">Naujas vartotojas</h2>
        <div class="mb-3">
            <label>ID</label>
            <input type="text" name="id" class="form-control" placeholder="ID" required />
        </div>
        <div class="mb-3">
            <label>Vardas</label>
            <input type="text" name="name" class="form-control" placeholder="Vardenis" required />
        </div>
        <div class="mb-3">
            <label>Pavardė</label>
            <input type="text" name="last_name" class="form-control" placeholder="Pavardenis" required />
        </div>
        <div class="mb-3">
            <label>Slaptažodis</label>
            <input type="text" name="password" class="form-control" required />
        </div>
        <button class="btn btn-primary">Sukurti vartotoją</button>
    </form>
</div>