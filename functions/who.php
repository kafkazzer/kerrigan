<?php  require_once('connect.php')?>
<?php 
    $id = $_GET['text'];
    $sql = $pdo->prepare("SELECT heading, text FROM records WHERE true_id='$id'");
    $sql->execute();
    $res = $sql->fetch(PDO::FETCH_OBJ);
    $arr = [$res -> heading, $res -> text];
    echo json_encode($arr);
?>