<?php if (isset($_GET['message'])) : ?>
    <div class="alertas alert alert-<?= $_GET['status']; ?>">
        <?= $_GET['message'] ?>
    </div>
<?php endif; ?>