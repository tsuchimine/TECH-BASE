<?php
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn,$user,$password);

$sql = 'SHOW CREATE TABLE mission41';
$result = $pdo -> query($sql);
foreach ($result as $row){
	echo "<pre>";
	print_r($row);
	echo "</pre>";
}
echo "<hr>";
?>
