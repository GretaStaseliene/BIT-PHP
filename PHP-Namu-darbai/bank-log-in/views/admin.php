<?php

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

$data = json_decode(file_get_contents('database.json'));
$action = isset($_GET['action']) ? $_GET['action'] : '';


if (!empty($_POST) and $action === 'new_user') {

    $data[] = $_POST;

    file_put_contents('database.json', json_encode($data), true);

    header('Location: ?page=admin');
    exit;
}

if (!empty($_POST) and $action === 'edit') {
    $data[$_GET['id']] = $_POST;

    file_put_contents('database.json', json_encode($data), true);

    header('Location: ?page=admin');
    exit;
}

if ($action === 'delete') {
    unset($data[$_GET['id']]);

    file_put_contents('database.json', json_encode(array_values($data)));

    header('Location: ?page=admin');
    exit;
}

?>

<div class="container">
    <h2>Sveiki prisijungę, Administratoriau!</h2>
    <div class="d-flex justify-content-end">
        <a href="?page=logout" class="btn btn-danger">Atsijungti</a>
    </div>
    <div class="d-flex">
        <a href="?page=admin&action=new_user" class="btn btn-primary mt-3 mb-3">Pridėti naują vartotoją</a>
    </div>
</div>
<div class="container">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Vardas</th>
            <th>Pavardė</th>
            <th>Sąskaitos numers</th>
            <th>Sąskaitos likutis</th>
            <th>Veiksmai</th>
        </tr>
        <?php
        foreach ($data as $index => $user) : ?>

            <tr>
                <td><?= $user->id ?></td>
                <td><?= $user->name ?></td>
                <td><?= $user->last_name ?></td>
                <td><?= $user->iban ?></td>
                <td><?= $user->ammount ?> €</td>
                <td>
                    <a href="?page=admin&action=delete&id=<?= $index ?>" class="btn btn-danger">Trinti</a>
                    <a href="?page=admin&action=edit&id=<?= $index ?>" class="btn btn-primary">Redaguoti</a>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>

    <?php if ($action === 'new_user') : ?>

        <form method="POST" class="mt-5">
            <h2>Naujas vartotojas</h2>
            <div class="mb-3">
                <label>ID</label>
                <input type="text" name="id" class="form-control" />
            </div>
            <div class="mb-3">
                <label>Vardas</label>
                <input type="text" name="name" class="form-control" />
            </div>
            <div class="mb-3">
                <label>Pavardė</label>
                <input type="text" name="last_name" class="form-control" />
            </div>
            <div class="mb-3">
                <label>Sąskaitos numeris</label>
                <input type="text" name="iban" class="form-control" />
            </div>
            <div class="mb-3">
                <label>Sąskaitos likutis</label>
                <input type="text" name="ammount" class="form-control" />
            </div>
            <div class="mb-3">
                <label>Slaptažodis</label>
                <input type="text" name="password" class="form-control" />
            </div>
            <button class="btn btn-primary">Sukurti vartotoją</button>
        </form>

    <?php endif; ?>

    <?php
    if ($action === 'edit') :
        $user = $data[$_GET['id']];
    ?>

        <form method="POST" class="mt-5">
            <h2>Naujas vartotojas</h2>
            <div class="mb-3">
                <label>ID</label>
                <input type="text" name="id" class="form-control" value="<?= $user->id ?>" />
            </div>
            <div class="mb-3">
                <label>Vardas</label>
                <input type="text" name="name" class="form-control" value="<?= $user->name ?>" />
            </div>
            <div class="mb-3">
                <label>Pavardė</label>
                <input type="text" name="last_name" class="form-control" value="<?= $user->last_name ?>" />
            </div>
            <div class="mb-3">
                <label>Sąskaitos numeris</label>
                <input type="text" name="iban" class="form-control" value="<?= $user->iban ?>" />
            </div>
            <div class="mb-3">
                <label>Sąskaitos likutis</label>
                <input type="text" name="ammount" class="form-control" value="<?= $user->ammount ?>" />
            </div>
            <div class="mb-3">
                <label>Slaptažodis</label>
                <input type="text" name="password" class="form-control" value="<?= $user->password ?>" />
            </div>
            <button class="btn btn-primary">Redaguoti</button>
        </form>
    <?php endif; ?>
</div>