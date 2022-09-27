<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Drawer</title>
</head>
<body>
    <div>
        <?php
        $num = $_GET['num'] ?? "";
        if (isset($num) && is_numeric($num)) {
            // 00    0 0 0  00
            $shape =    ($num >> 5) & 3; // 00-круг 01-прямоугольник 10-квадрат 11-треугольник
            $r =      ($num >> 4) & 1;
            $g =    ($num >> 3) & 1;
            $b =     ($num >> 2) & 1;
            $size =    (($num >> 0) & 3) + 1; // 00-маленький 01-средний 10-большой 11-very big
            // HEX цвет
            $color = '"#'
                . ($r == 1    ? 'ff' : "00")
                . ($g == 1  ? 'ff' : "00")
                . ($b == 1   ? 'ff' : "00") . '"';
            $size = $size * 100;
            $shape_tag = '';
            switch ($shape) {
                case 0: // Круг
                    $radius = ($size / 2);
                    $shape_tag = "circle "
                        // Размер
                        . " cx=" . ($radius + 10) . " cy=" . ($radius + 10)
                        // Радиус
                        . " r=" . $radius . " ";
                    break;
                case 1: // Прямоугольник
                    $shape_tag = "rect "
                        // Размер
                        . "width=" . ($size * 2) . " height=" . ($size);
                    break;
                case 2: // Квадрат
                    $shape_tag = "rect "
                        // Размер
                        . "width=" . ($size) . " height=" . ($size);
                    break;
                case 3: // Треугольник
                    $side = $size;
                    $shape_tag = "polygon points='"
                        // Точки
                        . ($side / 2 + 5) . ",10"
                        . " 10," . ($side) . " "
                        . ($side) . "," . ($side) . "'";
                    break;
            }
            echo '<svg>';
            echo '<' . $shape_tag . ' fill=' . $color . '  />';
            echo '</svg>';
        } else {
            echo "<p>Формат команды: ?num=(Ваше число)</p>";
            echo "<p>Например: ?num=1</p>";
            echo '<a href="http://localhost:8080/drawer.php?num=1">Пример</a>';
        }
        ?>
    </div>
</body>
</html>