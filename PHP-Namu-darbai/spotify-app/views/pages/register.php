<?php

if(!empty($_POST)) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $params = [
        'page' => 'register',
        'message' => 'Vartotojas sekmingai sukurtas',
        'status' => 'success'
    ];

    if($db->query("INSERT INTO users (email, password) VALUES ('{$email}', '{$password}')")) {
        header('Location: ?' . http_build_query($params));
    }
}

?>

<form method="POST" class="signup">
    <h1>Registracija</h1>

    <div class="mb-3">
        <label>El. pastas</label>
        <input type="email" name="email" placeholder="test@gmail.com" class="form-control" required />
    </div>
    <div class="mb-3">
        <label>Slaptazodis</label>
        <input type="password" name="password" class="form-control" required />
    </div>

    <button class="btn btn-primary">Registruotis</button>
</form>