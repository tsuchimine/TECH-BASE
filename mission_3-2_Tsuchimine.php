<?php
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn,$user,$password);

$sql = 'CREATE TABLE test (
			id INT(11),
			name VARCHAR(20),
			comment TEXT
			)';
$stmt = $pdo -> query($sql);
?>
