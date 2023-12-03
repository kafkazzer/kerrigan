<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<?php require_once('functions/connect.php') ?>
<?php session_start(); ?>
<?php
if(empty($_SESSION['promo_day'])){$_SESSION['promo_day'] = 0;}
if (!empty($_SESSION['login'])):
    ?>

    <body>
        <div
            style="width: calc(100%-padding); background-color: var(--background); color:var(--text-color); padding:10px; text-align: center;">
            <h2>Записи</h2>
        </div>
        <div class='container'>
            <?php
            $sql = $pdo->prepare("SELECT heading, text, true_id FROM records WHERE id=$_SESSION[login] ORDER BY true_id DESC");
            $sql->execute();
            while ($res = $sql->fetch(PDO::FETCH_OBJ)):
                ?>
                <div class='record_block' data-aos="fade-up" data-aos-duration="1000">
                    <h2>
                        <?php echo $res->heading ?>
                    </h2>
                    <hr>
                    <p>
                        <?php echo $res->text ?>
                    </p>
                    <input type="submit" value="Редактровать" id="<?php echo $res->true_id ?>" onclick='update_redord(id)'>
                </div>
            <?php endwhile ?>
        </div>
        <div id='modal_overlay'>
            <div class='record_block modal_block' id='modal_block' style='visibility: hidden;'>
                <form method='post' action="\functions\update.php">
                    <input type='text' placeholder="Заголовок" name='header' id='up_header'>
                    <hr>
                    <textarea type="text" placeholder="Текст записи" name='text' id='up_text'></textarea>
                    <hr>
                    <input type="submit" value="Сохранить" name='save'>
                    <input type="submit" value="Удалить" name='delete'>
                    <input type="button" value="Закрыть" onclick="close_win()">
                    <input type='text' name='save_place' id='up_button' class="hidden" value='<?php echo $res->true_id ?>'>
                </form>
            </div>
            <div class='record_block modal_block' id='modal_block2' style='visibility: hidden;'>
                <form method='post' action="\functions\new_rec.php">
                    <input type='text' placeholder="Заголовок" name='header'>
                    <hr>
                    <textarea type="text" placeholder="Текст записи" name='text'></textarea>
                    <hr>
                    <input type="submit" value="Сохранить" name='save'>
                    <input type="button" value="Закрыть" onclick="close_win()">
                </form>
            </div>
        </div>
        <div id='btn3' class='btn_menu' onclick='add_records()'><img src="../icon/plus.png" class="image_size"></div>
        <?php include_once('public/botton_menu.php') ?>
    <?php else:
    // echo $_SESSION['login'].'<hr>';
    echo '<script>window.location.replace("../public/entrance.php");</script>';
    ?>
    <?php endif ?>
</body>

</html>