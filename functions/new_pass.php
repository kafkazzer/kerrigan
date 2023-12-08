<?php require_once('../functions/connect.php') ?>
<?php session_start(); ?>
<?php
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$pass3 = $_POST['pass3'];

$sql = $pdo->prepare("SELECT password FROM `users` WHERE id=$_SESSION[login]");
$sql->execute();
$res = $sql->fetch(PDO::FETCH_OBJ);
if ($pass1 == $res ->password) {
    if ($pass2 == $pass3) {
        $row = "UPDATE `users` SET `password`='$pass2' WHERE id=$_SESSION[login]";
        $query = $pdo->query($row);
    }
}
echo '<script>window.location.replace("../public/profile.php");</script>';
?>