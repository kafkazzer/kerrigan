<?php require_once('connect.php') ?>
<?php session_start(); ?>
<?php
    $text = $_POST['text'];

    if($text == 'Today'){$_SESSION['promo_day'] = 0;}
    if($text == 'NextDay'){$_SESSION['promo_day'] = 1;}
    if($text == 'NextDay2'){$_SESSION['promo_day'] = 2;}
    echo '<script>window.location.replace("../public/profile.php");</script>';
?>