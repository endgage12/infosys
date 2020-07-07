<!DOCTYPE html>
<html>
    <head>
        <title>ИНФОРМАЦИОННАЯ СИСТЕМА ИНВЕНТАРНОГО УЧЁТА</title>
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
                <p>Добавление новой единицы</p> <hr>
                <form action="" method="POST">
                    <p>Артикул </p> <input type="text" name="article" placeholder="Артикул"> <br>
                    <p>Фирма </p> <input type="text" name="name" placeholder="Фирма"> <br>
                    <p>Модель </p> <input type="text" name="name" placeholder="Модель"> <br>
                    <p>Аудитория </p> <input type="text" name="room" placeholder="Аудитория"> <br>
                    <p>Год приобретения </p> <input type="text" name="dateBuy" placeholder="Год приобретения"> <br>
                    <p>Срок амортизации в годах </p> <input type="text" name="amortis" placeholder="Срок амортизации в годах"> <br>
                    <p>Ответственное лицо </p> <input type="text" name="person" placeholder="Ответственное лицо"> <br>
                    <p>Количество </p> <input type="text" name="amount" placeholder="Количество"> <br>
                    <p><input type="submit" value="Отправить"></p>
                    <?php 
            require_once 'connect.php';
            $article = $_POST['article'];
            $name = $_POST['name'];
            $room = $_POST['room'];
            $amortis = $_POST['amortis'];
            $person = $_POST['person'];
            
            //Подключаем БД
            $link = mysqli_connect($host, $user, $password, $database)
                or die("Ошибка " . mysqli_error($link));

            if ($article != '' && $name != '' && $room != '' && $amortis != '' && $person != '') {
                $query = "INSERT INTO `storage` (`article`, `name`, `room`, `amortis`, `person`) VALUES ('{$_POST['article']}', '{$_POST['name']}', '{$_POST['room']}', '{$_POST['amortis']}', '{$_POST['person']}')"; 
                $result = mysqli_query($link, $query);
                if($result == true) {
                    echo "<div class='infoOK'><p>Запись добавлена в БД.</p></div>";
                } else { echo "Ошибка."; };
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
