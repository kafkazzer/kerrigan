<?php require_once('../functions/connect.php') ?>
<?php session_start(); ?>
<?php
$login = $_POST["login"];
$password = $_POST["password"];
$name = $_POST["name"];
$date = $_POST["date"];

$sql = $pdo->prepare("SELECT id,login FROM users WHERE login=:login");
$sql->execute(array('login' => $login));
$array = $sql->fetch(PDO::FETCH_ASSOC);
if (($array["id"] > 0) and ($login != '') and ($password != '') and ($name != '')) {
    echo '<script>window.location.replace("../public/entrance.php");</script>';
    echo 'какой то чувак с таким логиным уже есть';
} else {
    $row = "INSERT INTO `users` (`name`, `login`, `password`,`data`) VALUES ('$name', '$login', '$password', '$date')";
    $query = $pdo->query($row);
    $sql = $pdo->prepare("SELECT id FROM users WHERE login = $login");
    $sql->execute();
    while ($res = $sql->fetch(PDO::FETCH_OBJ)) {
        $_SESSION['login'] = $res->id;
    }
    // $_SESSION['login'] = 17;
    echo '<script>window.location.replace("../index.php");</script>';
    // echo '<script>window.location.replace("../public/entrance.php?reef");</script>';
}
?>