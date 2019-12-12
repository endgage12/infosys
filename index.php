<!DOCTYPE html>
<?php
    require_once 'connect.php';
            
    //Подключаем БД
    $link = mysqli_connect($host, $user, $password, $database)
        or die("Ошибка " . mysqli_error($link));

    //Получить все ID (temp0)
    $arr[] = "";
    $query = "SELECT `temp0` FROM `storage`";
    $result = mysqli_query($link, $query);
    if($result) {
        $rows = mysqli_num_rows($result);
        echo "<table id='arr'><tr>";
        for($i = 0; $i < $rows; ++$i) {
            $row = mysqli_fetch_row($result);
            for($j = 0; $j < 1; ++$j) {
                $arr[$i] = $row[$j]; $lenArr = count($arr); //создать таблицу td
                for($k = 0; $k < $lenArr; ++$k) {
                    echo "<td>$arr[$k]</td>";
                } 
                echo "<div id='lockIdArray'>$row[$j]</div>";
            }
        }
        echo "</tr></table>";
    }
?>
<html>
    <head>
        <title>Инвентарный учет</title>
        <link rel="stylesheet" href="css/general.css">
        <link rel="icon" type="image/png" href="img/logo.png"> 
        <link href="fonts/AnonymousPro-Regular.ttf" rel="stylesheet">
    </head>
    <body>
        <!-- <div class="header"> 
            <div id="returnArrow"><a href="#"><p>Добавить</p></a></div>
            <div id="returnArrow1"><a href="showDB.php"><p>Посмотреть БД</p></a></div>
            <div id="returnBody"></div>
            <div id="search">
                <form action="search.php" method="POST">
                    <p><input type="text" name="querySearch" placeholder="Искать..." class="formSearch"></p>
                    <p><input type="submit" value="Поиск" class="btnSearch"></p>
                </form>
            </div>
        </div> -->
        
        <header> 
            <p>Добавление нового оборудования МФУ</p>
        </header>
        <div id="leftBar">
            <div id="logo">Polyan</div>
            <div id="currentPage"><a href="#"><ul><li><img src="img/add.png" alt="">Добавление записи</li></a></ul></div>
            <div id="menu">
                <ul>
                    <a href="showDB.php"><li><img src="img/list.png" alt="">Посмотреть записи</li></a>
                    <a href="#" onclick="showSearch()"><li><img src="img/search.png" alt="">Поиск по БД</li></a> <div id="srch"> <form action="search.php" method="POST"> <input type="text" placeholder="Фирма" name="querySearch"> <input type="submit" value="искать"> </form> </div>
                    <a href="compendium.php"><li><img src="img/compendium.png" alt="">Справка о программе</li></a>
                    <a href="managUser.php"><li><img src="img/managUser.png" alt="">Руководство пользователя</li></a>
                    <a href="about.php"><li><img src="img/about.png" alt="">О разработчике</li></a>
                </ul>
            </div>
            <hr>
            <div id="user"><img src="img/user.png" alt="">Александр <pre>    </pre> <img src="img/arrowDown.png" alt=""></div>
        </div>

        <div class="main">
            <div id="block1">
                <form action="" method="POST">
                    <h3>Основная информация</h3> <hr>
                    <p>Инвентарный номер </p> <ul class="lst"> <li><input class="inputNew" type="number" name="temp0" placeholder="Инвентарный номер" min="1" onblur="checkValue()"></li> <li><div class="hint">Например: 702, 703, 704...</div></li> <li> <div id="lockedID" onMouseOver="lockID()" data-tooltip="Заняты: 701, 702...">?</div> </li> </ul> <hr> <br>
                    <p>Фирма </p> <ul class="lst"> <li><input class="inputNew" type="text" name="firm" placeholder="Фирма"></li> <li><div class="hint">Например: MSI, Lenovo, DNS...</div></li></ul> <br>
                    <p>Модель </p> <ul class="lst"> <li> <input class="inputNew" type="text" name="model" placeholder="Модель"></li> <li><div class="hint">Например: 6500-MX, Dondo 2...</div></li> </ul> <hr> <br>
                    <p>Аудитория </p> <ul class="lst"> <li><input class="inputNew" type="number" name="room" placeholder="Аудитория" min="100"></li> <li><div class="hint">Например: 102, 306, 439...</div></li> </ul> <br>
                    <p>Дата поступления </p> <ul class="lst"> <li><input class="inputNew" type="date" name="dateBuy" placeholder="Дата приобретения"></li> <li><div class="hint">Например: 21.03.2019, 01.01.2001...</div></li> </ul> <br>
                    <p>Дата ввода в эксплуатацию  <ul class="lst"></p> <li><input class="inputNew" type="date" name="dateExpl" placeholder="Дата ввода в эксплуатацию"></li> <li><div class="hint">Например: 21.03.2019, 01.01.2001...</div></li> </ul> <br>
                    <p>Срок амортизации </p> <ul class="lst"> <li><input class="inputNew" type="number" name="yearAmortis" placeholder="Срок амортизации в годах" min="0"></li> <li><div class="hint">Например: 4, 5, 6...</div></li> </ul> <hr> <br>
                    <p>Ответственное лицо </p> <ul class="lst"> <li><input class="inputNew" type="text" name="person" placeholder="Ответственное лицо"></li> <li><div class="hint">Например: Полякин, Васильев...</div></li> </ul> <hr> <br>
                    <!-- <h3>Характеристики МФУ</h3>
                    <h4>Принтер</h4>
                    <p>Тип принтера </p> <input type="text" name="typePrinter" placeholder="Тип принтера"> <br>
                    <p>Цвет печати </p> <input type="text" name="colorPrinter" placeholder="Цвет печати"> <br>
                    <p>Максимальный формат </p> <input type="text" name="formatPrinter" placeholder="Максимальный формат"> <br>
                    <p>Автоматическая двусторонняя печать </p> <input type="text" name="twoSidedPrinter" placeholder="Двусторонняя печать"> <br>
                    <p>Максимальное разрешение </p> <input type="text" name="maxResolPrinter" placeholder="Максимальное разрешение"> <br>
                    <p>Скорость печати </p> <input type="text" name="speedPrinter" placeholder="Скорость печати"> <br>
                    <h4>Сканер</h4>
                    <p>Максимальное разрешение</p> <input type="text" name="maxResolScanner" placeholder="Максимальное разрешение"> <br>
                    <p>Максимальный формат </p> <input type="text" name="formatScanner" placeholder="Максимальный формат"> <br>
                    <h4>Копир</h4>
                    <p>Максимальное разрешение </p> <input type="text" name="maxResolCopyr" placeholder="Максимальное разрешение"> <br>
                    <p>Скорость обработки </p> <input type="text" name="speedCopyr" placeholder="Скорость обработки"> <br>
                    <p>Максимальная подача копий за цикл </p> <input type="text" name="maxCopyCopyr" placeholder="Максимальная подача копий за цикл"> <br>
                    <h4>Лотки</h4>
                    <p>Емкость подачи </p> <input type="text" name="capacityLot" placeholder="Емкость подачи"> <br>
                    <h4>Расходные материалы</h4>
                    <p>Поддерживаемая плотность носителей </p> <input type="text" name="supClosCons" placeholder="Поддерживаемая плотность"> <br>
                    <p>Количество картриджей </p> <input type="text" name="amountCons" placeholder="Количество картриджей"> <br>
                    <p>Модель оригинального картриджа </p> <input type="text" name="modelCons" placeholder="Модель картриджа"> <br>
                    <h4>Процессор и память</h4>
                    <p>Оперативная память </p> <input type="text" name="memory" placeholder="Оперативная память"> <br>
                    <p>Частота процессора </p> <input type="text" name="cpu" placeholder="Частота процессора"> <br>
                    <h4>Габариты</h4>
                    <p>Длина </p> <input type="text" name="len" placeholder="Длина"> <br>
                    <p>Ширина </p> <input type="text" name="width" placeholder="Ширина"> <br>
                    <p>Высота </p> <input type="text" name="height" placeholder="Высота"> <br>
                    <p>Вес </p> <input type="text" name="weight" placeholder="Вес"> <br> -->

                    <!-- <p>Количество </p> <input type="text" name="amount" placeholder="Количество"> <br> -->
                    <p><input type="submit" value="✔" class="submBtn">Добавить </p>
                    <?php 
            require_once 'connect.php';
            
            //Подключаем БД
            $link = mysqli_connect($host, $user, $password, $database)
                or die("Ошибка " . mysqli_error($link));

            // $content = "<strong>Value</strong>";
            // //Узнаем кол-во записей
            // $query = "SELECT * FROM `storage`";
            // $result = mysqli_query($link, $query);
            // if($result) {
            //     $rows = mysqli_num_rows($result); //количество полученных строк
            //     file_put_contents('id' . $rows  .  '.php', $content, FILE_APPEND);
            // }

            
            //Добавление элемента в БД
            if ($_POST['temp0'] != '' && $_POST['firm'] != '' && $_POST['model'] != '' && $_POST['room'] != '' && $_POST['person'] != '' && $_POST['dateBuy'] != '') {
                $query = "INSERT INTO `storage` (`temp0`, `firm`, `model`, `room`, `dateBuy`, `dateExpl`, `yearAmortis`, `person`, `status`) VALUES ('{$_POST['temp0']}', '{$_POST['firm']}', '{$_POST['model']}', '{$_POST['room']}', '{$_POST['dateBuy']}', '{$_POST['dateExpl']}', '{$_POST['yearAmortis']}', '{$_POST['person']}', 'в работе')";  
                $result = mysqli_query($link, $query);
                if($result == true) {
                    echo "<div class='infoOK'><p>Запись добавлена в БД.</p></div>";
                } else { echo "<div class='infoError'><p>Ошибка.</p></div>"; };
            } else echo "<div class='infoError'><p>Заполните данные полностью.</p></div>";
            mysqli_close($link);
        ?>
                </form>
            </div>
        </div>
    <script src="js/index.js"></script>
    </body>
</html>