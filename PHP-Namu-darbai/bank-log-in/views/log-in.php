<?php

if (
    isset($_POST['login_id']) AND
    $_POST['login_id'] === '65451351' AND
    isset($_POST['login_psw']) AND
    $_POST['login_psw'] ===  '1234'
) {
   $_SESSION['id'] = '65451351';
   header('Location: ?page=account');
   exit;
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
                <input type="password" class="form-control rounded" id="floatingPassword" name="login_psw" placeholder="Slaptazodis">
                <label for="floatingPassword">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Prisijunkite</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
        </form>
    </main>
</div>