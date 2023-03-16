<?php
include __DIR__ . '/partials/header.php';
?>

<?php if (isset($_GET['action']) and $_GET['action'] === 'add') : ?>

    <div class="container">

        <div class="newCategory">
            <form method="POST" class="mb-3">
                <div class="mb-3" id="newCategoryInput">
                    <label class="form-label">New category</label>
                    <input type="text" class="form-control" placeholder="Type new category if you can't find one in select menu" name="category_name">
                </div>
                <button class="btn btn-outline-dark" type="submit">Add Category</button>
            </form>
        </div>

        <div class=" newVideo">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Video name:</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Choose category:</label>
                    <select name="category_id" class="form-control">
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category['id']; ?>"><?= $category['category_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Video URL:</label>
                    <input type="text" class="form-control" name="video_url">
                </div>
                <div class="mb-3">
                    <label class="form-label">Video Thumbnail URL:</label>
                    <input type="text" class="form-control" name="thumbnail_url">
                </div>
                    <!-- <input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>"></input> -->

                <button class="btn btn-outline-dark" type="submit">Add video</button>
            </form>
        </div>
    </div>
<?php endif; ?>


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
                        <?= $category['category_name'] ?>
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

<!-- <script>
    const btn = document.querySelector('#newVideo');

    btn.addEventListener('click', () => {
        const form = document.querySelector('.newVideo');
        const category = document.querySelector('.newCategory');

        if (form.style.display === 'none') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }

        if (category.style.display === 'none') {
            category.style.display = 'block';
        } else {
            category.style.display = 'none';
        }


    });
</script> -->

<?php
include __DIR__ . '/partials/footer.php';
?>