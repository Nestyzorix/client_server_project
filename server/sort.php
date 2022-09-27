<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Shell Sort</title>
</head>
<body>
    <div>
        <?php
            //Сортировка Шелла
            function shell_Sort($my_array){
	            $x = round(count($my_array)/2);
                while($x > 0)
                {
                    for($i = $x; $i < count($my_array);$i++){
                        $temp = $my_array[$i];
                        $j = $i;
                        while($j >= $x && $my_array[$j-$x] > $temp)
                        {
                            $my_array[$j] = $my_array[$j - $x];
                            $j -= $x;
                        }
                        $my_array[$j] = $temp;
                    }
                    $x = round($x/2.2);
                }
                return $my_array;
            }
            
            if (isset($_GET['array'])) {
                echo "<p>Массив: [";
                echo implode(", ", explode(",", $_GET["array"]));
        
                echo "]</p>\n<p>Отсортированный массив: [";
                echo implode(", ", shell_Sort(explode(",", $_GET["array"])));
                echo "]</p>";
            } else {
                echo "<p>Нет данных</p>";
                echo '<a href="http://localhost:8080/sort.php?array=5,4,3,2,1">Пример</a>';
            }
        ?>
    </div>
</body>
</html>