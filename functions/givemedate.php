<?php require_once('connect.php') ?>
<?php session_start(); ?>
<?php
    $sql = $pdo->prepare("SELECT data FROM `users` WHERE id=$_SESSION[login]");
    echo $sql;
?>