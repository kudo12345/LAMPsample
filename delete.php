<?php

$dsn = 'mysql:dbname=sample_db;host=localhost;';
$user = 'kudo2';
$password = 'MyNewPass4!';

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = $_GET['id'];
    //$name = $_POST["name"];
    //$age = $_POST["age"];
    $sql = "delete from user where id=:id";
    $stmt = $dbh->prepare($sql);
    $params = array(':id' => $id);
    //$result = $dbh->query($sql);
    $stmt->execute($params);
    header('Location: index.php?fg = 1');
} catch (PDOException $e) {
    //echo "接続失敗: " . $e->getMessage() . "\n";
    header('Location: index.php?fg = 2? err=$e -> getMessage()');
    exit();
}
?>