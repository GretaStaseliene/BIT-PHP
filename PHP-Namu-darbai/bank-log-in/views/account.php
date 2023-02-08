<?php

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

if ($_SESSION['user']->role === '1') {
    header('Location: ?page=admin');
    exit;
}

$action = isset($_GET['action']) ? $_GET['action'] : '';
$data = json_decode(file_get_contents('database.json'));
$id = $_SESSION['user']->id;
$useris = ($_SESSION['user']);

if (!empty($_POST) and $action === 'transfer') {
    $currentUser = [];
    $transferPrice = 0.43;

    foreach ($data as $user) {
        if ($user->id === $id) {
            $currentUser = $user;
        }
    }

    if (($_POST['sum'] + $transferPrice) > $currentUser->ammount) {
        header('Location: ?page=account&message=Nepakankamas sąskaitos likutis&status=danger');
        exit;
    }

    foreach ($data as $key => $user) {
        if ($_POST['receiver'] === $user->id) {
            $data[$key]->ammount += $_POST['sum'];
            $data[$key]->payment_history[] = [
                'date' => date("Y-m-d H:i:s"),
                'from' => $useris->name . ' ' . $useris->last_name,
                'to' => $user->name . ' ' . $user->last_name,
                'received' => true,
                'ammount' => $_POST['sum']
            ];
        }

        if ($id === $user->id) {
            $data[$key]->ammount -= $_POST['sum'] + $transferPrice;
            $data[$key]->payment_history[] = [
                'date' => date("Y-m-d H:i:s"),
                'from' => $useris->name . ' ' . $useris->last_name,
                'to' => $_POST['receiver']->name . ' ' . $_POST['receiver']->last_name,
                'received' => false,
                'ammount' => $_POST['sum']
            ];  
        }
    }

    file_put_contents('database.json', json_encode($data));

    header('Location: ?page=account&message=Pevedimas sekmingai atliktas&status=success');

    exit;
}

//Duomenų išfiltravimas aprašant savo ciklą
// $recipients = [];

// foreach($data as $user) {
//     if($user->role != '1' AND $user->id != $id)
//         $recipients[] = $user;
// }

//Duomenų filtravimas pasitelkiant funkcija. issfiltravome admina is receiveriu saraso
$receivers = array_filter($data, function ($user) {
    if ($user->role != '1' and $user->id != $_SESSION['user']->id)
        return $user;
});

// $user_data = array_filter($data, function($user) {
//     if($user->id === $_SESSION['user']->id)
//         return $user;
// });

?>

<div class="container account">
    <?php if (isset($_GET['message'])) : ?>
        <div class="alert alert-<?= $_GET['status'] ?>">
            <?= $_GET['message'] ?>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header">
            <h4><?= $useris->name . ' ' . $useris->last_name; ?> </h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Sąskaitos numeris</h5>
            <p><?= $useris->iban; ?></p>
            <h5>Sąskaitos likutis</h5>
            <p class="card-text"><?= $useris->ammount; ?> €</p>
            <div class="buttons float-start">
                <a href="?page=account&action=transfer" class="btn btn-success">Naujas pavedimas</a>
                <a href="?page=account&action=payment_history" class="btn btn-success">Pavedimų istorija</a>
                <a href="?page=logout" class="btn btn-danger">Atsijungti</a>
            </div>
        </div>
    </div>

    <?php if ($action === 'transfer') : ?>

        <form method="POST">
            <div class="mb-3">
                <label>Pavedimo gavėjas</label>
                <select name="receiver" class="form-control">
                    <?php foreach ($receivers as $account) : ?>
                        <option value="<?= $account->id ?>"><?= $account->name . ' ' . $account->last_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Pavedimo suma</label>
                <input type="number" step="0.01" name="sum" class="form-control">
            </div>
            <button class="btn btn-success">Siųsti</button>
        </form>

    <?php endif; ?>

    <?php if($action === 'payment_history') : ?>

        <table class="table">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Siuntėjas</th>
                    <th>Gavėjas</th>
                    <th>Suma</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($useris->payment_history as $data) : ?>
                    <tr>
                        <td><?= $data->date ?></td>
                        <td><?= $data->from ?></td>
                        <td><?= $data->to ?></td>
                        <td><?= $data->ammount ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php endif; ?>
</div>