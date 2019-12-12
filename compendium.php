<!DOCTYPE html>
<html>
    <head>
        <title>Справка о программе</title>
        <link rel="stylesheet" href="css/general.css">
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
            <p>Справка о программе</p>
        </header>
        <div id="leftBar">
            <div id="logo">Polyan</div>
            <div id="currentPage"><a href="#"><ul><li><img src="img/add.png" alt="">Добавление записи</li></a></ul></div>
            <div id="menu">
                <ul>
                    <a href="showDB.php"><li><img src="img/list.png" alt="">Посмотреть записи</li></a>
                    <a href="search.php"><li><img src="img/search.png" alt="">Поиск по БД</li></a>
                    <a href="compendium.php"><li><img src="img/compendium.png" alt="">Справка о программе</li></a>
                    <a href="managUser.php"><li><img src="img/managUser.png" alt="">Руководство пользователя</li></a>
                    <a href="about.php"><li><img src="img/about.png" alt="">О разработчике</li></a>
                </ul>
            </div>
            <hr>
            <div id="user"><img src="img/user.png" alt="">Александр <pre>    </pre> <img src="img/arrowDown.png" alt=""></div>
        </div>

        <div class="main">
            <pre>
Веб-сайт создан с использованием языка программирования PHP, Javascript,
                                 языка гиперразметки HTML,
                                 таблицы стилей CSS,
                                 СУБД phpMyAdmin MySQL,
                                 и библиотеки PHPExcel.
            </pre>
        </div>
    </body>
</html>