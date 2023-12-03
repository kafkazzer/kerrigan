<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<?php require_once('../functions/connect.php') ?>
<?php session_start();?>
    <?php
        if(!empty($_SESSION['login'])): 
    ?>
<body>
    <?php
        $sql = $pdo -> prepare("SELECT name FROM `users` WHERE id=$_SESSION[login]");
        $sql->execute();
        $res = $sql->fetch(PDO::FETCH_OBJ);
        ?>
<div
        style="width: calc(100%-padding); background-color: var(--background); color:var(--text-color); padding:10px; text-align: center;">
        <h2 id='header_text'>Привет, <?php echo $res->name?></h2>
    </div>
    <div class='container profile_block'>
        <hr style='visibility:hidden; margin-bottom:0px'>
        <ladel><a onclick="add_records()">Промокод</a></ladel>
        <hr>
        <ladel><a>Сменить пароль</a></ladel>
        <hr>
        <label onclick='window.location.replace("../functions/logout.php");'><a style='color:#cc0605'>Выйти</a></label>
    </div>
    <div id='modal_overlay'>
    <div class='record_block modal_block' id='modal_block2' style='visibility: hidden;'>
            <form method='post' action="\functions\promo.php">
                <input type='text' placeholder="Промокод" name='text' id='promo_day'>
                <hr>
                <input type="submit" value="Ввести" name='save' onclick='promo()'>
                <input type="button" value="Закрыть" onclick="close_win()">
            </form>
        </div>
    </div>
    <div id='modal_block'></div>
<?php include_once('../public/botton_menu.php') ?>
    <?php else:
        // echo $_SESSION['login'].'<hr>';
        echo '<script>window.location.replace("/public/entrance.php");</script>';
    ?>
    <?php endif ?>
</body>
<script>
    if(localStorage.length != 0){
        header_text.innerHTML = localStorage.text;
    }
    </script>
</html>