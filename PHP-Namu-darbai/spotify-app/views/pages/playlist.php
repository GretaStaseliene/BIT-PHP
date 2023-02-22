<?php

if (empty($_SESSION['user'])) {
    header('Location: ?page=login');
    exit;
}

// DELETE songs from playlist
if (isset($_GET['action']) and $_GET['action'] === 'delete') {
    $delete = $db->query("DELETE FROM songs_playlists WHERE id = {$_GET['id']}");

    header('Location: ?page=playlist');
    exit;
}

if (empty($_GET['playlist_id'])) {
    header('Location: ?page=main');
    exit;
}


$id = $_GET['playlist_id'];

$playlist = $db->query("SELECT * FROM playlists WHERE id = {$id}");
$playlist = $playlist->fetch_assoc();

$result = $db->query("SELECT songs.id, songs.name, songs.author, songs.album, songs.year, songs.link, songs_playlists.id AS sp_id
                        FROM songs_playlists
                        INNER JOIN songs
                        ON songs_playlists.song_id = songs.id
                        WHERE songs_playlists.playlist_id = {$id}");

$songs = $result->fetch_all(MYSQLI_ASSOC);

?>

<h1 class="text-center">"<?= $playlist['name']; ?>" songs</h1>

<div class="mt-4">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Author</th>
                <th>Album</th>
                <th>Year</th>
                <th>Link</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($songs as $song) : ?>
                <tr>
                    <td><?= $song['name'] ?></td>
                    <td><?= $song['author'] ?></td>
                    <td><?= $song['album'] ?></td>
                    <td><?= $song['year'] ?></td>
                    <td><?= $song['link'] ?></td>
                    <td>
                        <a href="?page=playlist&action=delete&id=<?= $song['sp_id']; ?>" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                            </svg>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>