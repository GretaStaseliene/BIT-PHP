<?php

if(isset($_GET['login'])) {
    header('Location: ?page=login');
    exit;
}

if(isset($_GET['signup'])) {
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
    <a href="?page=login" class="btn btn-outline-primary me-2">Prisijungti</a>
    <a href="?page=signup" class="btn btn-primary">Registruotis</a>
</div>