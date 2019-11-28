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

            echo "<table id='showDB'><tr><th>Артикул</th><th>Название</th><th>Аудитория</th><th>Срок амортизации</th><th>Ответственный</th></tr>";
            for($i = 0; $i < $rows; ++$i) {
                $row = mysqli_fetch_row($result);
                echo "<tr>";
                    for($j = 0; $j < 5; ++$j) echo "<td>$row[$j]</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        }
    }
?>