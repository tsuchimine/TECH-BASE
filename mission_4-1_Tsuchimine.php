<?php
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn,$user,$password);

$sql = 'CREATE TABLE mission41 (
			id INT(11),
			name VARCHAR(12),
			comment VARCHAR(20),
			pass VARCHAR(8)
			)';
$stmt = $pdo -> query($sql);
?>
