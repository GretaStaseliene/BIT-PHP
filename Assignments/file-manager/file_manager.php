<?php

$dir = './';
$back_link = '';

if(isset($_GET['dir']) AND $_GET['dir'] != '') {
    $dir = $_GET['dir'];

    $path_array = explode('/', $dir);

    if($dir != './') {
        if(count($path_array) > 1) {
            unset($path_array[count($path_array) -1]);
            $back_link = implode('/', $path_array);
        } else {
            $back_link = './';
        }
    }  
}

// Failo sukurimas
if(isset($_POST['file_name']) AND $_POST['file_name'] != '') {
    file_put_contents($dir . '/' . $_POST['file_name'], $_POST['file_content']);
    header('Location: ' . $_SERVER['REQUEST_URI']);
}

// Folderio sukurimas
if(isset($_POST['folder_name'])) {
    if(!is_dir($_POST['folder_name'])) {
        mkdir($dir . '/' . $_POST['folder_name']);
        header('Location: ' . $_SERVER['REQUEST_URI']);
    }
}

$data = scandir($dir);

unset($data[0]);
// print_r($data);
unset($data[1]);
// print_r($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Manager</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-3 mb-3 text-uppercase">File Manager</h1>
        <table class="table">
            <?php if($back_link) { ?>
                <button class="btn btn-primary">
                    <a href="?dir=<?= $back_link ?>" class="text-white">Back</a>
                </button>
            <?php } ?>
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" disabled>
                    </th>
                    <th>Name</th>
                    <th>Size</th>
                    <th>Modified</th>
                    <th>Owner</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
               <?php
                    foreach($data as $item) { 

                        if($dir === './') {
                            $path = $item;
                        } else {
                            $path = $dir . '/' . $item;
                        }

                        $icon = 'folder';

                        $extensions = [
                            'pdf' => 'file-earmark-pdf',
                            'txt' => 'filetype-txt',
                            'exe' => 'filetype-exe',
                            'css' => 'filetype-css',
                            'js' => 'filetype-js',
                            'json' => 'filetype-json',
                            'jpg' => 'filetype-jpg',
                            'png' => 'filetype-png',
                            'gif' => 'filetype-gif',
                            'php' => 'filetype-php',
                            'zip' => 'file-earmark-zip',
                            'sql' => 'filetype-sql',
                            'psd' => 'filetype-psd',
                            'html' => 'filetype-html'
                        ];

                        if(!is_dir($path)) {
                            $icon = 'file-earmark';

                            $file_name = explode('.', $item);
                            $file_name = $file_name[count($file_name) -1];
                            
                            if(array_key_exists($file_name, $extensions)) {
                                $icon = $extensions[$file_name];
                            }
                        }
                ?>
                        <tr>
                            <td>
                                <input type="checkbox" disabled>
                            </td>
                            <td>
                                <i class="bi bi-<?= $icon ?>"></i>
                                <?= (is_dir($path)) ? '<a href="?dir=' . $path . '">' . $item . '</a>' : $item ?>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button class="btn btn-danger delete_btn"><i class="bi bi-trash3-fill"></i></button>
                                <button class="btn btn-primary rename_btn"><i class="bi bi-vector-pen"></i></button>
                            </td>
                        </tr>
               <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="container folder-form">
        <h2 class="mt-5">Create new Folder</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Folder name</label>
                <input type="text" name="folder_name" class="form-control">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Create Folder</button>
            </div>
        </form>
    </div>

    <div class="container file-form">
        <h2 class="mt-5">Create new File</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Folder name</label>
                <input type="text" name="file_name" class="form-control">
            </div>
            <div class="mb-3">
                <label>Folder content</label>
                <textarea name="file_content" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Create File</button>
            </div>
        </form>
    </div>
</body>
</html>