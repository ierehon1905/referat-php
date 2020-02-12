<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Реферат</h1>
    <?php
    $string = file_get_contents(__DIR__ . '/data.json');
    if ($string === false) {
        echo '<h2 class="error-message">Не удалось считать содержимое файла.</h2>';
    }

    $json = json_decode($string);
    if ($json === null) {
        echo '<h2 class="error-message">Не удалось декодировать json.</h2>';
    }

    $regions = $json->regions;
    var_dump($regions);

    // Легенда
    foreach ($regions as $index => $region) {
        $name = $region->name;
        $color = $region->color;
        $value = $region->value;

        echo '<div class="legend-item">'
            . '<span class="legend-icon" style="background-color:' . $color . ';"></span>'
            . '<span>'
            . $name
            . '</span>' .
            '</div>';
        // echo $color;
    }

    ?>
</body>

</html>