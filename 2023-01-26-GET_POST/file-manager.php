<?php

// $request_uri = explode('/', $_SERVER['REQUEST_URI']);

// //Paskutine reiksme
// $file_query = $request_uri[count($request_uri) -1 ];

// Stringo isskaidymas i masyva pagal urodyta simboli
// $result = explode('?', $file_query);

// Masyvo sujungimas i stringa pagal nurodyta simboli
// implode('?', $result);

// print_r($result);

$dir = './';
$back_link = '';

if(isset($_GET['dir']) AND $_GET['dir'] != '') {
    $dir = $_GET['dir'];

    $path_array = explode('/', $dir);

    if($dir != './') {
        if(count($path_array) > 1) {
            unset($path_array[count($path_array) -1 ]);
            $back_link = implode('/', $path_array);
        } else {
            $back_link = './';
        }
    }
    
}

if(isset($_POST['data_type']) AND $_POST['data_type'] === 'folder') {
    if(isset($_POST['folder_name']) AND $_POST['folder_name'] != '') {
        mkdir($dir . '/' . $_POST['folder_name']);
        header('Location: ' . $_SERVER['REQUEST_URI']);
    }
} else {
    if(isset($_POST['file_name']) AND $_POST['file_name'] != '') {
        file_put_contents($dir . '/' . $_POST['file_name'], $_POST['file_contents']);
        header('Location: ' . $_SERVER['REQUEST_URI']);
    }
}


// nuskenuoja esama direktorija
$data = scandir($dir);

unset($data[0]);
unset($data[1]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File manager testinis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">
        <h1>File manager</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($back_link) { ?>
                        <tr>
                            <td>
                                <a href="?dir=<?= $back_link ?>">Back</a>
                            </td>
                        </tr>                   
                <?php } ?>
                <?php foreach($data as $item) {
                    // $path = $dir === './' ? $folder : $dir . '/' . $folder;

                    $path = $dir . './' . $item;

                    if($dir === './') {
                        $path = $item;
                    }

                    $icon = 'folder';

                    $file_formats = [
                        'pdf' => 'file-earmark.pdf',
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
                        'psd' => 'filetype-psd'
                    ];

                    if(!is_dir($path)) {
                        $icon = 'file-earmark';

                        $file_name = explode('.', $item);
                        $file_name = $file_name[count($file_name) -1];

                        if(array_key_exists($file_name, $file_formats)) {
                            $icon = $file_formats[$file_name];
                        }
                    }
                ?>
                    <tr>
                        <td>
                            <i class="bi bi-<?= $icon ?>"></i>
                            <?= (is_dir($path)) ? '<a href="?dir=' . $path . '">' . $item . '</a>' : $item ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="container">
        <h2>Create new File or Folder</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Select data type</label>
                <select name="data_type" class="form-control">
                    <option value="folder">Folder</option>
                    <option value="file">File</option>
                </select>
            </div>
            <div class="folder">
                <div class="mb-3">
                    <label>Folder name</label>
                    <input type="text" name="folder_name" class="form-control">
                </div>
            </div>
            <div class="file">
                <div class="mb-3">
                    <label>File name</label>
                    <input type="text" name="file_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label>File content</label>
                    <textarea name="file_contents" class="form-control"></textarea>
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>

    <script>
        document.querySelector('.file').style.display = 'none';
        document.querySelector('[name="data_type"]').addEventListener('change', (e) => {
           if(e.target.value === 'folder') {
                document.querySelector('.file').style.display = 'none';
                document.querySelector('.folder').style.display = 'block'; 
           } else {
                document.querySelector('.file').style.display = 'block';
                document.querySelector('.folder').style.display = 'none'; 
           }
        })
    </script>
</body>
</html>