<!DOCTYPE html>
<html>
<head>
    <title>Список БД</title>
    <link rel="stylesheet" href="css/general.css">
</head>
<body>
    <div class="header">
        <a href="index.php"><div id="returnArrow"></div></a>
        <div id="returnBody"></div>
    </div>
    <div id="block3">
        <form action="to_excel.php" method="POST">
            <input type="submit" value="В Excel">
        </form>
    </div>
</body>
</html>

<?php 
    require_once 'connect.php';
    
    //Подключаем БД
    $link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));

    //Получаем все данные из БД
    if(isset($_POST['showData'])) {
        $query = "SELECT * FROM `storage`";
        $result = mysqli_query($link, $query);
        if($result) {
            $rows = mysqli_num_rows($result); //количество полученных строк
            echo "<table id='showDB'><tr><th>ID</th><th>Артикул</th><th>Фирма</th><th>Модель</th><th>Аудитория</th><th>Год приобретения</th><th>Срок амортизации в годах</th><th>Ответственный</th></tr>";
            for($i = 0; $i < $rows; ++$i) {
                $row = mysqli_fetch_row($result);
                echo "<tr>";
                    for($j = 0; $j < 8; ++$j) {
                        echo "<td>$row[$j]</td>";
                        $file = 'excel.csv';
                        $tofile = "'$row[$j]'";
                        $bom = "\xEF\xBB\xBF";
                        @file_put_contents($file, $bom . $tofile . file_get_contents($file));
                    }
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        }
    }
?>