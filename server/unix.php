<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Unix</title>
</head>
<body>
    <div>
        <?php
        function print_cmd($cmd) {
            $lines = array();
            exec($cmd, $lines);
            echo "<p>> $cmd </p>";
            echo "<pre>> " . implode("\n> ", $lines) . "</pre>";
        }


        $command = $_GET['cmd'] ?? "";
        $command_list = array('ps', 'ls', 'whoami', 'id');
        if (in_array(explode(" ", $_GET['cmd'] ?? "")[0], $command_list)){
            print_cmd($command);
        } else {
            echo "<p>Формат команды: ?cmd=(Ваша команда)</p>";
            echo "<p>Например: ?cmd=ls</p>";
            echo "<p>Список доступных команд: 'ps', 'ls', 'whoami', 'id'</p>";
            echo '<a href="http://localhost:8080/unix.php?cmd=ls">Пример</a>';
        }
        ?>
    </div>
</body>
</html>