<?php

$navigation = [
    'Kortelės' => '?page=cards',
    'Paskolos' => '?page=loans',
    'Pensija' => '?page=pension',
    'Internetinis bankas' => '?page=ebank'
];

?>

<div class="container">
  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <?php foreach($navigation as $title => $link) : ?>
            <li class="nav-item"><a href="<?= $link ?>" class="nav-link px-2 text-muted"> <?= $title ?> </a></li>
        <?php endforeach; ?>
    </ul>
    <p class="text-center text-muted">&copy; 2022 Company, Inc</p>
  </footer>
</div>