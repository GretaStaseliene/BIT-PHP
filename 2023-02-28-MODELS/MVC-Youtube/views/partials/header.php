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

    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="./" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img src="https://lh3.googleusercontent.com/3zkP2SYe7yYoKKe47bsNe44yTgb4Ukh__rBbwXwgkjNRe4PykGG409ozBxzxkrubV7zHKjfxq6y9ShogWtMBMPyB3jiNps91LoNH8A=s500" alt="youtube logo" class="logo">
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <form class="w-100 me-3 d-flex" role="search">
                    <input type="hidden" name="page" value="search">
                    <input type="search" class="form-control rounded-end rounded-pill" placeholder="Search..." aria-label="Search" style="width: 400px;" name="search">
                    <button class="btn btn-outline-dark border border-start-0 rounded-start rounded-pill" type="button" id="button-addon2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </form>
            </ul>

            <div class="col-md-3 text-end">
                <?php if (!isset($_SESSION['user_id'])) : ?>
                    <a href="?page=login" type="button" class="btn btn-outline-dark me-2">Login</a>
                    <a href="?page=register" type="button" class="btn btn-dark">Sign-up</a>
                <?php else : ?>
                    <button class="btn btn-outline-dark" id="newVideo">Add new video</button>
                    <a href="?page=logout" class="btn btn-danger">Log-out</a>
                    <span class="p-2 mt-2 bg-success text-white rounded-pill"><?= substr($_SESSION['user_name'], 0, 1); ?></span>
                <?php endif; ?>
            </div>
        </header>
    </div>