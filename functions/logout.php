<?php
    session_start();
    unset($_SESSION['login']);
    unset($_SESSION['sing']);
    unset($_SESSION['promo_day']);
    $_SESSION['sing']='';
    $_SESSION['login']='';
    $_SESSION['promo_day']='';
    session_destroy();
    echo '<script>localStorage.clear()</script>';
    echo '<script>window.location.replace("../public/entrance.php");</script>';
?>