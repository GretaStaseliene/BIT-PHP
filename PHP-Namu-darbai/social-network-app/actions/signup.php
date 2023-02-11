<?php
if (!empty($_POST)) {
    $data = [];

    if (file_exists('database.json'))
        $data = json_decode(file_get_contents('database.json'), true);

    // if(isset($data[$_POST['id']])) {
    //     echo 'Toks ID jau užregistruotas';
    //     exit;
    // }
    $emailExists = array_filter($data, function ($user) {
        if ($user['email'] === $_POST['email']) return true;

        return false;
    });

    $params = [
        'page' => 'signup',
        'message' => 'Toks ID jau egzistuoja',
        'status' => 'danger'
    ];

    if (!empty($emailExists)) {
        $params['message'] = 'Toks el. pastas jau egzistuoja';
    }

    if (array_key_exists($_POST['id'], $data) or !empty($emailExists)) {
        header('Location: ?' . http_build_query($params));
        exit;
    }

    $_POST['created_at'] = date('Y-m-d h:i:s');
    $_POST['password'] = md5($_POST['password']);

    $data['users'][$_POST['id']] = $_POST;

    file_put_contents('database.json', json_encode($data));

    $_SESSION['user'] = $data['users'][$_POST['id']];

    header('Location: ?page=main');
}
?>


<form method="POST" class="signup">
    <h1>Registracija</h1>

    <?php include('views/alerts.php'); ?>

    <div class="mb-3">
        <label>El. pastas</label>
        <input type="email" name="email" placeholder="test@gmail.com" class="form-control" required />
    </div>
    <div class="mb-3">
        <label>Slaptazodis</label>
        <input type="password" name="password" class="form-control" required />
    </div>
    <div class="mb-3">
        <label>Vardas</label>
        <input type="text" name="first_name" placeholder="John" class="form-control" required />
    </div>
    <div class="mb-3">
        <label>Pavarde</label>
        <input type="text" name="last_name" placeholder="Smith" class="form-control" required />
    </div>
    <div class="mb-3">
        <label>ID</label>
        <input type="text" name="id" placeholder="@" class="form-control" required />
    </div>

    <button class="btn btn-primary">Registruotis</button>
</form>