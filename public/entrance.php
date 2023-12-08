<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <header class='menu'>
        <h2>Kerrigan</h2>
    </header>
    <div class="container" data-aos="fade-up" data-aos-duration="1000"
        style="text-align:center; justify-content: center;">
        <div class='center_me'>
            <div class="big_center_text record_block" style='backdrop-filter: none;'>
        <h2>Вход</h2>
        <hr>
        <form action="../functions/entrance.php" method="post"><br>
            <input type="text" placeholder='Логин' name='login'><br>
            <input type="password" placeholder='Пароль' name='password'>
            <hr>
            <input type="submit" value='Войти'><a onclick="add_records()" style='margin-left: 40px' class="ent_a">Нет
                аккаунта?</a>
        </form>
    </div>
    </div>
    </div>
    <div id='modal_overlay'>
        <div class='record_block modal_block reg_block' id='modal_block2' style='visibility: hidden;'>
            <form method='post' action="../functions/reg.php">
                <input type="text" placeholder='Имя' name='name'><br>
                <input type="text" placeholder='Логин' name='login'><br>
                <input type="date" placeholder='Дата рождения' name='date' id='date_block' value="2023-01-01"
                    min="1900-01-01" max="2023-12-31"><br>
                <input type="password" placeholder='Пароль' name='password'>
                <hr>
                <input type="submit" value="Сохранить" name='save' onclick="sptil_date1()">
                <input type="button" value="Закрыть" onclick="close_win()">
            </form>
        </div>
        <div id='modal_block'></div>
    </div>
    <script src='../js/app.js'></script>
    <script src='../js/date.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>

</html>