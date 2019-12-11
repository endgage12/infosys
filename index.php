<!DOCTYPE html>
<html>
    <head>
        <title>Потом придумаю</title>
        <link rel="stylesheet" href="css/general.css">
        <link href="fonts/AnonymousPro-Regular.ttf" rel="stylesheet">
    </head>
    <body>
        <header> 
            <div id="search">
                <form action="search.php" method="POST">
                    <p><input type="text" name="querySearch" placeholder="Искать..." class="formSearch"></p>
                    <p><input type="submit" value="Поиск" class="btnSearch"></p>
                </form>
            </div>
        </header>
        
        <div class="main">
            <div id="block1">
                <p>Добавление нового оборудования МФУ</p> <hr>
                <form action="" method="POST">
                    <h3>Основная информация</h3>
                    <p>Инвентарный номер </p> <input type="text" name="temp0" placeholder="Инвентарный номер"> <br>
                    <p>Фирма </p> <input type="text" name="firm" placeholder="Фирма"> <br>
                    <p>Модель </p> <input type="text" name="model" placeholder="Модель"> <br>
                    <p>Аудитория </p> <input type="text" name="room" placeholder="Аудитория"> <br>
                    <p>Дата поступления </p> <input type="date" name="dateBuy" placeholder="Дата приобретения"> <br>
                    <p>Дата ввода в эксплуатацию </p> <input type="date" name="dateExpl" placeholder="Дата ввода в эксплуатацию"> <br>
                    <p>Срок амортизации </p> <input type="text" name="yearAmortis" placeholder="Срок амортизации в годах"> <br>
                    <p>Ответственное лицо </p> <input type="text" name="person" placeholder="Ответственное лицо"> <br>
                    <h3>Характеристики МФУ</h3>
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
                    <p>Вес </p> <input type="text" name="weight" placeholder="Вес"> <br>

                    <!-- <p>Количество </p> <input type="text" name="amount" placeholder="Количество"> <br> -->
                    <p><input type="submit" value="Отправить"></p>
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
            if ($_POST['temp0'] != '' && $_POST['firm'] != '' && $_POST['model'] != '' && $_POST['room'] != '' && $_POST['person'] != '') {
                $query = "INSERT INTO `storage` (`temp0`, `firm`, `model`, `room`, `dateBuy`, `dateExpl`, `yearAmortis`, `person`) VALUES ('{$_POST['temp0']}', '{$_POST['firm']}', '{$_POST['model']}', '{$_POST['room']}', '{$_POST['dateBuy']}', '{$_POST['dateExpl']}', '{$_POST['yearAmortis']}', '{$_POST['person']}')";  
                $result = mysqli_query($link, $query);
                if($result == true) {
                    echo "<div class='infoOK'><p>Запись добавлена в БД.</p></div>";
                } else { echo "<div class='infoError'><p>Ошибка.</p></div>"; };
            } else echo "<div class='infoError'><p>Ошибка, заполните данные полностью.</p></div>";
            mysqli_close($link);
        ?>
                </form>
            </div>
            <div id="block2">
                <p>Показать все позиции</p>
                <form action="showDB.php" method="POST">
                    <input type="submit" name="showData" value="Показать">
                </form>
            </div>
        </div>
    </body>
</html>