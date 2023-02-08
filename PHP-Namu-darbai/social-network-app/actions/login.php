<?php

    if(
        isset($_POST['login_id']) AND 
        $_POST['login_id'] != '' AND
        isset($_POST['login_psw']) AND 
        $_POST['login_psw'] != ''
    ) {
        $json = file_get_contents('data/users.json');
        $users = json_decode($json);
        
        foreach($users as $user) {
            if(
                $_POST['login_id'] === $user->id AND 
                $_POST['login_psw'] === $user->password
            ) {
                header('Location: ?page=main');
                exit;
            }
        }
    }

?>

<link rel="stylesheet" href="./assests/login.css">
<main class="form-signin w-100 m-auto">
  <form method="POST">
    <h1 class="h3 mb-3 fw-normal text-center">Prisijungti</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="login_id">
      <label for="floatingInput">ID</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="login_psw">
      <label for="floatingPassword">Slaptažodis</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Prisijungti</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
  </form>
</main>