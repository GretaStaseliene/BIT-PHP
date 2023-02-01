<?php

session_start();

// sesijos informacijos pasalinimui
// unset($_SESSION['vardas']);

// Is karto panaikina visa sesijos informacia is serverio
// session_destroy();

?>

<?php if(isset($_SESSION['vardas'])) : ?>
    <div>Sveiki, <?= $_SESSION['vardas']; ?></div>
<?php else: ?>
    <div>Sveiki, Anonimas</div>
<?php endif; ?>