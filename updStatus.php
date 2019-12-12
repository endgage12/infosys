<?php 
    require_once 'connect.php';

    //Подключаем БД
    $link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));

    if(isset($_POST['updStatus'])) {
        if(isset($_POST['status'])) $stat = $_POST['status'];
        if(isset($_POST['temp0'])) $id = $_POST['temp0'];

        //Поменять статус
        $query = "UPDATE `storage` SET `status`= '$stat' WHERE `temp0`= '$id'";
        $result = mysqli_query($link, $query);
    }

    if(isset($_POST['updData'])) {
        if(isset($_POST['dateExpl'])) $dateExpl = $_POST['dateExpl'];
        if(isset($_POST['temp0'])) $id = $_POST['temp0'];

        //проверка на ошибочную дату
        $query = "SELECT `dateBuy` FROM `storage` WHERE `temp0`= '$id'";
        $result = mysqli_query($link, $query);
        if($result) {
            $row = mysqli_fetch_row($result);
            if($row[0] > $dateExpl) $dateExpl = $row[0];
        }

        //Поменять статус на рабочий
        $query = "UPDATE `storage` SET `status`= 'в работе' WHERE `temp0`= '$id'";
        $result = mysqli_query($link, $query);

        //Поменять дату введения в эксплуатацию
        $query = "UPDATE `storage` SET `dateExpl`= '$dateExpl' WHERE `temp0`= '$id'";
        $result = mysqli_query($link, $query);
    }

    if(isset($_POST['updRepair'])) {
        if(isset($_POST['dateRepair'])) $dateRepair = $_POST['dateRepair'];
        if(isset($_POST['temp0'])) $id = $_POST['temp0'];

        //Ремонт
        $query = "UPDATE `storage` SET `dateRepair`= '$dateRepair' WHERE `temp0`= '$id'";
        $result = mysqli_query($link, $query);

        //Поменять статус на рабочий
        $query = "UPDATE `storage` SET `status`= 'в ремонте' WHERE `temp0`= '$id'";
        $result = mysqli_query($link, $query);
    }

    if(isset($_POST['updRoom'])) {
        if(isset($_POST['room'])) $room = $_POST['room'];
        if(isset($_POST['temp0'])) $id = $_POST['temp0'];

        if($room < 100 || $room > 439) {
            $room = 0;
        }

        //Поменять аудиторию
        $query = "UPDATE `storage` SET `room`= '$room' WHERE `temp0`= '$id'";
        $result = mysqli_query($link, $query);
    }

    if(isset($_POST['del'])) {
        if(isset($_POST['temp0'])) $id = $_POST['temp0'];

        //Удалить
        $query = "DELETE FROM `storage` WHERE `temp0`= '$id'";
        $result = mysqli_query($link, $query);
    }
    header("Location: http://enigma/showDB.php");
    exit();
?>
