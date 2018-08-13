<?php
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn,$user,$password);

$id = 1;
$nm = "ハンバートハンバート";
$kome = "虎";
$sql = "update test set name='$nm' , comment='$kome' where id = $id";
$result = $pdo->query($sql);
?>
