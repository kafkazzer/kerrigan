<?php  require_once('../functions/connect.php')?>
<?php session_start(); ?>
<?php
$login = $_POST["login"];
$password = $_POST["password"];

$sql = $pdo->prepare("SELECT id,login FROM users WHERE login=:login AND password=:password");
$sql->execute(array('login' => $login, 'password' => $password));
$array = $sql->fetch(PDO::FETCH_ASSOC);
if ($array["id"] > 0) {
    $_SESSION['login'] = $array["id"];
    echo '<script>window.location.replace("../index.php");</script>';
}
else {
    echo '<script>window.location.replace("../public/entrance.php");</script>';
}
?>