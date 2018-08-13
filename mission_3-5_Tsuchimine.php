<?php
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn,$user,$password);

$sql = $pdo -> prepare(
'INSERT INTO test (
	id,
	name,
	comment
)
VALUES (
	1,
	:name,
	:comment
)'
	);
$sql -> bindParam(':name', $name, PDO::PARAM_STR);
$sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
$name = "あいみょん";
$comment = "マリーゴールド";
$sql -> execute();
?>
