<?php

if(empty($_SESSION['user']) OR $_SESSION['user']['role'] === 0) {
    header('Location: ?page=login');
    exit;
}

if(!empty($_POST)) {

    $query = vsprintf("INSERT INTO songs (name, author, album, year, link) VALUES ('%s', '%s', '%s', '%s', '%s')", $_POST);

    $db->query($query);
}

$songs = $db->query("SELECT * FROM songs");
$songs = $songs->fetch_all(MYSQLI_ASSOC);

?>

<div><a href="?page=logout" class="btn btn-outline-danger float-end">Logout</a></div>

<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Song Name</td>
            <td>Author</td>
            <td>Album</td>
            <td>Year</td>
            <td>Link</td>
            <td>Date added</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($songs as $song) : ?>
            <tr>
                <td><?= $song['id'] ?></td>
                <td><?= $song['name'] ?></td>
                <td><?= $song['author'] ?></td>
                <td><?= $song['album'] ?></td>
                <td><?= $song['year'] ?></td>
                <td><?= $song['link'] ?></td>
                <td><?= $song['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h1>Admin</h1>

<form method="POST">
    <div class="mb-3">
        <label>Song Name:</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="mb-3">
        <label>Author:</label>
        <input type="text" name="author" class="form-control">
    </div>
    <div class="mb-3">
        <label>Album:</label>
        <input type="text" name="album" class="form-control">
    </div>
    <div class="mb-3">
        <label>Year:</label>
        <input type="text" name="year" class="form-control">
    </div>
    <div class="mb-3">
        <label>Youtue link:</label>
        <input type="text" name="link" class="form-control">
    </div>
    <button class="btn btn-primary">Prideti</button>
</form>