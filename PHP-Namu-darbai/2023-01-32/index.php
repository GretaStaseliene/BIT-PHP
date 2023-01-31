<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daugybos lentele</title>
    <style>
        body {
            font-size: 26px;
        }
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }
        tr {
            border: 1px solid black;
        }
        td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }
        .gray {
            background: #ccc;
        }
        .white {
            background: #fff;
        }
    </style>
</head>
<body>
    <table>
        <?php
            for($c = 1; $c <= 10; $c++) {
                echo "<tr>";
                for($r = 1; $r <=10; $r++) {
                    ($c==$r) ? $background = "gray" : $background = "white";
                    echo "<td class='$background'>" . $c * $r . "</td>";
                }
                echo "</tr>";  
            }
        ?>
    </table>
</body>
</html>