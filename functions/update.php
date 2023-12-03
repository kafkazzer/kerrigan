<?php require('../functions/connect.php')?>
<?php
    $header = $_POST["header"];
    $text = $_POST["text"];
    $who = $_POST["save_place"];
    if($header != '' && $text != ''){
        $row = "UPDATE `records` SET `heading`='$header',`text`='$text' WHERE `true_id` = '$who'";
        $query = $pdo->query($row);
        // $query->execute(["header" => $heading, "text" => $text]);
    }
    if(isset($_POST['delete'])){
        $row = "DELETE FROM `records` WHERE `true_id` = '$who'";
        $query = $pdo->query($row);
    }
    echo '<script>window.location.replace("../index.php");</script>';
?>