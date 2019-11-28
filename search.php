<!DOCTYPE html>
<html>
<head>
    <title>Поиск по БД</title>
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

    if(empty($_POST['querySearch'])) {
        echo "Ничего не передано.";
    } else $qS = $_POST['querySearch'];

    $query = "SELECT * FROM storage WHERE name = '$qS'";
    $result = mysqli_query($link, $query);
    if($result) {
        echo "<ul class='main'>";
    while ($row = mysqli_fetch_row($result)) {
        echo "<li>Артикул: $row[0]</li>";
        echo "<li>Название: $row[1]</li>";
        echo "<li>Аудитория: $row[2]</li>";
        echo "<li>Срок амортизации: $row[3]</li>";
        echo "<li>Ответственный: $row[4]</li>";
    }
    echo "</ul>";
     
    mysqli_free_result($result);
    }
?>