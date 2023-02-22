<?php

if (!empty($_POST)) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $nickname = $_POST['nickname'];

    $params = [
        'page' => 'register',
        'message' => 'Vartotojas sekmingai sukurtas',
        'status' => 'success'
    ];

    if ($db->query(
        vsprintf(
            "INSERT INTO users (email, password, nickname) VALUES ('%s', '%s', '%s')",
            [$email, $password, $nickname]
        )
    )) {
        header('Location: ?' . http_build_query($params));
    }
}

?>

<form method="POST" class="signup">
    <h1>Signup</h1>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" placeholder="test@gmail.com" class="form-control" required />
    </div>
    <div class="mb-3">
        <label>Nickname</label>
        <input type="text" name="nickname" placeholder="@..." class="form-control" required />
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required />
    </div>

    <button class="btn btn-primary">Registruotis</button>
</form>