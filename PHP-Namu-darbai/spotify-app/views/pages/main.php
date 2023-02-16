<?php

if(!empty($_SESSION['user']) AND $_SESSION['user']['role'] === 1) {
    header('Location: ?page=login');
    exit;
}

?>
<div><a href="?page=logout" class="btn btn-outline-danger float-end">Logout</a></div>

<h1 class="text-center">Discover songs</h1>