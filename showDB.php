<!DOCTYPE html>
<html>
<head>
    <title>Список БД</title>
    <link rel="stylesheet" href="css/general.css">
</head>
<body>
<?php 
    require_once 'connect.php';
    
    //Подключаем БД
    $link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));
    
    //Поменять статус
    // $query = "UPDATE `storage` SET `status`='vksfa' WHERE id=2";
    // mysqli_query($link, $query);

    //Получить значение статуса
    // $query = mysqli_query($link, "SELECT * FROM `storage`");
    // while($row = mysqli_fetch_array($query)) {
    //     echo $row['status'];
    // }
    
    //Проверка на отсутствие даты ввода в эксплуатацию и установка статуса
        $query = "SELECT `status` FROM `storage` WHERE `dateExpl` Is NULL";
        $result = mysqli_query($link, $query);
        if($result) {
            $query1 = "UPDATE `storage` SET `status`= 'на складе' WHERE `dateExpl` Is NULL";
            mysqli_query($link, $query1);
        }

    //Получаем все данные из БД
        $query = "SELECT * FROM `storage`";
        $result = mysqli_query($link, $query);
        if($result) {
            $rows = mysqli_num_rows($result); //количество полученных строк
            echo "<table id='showDB'><tr><th>Фирма</th><th>Модель</th><th>Аудитория</th><th>Дата приобретения</th><th>Дата ввода в эксплуатацию</th><th>Дата начала ремонта</th><th>Срок амортизации в годах</th><th>Ответственный</th><th>Статус</th><th>Инвентарный номер</th></tr>";
            for($i = 0; $i < $rows; ++$i) {
                $row = mysqli_fetch_row($result);
                echo "<tr>";
                    for($j = 1; $j < 11; ++$j) {
                        echo "<td>$row[$j]</td>";
                        //$file = 'excel.csv';
                        //$tofile = "'$row[$j]'";
                        //$bom = "\xEF\xBB\xBF";
                        //@file_put_contents($file, $bom . $tofile . file_get_contents($file));
                    }
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        }
?>
    <!-- <div class="header">
        <div id="returnArrow"><a href="index.php"><p>Добавить</p></a></div>
        <div id="returnArrow1"><a href="#"><p>Посмотреть БД</p></a></div>
        <div id="returnBody"></div>
    </div> -->
    <header> 
        <p>Список всех устройств</p>
    </header>
    <div id="leftBar">
            <div id="logo">Polyan</div>
            <div id="currentPage"><a href="index.php"><ul><li><img src="img/add.png" alt="">Добавление записи</li></a></ul></div>
            <div id="menu">
                <ul>
                    <a href="showDB.php"><li><img src="img/list.png" alt="">Посмотреть записи</li></a>
                    <a href="#" onclick="showSearch()"><li><img src="img/search.png" alt="">Поиск по БД</li></a> <div id="srch"> <form action="search.php" method="POST"> <input type="text" placeholder="Фирма" name="querySearch"> <input type="submit" value="искать"> </form> </div>
                    <a href="to_excel.php"><li><img src="img/search.png" alt="">Экспорт в Excel</li></a>
                    <a href="compendium.php"><li><img src="img/compendium.png" alt="">Справка о программе</li></a>
                    <a href="managUser.php"><li><img src="img/managUser.png" alt="">Руководство пользователя</li></a>
                    <a href="about.php"><li><img src="img/about.png" alt="">О разработчике</li></a>
                </ul>
            </div>
            <hr>
            <div id="user"><img src="img/user.png" alt="">Александр <pre>    </pre> <img src="img/arrowDown.png" alt=""></div>
    </div>
    <div class="main">
        <div id="showTable" onclick="showTable()">Показать/скрыть все устройства с вышедшим сроком амортизации</div>
        <div id="hideTable" onclick="hideTable()">Показать/скрыть все устройства с вышедшим сроком амортизации</div>
        <table id="tableAmort">
            <tr><td>Фирма</td><td>Модель</td><td>Аудитория</td><td>Дата приобретения</td><td>Дата ввода в эксплуатацию</td><td>Дата начала ремонта</td><td>Срок амортизации в годах</td><td>Ответственный</td><td>Статус</td><td>Инвентарный номер</td></tr>
            <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
        </table>
        <ul class="hr">
        <li>
        <form action="updStatus.php" method="POST" class="formCSS">
            <h3>Установить произвольный статус <div class="tooltip" data-tooltip="Когда есть нештатные ситуации, либо вполне штатные, задаём статус при каком-либо важном событии, например, списание устройства.">?</p></h3>
            <p>Инвентарный номер </p> <input type="text" name="temp0" placeholder="Инвентарный номер" required> <br>
            <p>Установить статус </p> <input type="text" name="status" placeholder="Статус" required> <br>
            <input type="submit" name="updStatus" value="Установить">
        </form>
        </li>
        <li>
        <form action="updStatus.php" method="POST" class="formCSS">
            <h3>Установить дату ввода в эксплуатацию </h3>
            <p>Инвентарный номер </p> <input type="text" name="temp0" placeholder="Инвентарный номер" required> <br>
            <p>Установить дату </p> <input type="date" name="dateExpl" placeholder="Дата" required> <br>
            <input type="submit" name="updData" value="Установить">
        </form>
        </li>
        <li>
        <form action="updStatus.php" method="POST" class="formCSS">
            <h3>Установить дату начала ремонта </h3>
            <p>Инвентарный номер </p> <input type="text" name="temp0" placeholder="Инвентарный номер" required> <br>
            <p>Установить дату </p> <input type="date" name="dateRepair" placeholder="Дата" required> <br>
            <input type="submit" name="updRepair" value="Установить">
        </form>
        </li>
        <li>
        <form action="updStatus.php" method="POST" class="formCSS">
            <h3>Поменять номер аудитории</h3>
            <p>Инвентарный номер </p> <input type="text" name="temp0" placeholder="Инвентарный номер" required> <br>
            <p>Установить номер аудитории </p> <input type="text" name="room" placeholder="Аудитория" required> <br>
            <input type="submit" name="updRoom" value="Установить">
        </form>
        </li>
        <li>
        <form action="updStatus.php" method="POST" class="formCSS">
            <h3>Удалить ошибочную запись</h3>
            <p>Инвентарный номер </p> <input type="text" name="temp0" placeholder="Инвентарный номер" required> <br>
            <input type="submit" name="del" value="Удалить">
        </form>
        </li>
        </ul>
    </div>
    <script src="js/core.js"></script>
</body>
</html>
