<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Курсовой проект</h1>
    <?php
    include "utils.php";
    echo "<main>";
    echo '<img src="' . './image.php"/>';

    $regions = get_regions();
    // var_dump($regions);
    // echo '<br/>';

    // Легенда
    echo '<div class="legend"><div class="legend-item bold">Легенда</div>';
    foreach ($regions as $index => $region) {
        $name = $region->name;
        $color = $region->color;
        $value = $region->value;

        echo '<div class="legend-item">'
            . '<span class="legend-icon" style="background-color:' . $color . ';"></span>'
            . '<span>'
            . $name
            . '</span>'
            . '</div>';
    }
    echo "</div>";
    echo "</main>";
    ?>
</body>

</html>