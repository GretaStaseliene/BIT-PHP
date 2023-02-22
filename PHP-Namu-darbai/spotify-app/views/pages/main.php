<?php

if (!empty($_SESSION['user']) and $_SESSION['user']['role'] === 1) {
    header('Location: ?page=login');
    exit;
}

$user = $_SESSION['user']['id'];

// CREAT playlist
if (!empty($_POST)) {
    $db->query(
        vsprintf(
            "INSERT INTO playlists (name, user_id) VALUES ('%s', %d)",
            [$_POST['playlist_name'], $_SESSION['user']['id']]
        )
    );

    $id = $db->insert_id;

    foreach($_POST['song'] as $song_id) {
        $db->query("INSERT INTO songs_playlists (song_id, playlist_id) VALUES ({$song_id}, {$id})");
    }

    header('Location: ?page=main');
}

$playlists = $db->query("SELECT playlists.id, playlists.name, users.nickname
                        FROM playlists
                        INNER JOIN users
                        ON users.id = playlists.user_id;
                    ");
$playlists = $playlists->fetch_all(MYSQLI_ASSOC);

$songs = $db->query("SELECT * FROM songs");
$songs = $songs->fetch_all(MYSQLI_ASSOC);


// DELETE'ing playlist
if (isset($_GET['action']) and $_GET['action'] === 'delete') {
    $delete = $db->query("DELETE FROM playlists WHERE id = {$_GET['id']}");

    header('Location: ?page=main');
    exit;
}

?>
<div>
    <a href="?page=logout" class="btn btn-danger float-end">Logout</a>
</div>
<div>
    <a href="?page=user_playlists&user_id=<?= $user; ?>" class="btn btn-primary float-end me-2">My playlists</a>
</div>

<h1 class="text-center">Discover songs and playlists</h1>

<div class="container px-4 py-5 d-flex">


    <aside>
        <div class="d-flex flex-column align-items-start gap-2" style="width: 95%;">
            <h2 class="pb-2 border-bottom border-dark">Create New Playlist</h2>
            <form method="POST">
                <div class="mb-3">
                    <label>Playlist Name:</label>
                    <input type="text" name="playlist_name" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label>Add Songs:</label>
                    <?php foreach ($songs as $song) : ?>
                        <div class="form-check">
                            <label>
                                <input type="checkbox" name="song[]" class="form-check-input" value="<?= $song['id'] ?>">
                                <?= $song['name']; ?><span class="text-muted"> by <?= $song['author']; ?></span>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="btn btn-primary">Create Playlist</button>
            </form>
        </div>
    </aside>


    <div class="d-flex flex-column align-items-start gap-2 ms-5" style="width: 80%;">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Playlist Name</th>
                    <th>Created by</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($playlists as $playlist) :
                    // $user = $db->query("SELECT nickname FROM users WHERE id = " . $playlist['user_id']);
                    // $user = $user->fetch_row();
                ?>
                    <tr>
                        <td><?= $playlist['id']; ?></td>
                        <td>
                            <a href="?page=playlist&playlist_id=<?= $playlist['id']; ?>" class="pllstanchor"><?= $playlist['name']; ?>
                            </a>
                        </td>
                        <td class="text-muted">@<?= $playlist['nickname']; ?></td>
                        <td>
                            <a href="?page=main&action=delete&id=<?= $playlist['id']; ?>" class="btn btn-danger">
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

</div>