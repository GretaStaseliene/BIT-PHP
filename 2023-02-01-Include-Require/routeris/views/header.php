<?php

$navigacija = [
  'Home' => 'index.php',
  'Blogas' => '?page=blog',
  'Test' => '?page=test'
];

?>

<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <h3>PARDUOTUVE</h3>
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <?php  foreach($navigacija as $title => $link) : ?>
        <li><a href="<?= $link ?>" class="nav-link px-2 link-secondary"><?= $title ?></a></li>
        <?php endforeach; ?>
      </ul>
    </header>
  </div>