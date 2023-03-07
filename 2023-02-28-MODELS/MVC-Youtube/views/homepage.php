<div class="container mt-3">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light categories me-3" style="width: 280px;">
        <a href="./" class="text-decoration-none text-dark">
            <span class="fs-4 ms-3">YouTube</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <?php foreach ($categories as $category) : ?>
                <li class="nav-item">
                    <a href="?page=category&id=<?= $category['id'] ?>" class="nav-link text-dark" aria-current="page">
                        <?= $category['name'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <hr>
    </div>

    <div class="videos d-flex gap-2">
        <?php foreach ($videos as $video) : ?>
            <div class="card" style="width: 18rem;">
                <a href="?page=video&id=<?= $video['id'] ?>"><img src="<?= $video['thumbnail_url'] ?>" class="card-img-top" alt="..."></a>
                <div class="card-body">
                    <p class="card-text"><?= $video['name'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>