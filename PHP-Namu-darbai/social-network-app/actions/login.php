<?php
if (!empty($_POST)) {
    $params = [
        'page' => 'login',
        'message' => 'Duomenu bazeje nieko nerasta',
        'status' => 'danger'
    ];

    if (!file_exists('database.json')) {
        header('Location: ?' . http_build_query($params));
        exit;
    }

    $data = json_decode(file_get_contents('database.json'), true);

    $userExists = array_filter($data['users'], function ($user) {
        if (
            $user['email'] === $_POST['email'] and
            $user['password'] === md5($_POST['password'])
        ) return true;

        return false;
    });

    if (empty($userExists)) {
        $params['message'] = 'ID arba slaptazodis ivestas neteisingai';
        header('Location: ?' . http_build_query($params));
        exit;
    }

    $_SESSION['user'] = $userExists[array_key_first($userExists)];

    header('Location: ?page=main');
}
?>


<form method="POST" class="login">

    <?php include('views/alerts.php'); ?>
    
    <h1>Prisijungti</h1>

    <div class="mb-3">
        <label>El. pastas</label>
        <input type="email" name="email" placeholder="test@gmail.com" class="form-control" required />
    </div>
    <div class="mb-3">
        <label>Slaptazodis</label>
        <input type="password" name="password" class="form-control" required />
    </div>

    <button class="btn btn-primary">Prisijungti</button>
</form>