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
<?php session_start(); ?>
<?php
if (!empty($_SESSION['login'])):
    ?>

    <body>
        <div
            style="width: calc(100%-padding); background-color: var(--background); color:#333; padding:10px; text-align: center;">
            <h2>Задание на сегодня</h2>
        </div>
        <div class='container'>
            <?php
            date_default_timezone_set('UTC');
            $today = date('d');
            $sql = $pdo->prepare("SELECT header, text, id FROM random WHERE id=$today+$_SESSION[promo_day] LIMIT 1");
            $sql->execute();
            while ($res = $sql->fetch(PDO::FETCH_OBJ)):
                ?>
                <div class='big_center_text' data-aos="fade-up" data-aos-duration="1000">
                    <h2>
                        <?php echo $res->header ?>
                    </h2>
                    <p>
                        <?php echo $res->text ?>
                    </p>
                </div>
            <?php endwhile ?>
        </div>
        <div class='gr_curcle' style='top:40%; left: -30%;'></div>
        <div class='gr_curcle' style='top:26%; left: 30%; width: 150px; height: 150px;'></div>
        <div class='gr_curcle' style='top:50%; left: -30%; width: 200px; height: 200px;'></div>
        <?php include_once('../public/botton_menu.php') ?>
    <?php else:
    echo '<script>window.location.replace("../index.php");</script>';
    ?>
    <?php endif ?>
</body>

</html>