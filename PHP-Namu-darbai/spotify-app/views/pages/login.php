<?php

if(!empty($_POST)) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $params = [
        'page' => 'login',
        'message' => 'Toks vartotojas nerastas',
        'status' => 'danger'
    ];

    $user = $db->query("SELECT id, role FROM users WHERE email = '{$email}' AND password = '{$password}' ");

    if($user->num_rows === 0) {
        header('Location: ?' . http_build_query($params));
        exit;
    }

    $user = $user->fetch_row();

    $_SESSION['user']['id'] = $user[0];
    $_SESSION['user']['role'] = $user[1];

    if($_SESSION['user']['role'] === '1') {
        header('Location: ?page=admin');
        exit;
    } else {
        header('Location: ?page=main');
        exit;
    }
}

?>

<form method="POST" class="login">
    
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