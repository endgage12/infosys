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
                    <p>Инвентарный номер </p> <input type="text" name="article" placeholder="Инвентарный номер"> <br>
                    <p>Фирма </p> <input type="text" name="firm" placeholder="Фирма"> <br>
                    <p>Модель </p> <input type="text" name="model" placeholder="Модель"> <br>
                    <p>Аудитория </p> <input type="text" name="room" placeholder="Аудитория"> <br>
                    <p>Дата поступления </p> <input type="text" name="yearBuy" placeholder="Год приобретения"> <br>
                    <p>Срок амортизации </p> <input type="text" name="yearAmortis" placeholder="Срок амортизации в годах"> <br>
                    <p>Ответственное лицо </p> <input type="text" name="person" placeholder="Ответственное лицо"> <br>
                    <!-- <p>Количество </p> <input type="text" name="amount" placeholder="Количество"> <br> -->
                    <p><input type="submit" value="Отправить"></p>
                    <?php 
            require_once 'connect.php';
            $article = $_POST['article'];
            $content = 'Артикул: ' . $_POST['article'] . '/nФирма: ' . $_POST['firm'];
            
            //Подключаем БД
            $link = mysqli_connect($host, $user, $password, $database)
                or die("Ошибка " . mysqli_error($link));

            //Узнаем кол-во записей
            $query = "SELECT * FROM `storage`";
            $result = mysqli_query($link, $query);
            if($result) {
                $rows = mysqli_num_rows($result); //количество полученных строк
                file_put_contents('id' . $rows  .  '.php', $content, FILE_APPEND);
            }

            //Добавление элемента в БД
            if ($_POST['article'] != '' && $_POST['firm'] != '' && $_POST['model'] != '' && $_POST['room'] != '' && $_POST['person'] != '') {
                $query = "INSERT INTO `storage` (`article`, `firm`, `model`, `room`, `yearBuy`, `yearAmortis`, `person`) VALUES ('{$_POST['article']}', '{$_POST['firm']}', '{$_POST['model']}', '{$_POST['room']}', '{$_POST['yearBuy']}', '{$_POST['yearAmortis']}', '{$_POST['person']}')";  
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