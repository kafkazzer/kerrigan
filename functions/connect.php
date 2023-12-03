<?php
    $user = "root";
    $password = "";
    $host = "localhost";
    $db = "kerri";
    // $db = "cb80052_kerri";
    $dbh = 'mysql:host='.$host.';dbname='.$db.';charset=utf8';
    $pdo = new PDO($dbh, $user, $password);

    // $sql = $pdo->prepare("SELECT * FROM about ");
    // $sql->execute();
    // $res = $sql->fetch(PDO::FETCH_OBJ);
?>
