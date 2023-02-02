<?php

$navigation = [
    'Kortelės' => '?page=cards',
    'Paskolos' => '?page=loans',
    'Pensija' => '?page=pension',
    'Internetinis bankas' => '?page=ebank'
];

?>

<link rel="stylesheet" href="assets/navigation.css">

<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <span class="fs-4 fw-bolder d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">MANO BANKAS</span>

      <ul class="nav nav-pills">
        <?php foreach($navigation as $title => $link) : ?>
            <li class="nav-item"><a href="<?= $link ?>" class="nav-link"> <?= $title ?> </a></li>
        <?php endforeach; ?>
      </ul>
    </header>
  </div>