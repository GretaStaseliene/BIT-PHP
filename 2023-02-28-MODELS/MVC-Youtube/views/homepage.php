<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body>
    <div class="container mt-3">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light categories me-3" style="width: 280px;">
            <a href="./" class="text-decoration-none text-dark">
                <span class="fs-4 ms-3">Kategorijos</span>
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
                    <img src="<?= $video['thumbnail_url'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"><?= $video['name'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>