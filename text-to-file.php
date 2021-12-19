<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    $file = "uploads/info.txt";
    $perms = '<p>Размер файла: ' . $file . ': ' . filesize($file) . '</p>';

    $result = "<html> <html lang='ru'>
            <head>
                <meta charset='UTF-8'>
                <title>Файл успешно сохранен</title>
                <link rel=\"stylesheet\" href=\"style.css\">
            </head>
            <body>
                <div class=\"result\">
                    <p>Скачать файл можно по ссылке</p>
                    <a href='download.php'>Файл</a>
                    $perms
                </div>
            </div>
            </body>
            </html>";
    echo $result;
}