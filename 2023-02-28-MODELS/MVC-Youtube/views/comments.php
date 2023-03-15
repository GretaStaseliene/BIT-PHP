<div class="container">
    <?php foreach ($comments as $comment) : ?>
        <div class="list-group w-auto mt-3">
            <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <h6 class="mb-0"><?= $comment['user_name']; ?></h6>
                        <p class="mb-0 opacity-75"><?= $comment['comment']; ?></p>
                    </div>
                    <small class="opacity-50 text-nowrap"><?= $comment['created_at']; ?></small>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>