<head>
	<meta charset="utf-8">
</head>

<?php
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn,$user,$password);

$sql = 'SELECT * FROM mission41';
$results = $pdo->query($sql);
foreach ($results as $row){
	//$rowの中にはテーブルのカラム名が入る
	echo $row['id']."\t";
	echo $row['name']."\t";
	echo $row['comment']."\t";
	echo $row['pass']."<br>";
}
?>
