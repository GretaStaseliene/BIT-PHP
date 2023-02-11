<?php

if (!isset($_SESSION['user'])) {
    header('Location: ?page=/');
    exit;
}

$data = json_decode(file_get_contents('database.json'), true);

$tweets = $data['tweets'];

$order = isset($_GET['order']) ? $_GET['order'] : 'asc';

if($order === 'dsc') {
    usort($tweets, function($a, $b) {
        if($a == $b) {
            return 0;
        }
        return ($b < $a) ? -1 : 1;
    });
}

if (!empty($_POST)) {

    $data['tweets'][] = [
        'message' => $_POST['tweet'],
        'created_at' => date('Y-m-d h:i:s'),
        'author' => $_SESSION['user']['id']
    ];

    if (!empty($_FILES['photo']['tmp_name'])) {
        if (!is_dir('./uploads')) {
            mkdir('./uploads');
        }

        $filename = explode('.', $_FILES['photo']['name']);
        $filename = time() . '.' . $filename[count($filename) - 1];

        $imageTypes = ['image/apng', 'image/avif', 'image/gif', 'image/jpeg', 'image/png', 'image/svg+xml', 'image/webp'];

        if (!in_array($_FILES['photo']['type'], $imageTypes)) {
            $params = [
                'page' => 'main',
                'message' => 'Neteisingas failo formatas',
                'status' => 'danger'
            ];

            header('Location: ?' . http_build_query($params));
            exit;
        }

        move_uploaded_file($_FILES['photo']['tmp_name'], './uploads/' . $filename);

        $data['tweets'][count($data['tweets']) - 1]['image'] = $filename;
    }

    file_put_contents('database.json', json_encode($data));

    $params = [
        'page' => 'main',
        'message' => 'Zinute sekmingai patalpinta',
        'status' => 'success'
    ];

    header('Location: ?' . http_build_query($params));
    exit;
}

?>

<div class="mt-4">
    <a href="?page=logout" class="btn btn-danger ms-5 float-end">Atsijungti</a>
</div>
<div class="text-center">
    <h2>Paskelbkite ką galvojate</h2>
</div>

<?php include('views/alerts.php'); ?>

<div class="container d-flex justify-content-center">

    <form method="POST" enctype="multipart/form-data" class="mt-3">
        <div class="input-group " style="width: 600px;">
            <span class="input-group-text">Jūsų žinutė</span>
            <textarea class="form-control" name="tweet" aria-label="With textarea"></textarea>
        </div>
        <div class="mb-3">
            <input class="form-control mt-3" type="file" id="formFile" name="photo">
        </div>

        <button class="btn btn-primary mt-3">Skelbti</button>
    </form>

</div>

<div class="sort">
    <form>
        <label>Rusiuoti</label>
        <select name="order" class="form-control">
            <!-- ASC - Ascending order (didejanti tvarka) -->
            <option value="asc">ASC</option>
            <!-- DSC - Discending order (mazejanti tvarka)-->
            <option value="dsc">DSC</option>
        </select>
        <button class="btn btn-primary mt-2">Rusiuoti</button>
    </form>
</div>

<h2 class="text-center mt-5 mb-3">Žinučių srautas</h2>

<?php foreach ($tweets as $tweet) : ?>
    <div class="card shadow-sm p-3 mb-3">

        <?php if (isset($tweet['image'])) : ?>

            <img src="uploads/<?= $tweet['image']; ?>" class="card-img-top">

        <?php endif; ?>

        <div class="card-text fw-semibold fs-4">
            <?= $tweet['message']; ?>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <span class="text-secondary"><?= $tweet['author']; ?></span>
            <span class="text-secondary"><?= $tweet['created_at']; ?></span>
        </div>
    </div>
<?php endforeach; ?>