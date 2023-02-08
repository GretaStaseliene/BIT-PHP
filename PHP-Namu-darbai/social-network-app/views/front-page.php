<?php

if(isset($_GET['log_in'])) {
    header('Location: ?page=login');
    exit;
}

if(isset($_GET['sign_in'])) {
    header('Location: ?page=signup');
    exit;
}

?>

<div class="d-flex justify-content-center">
    <div class="text-center">
        <h1>Sveiki atvykę į Twitter tipo aplikaciją</h1>
        <p>Kad galėtumete naudotis šia aplikacija turite būti prisiregistravęs vartotojas.</p>
        <p>Jeigu jau esate prisiregistravęs - prisijunkite.</p>
    </div>
</div>
<div class="text-center">
    <a href="?page=log_in" class="btn btn-outline-primary me-2">Prisijungti</a>
    <a href="?page=sign_in" class="btn btn-primary">Registruotis</a>
</div>