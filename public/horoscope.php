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

    <body class='container-fluid'>
        <header class='menu'>
            <h2>Гороскоп на сегодня</h2>
        </header>
        <div class='container' style="justify-content: center;">
            <div class='center_me'>
            <?php
            if (empty($_SESSION['sing'])) {
                //если сесии нет то записать из базы
                //да я просто надеюсь что в базе есть знак
                $sql = $pdo->prepare("SELECT sing FROM users WHERE id=$_SESSION[login]");
                $sql->execute();
                $res = $sql->fetch(PDO::FETCH_OBJ);
                $_SESSION['sing'] = $res->sing;
            }
            $sql = $pdo->prepare("SELECT sing FROM users WHERE id=$_SESSION[login]");
            $sql->execute();
            $array = $sql->fetch(PDO::FETCH_ASSOC);
            if ($array["sing"] == NULL) {
                //Если знака нет то записать его из сессии
                //да и здесь я просто надеюсь что он тут будет
                $row = "UPDATE `users` SET `sing`='$_SESSION[sing]' WHERE id=$_SESSION[login]";
                $query = $pdo->query($row);
            }
            $sql = $pdo->prepare("SELECT sing, text, id, true_id FROM horoscope WHERE id=1+$_SESSION[promo_day] AND sing = '$_SESSION[sing]' LIMIT 1");
            $sql->execute();
            while ($res = $sql->fetch(PDO::FETCH_OBJ)):
                ?>
                <div class='big_center_text horoscope_block' data-aos="fade-up" data-aos-duration="1000"
                    style="background:white">
                    <h2>
                        <?php echo $res->sing; ?>
                    </h2>
                    <p>
                        <?php echo $res->text ?>
                    </p>
                </div>
            <?php endwhile ?>
            </div>
        </div>
        <?php include_once('../public/botton_menu.php') ?>
    <?php else:
    echo '<script>window.location.replace("../index.php");</script>';
    ?>
    <?php endif ?>
</body>

</html>