<?php
include __DIR__ . '/partials/header.php';
?>

<div class="container">
    <?php foreach ($videos as $video) : ?>
        <div class="video">
            <iframe src="<?= $video['video_url'] ?>" frameborder="0" width="100%" height="500px" allowfullscreen="true"><?= $video['video_url'] ?></iframe>
        </div>
        <div class="fs-4"><?= $video['name'] ?></div>
    <?php endforeach; ?>

    <div class="comments mt-3">
        <?php if (isset($_SESSION['user_id'])) : ?>
            <form method="POST">
                <div class="mb-3">
                    <span class="p-2 mb-3 bg-success text-white rounded-pill"><?= $_SESSION['user_name'] ?></span>
                    <label class="form-label">Leave your comment here</label>
                    <textarea class="form-control mt-2" name="comment" cols="30" rows="5"></textarea>
                    <button class="btn btn-outline-dark mt-3">Comment</button>
                </div>
            </form>
        <?php else : ?>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Your name</label>
                    <input class="form-control" type="text" name="guest_name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Leave your comment here</label>
                    <textarea class="form-control" name="comment" cols="30" rows="5"></textarea>
                    <button class="btn btn-outline-dark mt-3">Comment</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>

<?php
include __DIR__ . '/partials/footer.php';
?>