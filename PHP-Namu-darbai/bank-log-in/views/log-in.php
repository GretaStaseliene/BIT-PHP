<?php

if (
    isset($_POST['login_id']) AND
    $_POST['login_id'] != '' AND
    isset($_POST['password']) AND
    $_POST['password'] !=  ''
) {
    // if($_POST['login_id'] === 'admin' AND $_POST['password'] === 'admin') {
    //     $_SESSION['user'] = 'admin';
    //     header('Location: ?page=admin');
    //     exit;
    // }

    $json = file_get_contents('database.json');
    $users = json_decode($json);
    
    foreach($users as $user) {
        // print_r($user->id);
        // print_r($user->password);

        if(
            $_POST['login_id'] === $user->id AND
            $_POST['password'] === $user->password
        ) {
            $_SESSION['user'] = $user;
            if($user->role === '1') {
                header('Location: ?page=admin');
                exit;
            } else {
                header('Location: ?page=account');
                exit;
            }
        }
    }
//    $_SESSION['id'] = '65451351';
//    header('Location: ?page=account');
//    exit;
}

?>

<link rel="stylesheet" href="assets/log-in.css">

<div class="container">
    <main class="form-signin w-100 m-auto">
        <form method="POST">
            <h1 class="h3 mb-3 fw-normal">Prisijunkite prie banko</h1>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="floatingInput" name="login_id" placeholder="ID">
                <label for="floatingInput">ID</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control rounded" id="floatingPassword" name="password" placeholder="Slaptazodis">
                <label for="floatingPassword">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Prisijunkite</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
        </form>
    </main>
</div>