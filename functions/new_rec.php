<?php require_once('../functions/connect.php') ?>
<?php session_start(); ?>
<?php
$header = $_POST["header"];
$text = $_POST["text"];
$id = $_SESSION['login'];
if (isset($_POST['save'])) {
    if ($header != '' && $text != '') {
        $row = "INSERT INTO `records` (`id`, `heading`, `text`) VALUES ('$id','$header','$text')";
        $query =  $pdo->query($row);
        // $query->execute(["id" => 2, "header" => $heading, "text" => $text]);
    }
}
echo '<script>window.location.replace("../index.php");</script>';
?>