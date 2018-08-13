<?php
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn,$user,$password);
?>

<?php
header('Content-Type: text/html; charset=UTF-8');
if($_POST["editing"] != null and $_POST["name2"] != null and $_POST["comment2"] != null){
	$id = $_POST["editing"];
	$name = $_POST["name2"];
	$comment = $_POST["comment2"];
	$sql = $pdo -> prepare('SELECT * FROM mission41');
	$sql -> execute();
	$results = $sql -> fetchAll();
	$row = $results["$id"] ;
	$pass = $row[3];

	$sql2 = "update mission41 set name='$name' ,comment='$comment' ,pass='$pass' where id = $id";
	$results2 = $pdo -> query($sql2);
}
?>

<!DOCTYPE html>

	<head>
		<!--下行は文字化け防止-->
		<meta charset="utf-8">
	</head>

	<body>
		<form action="mission_3-6_Tsuchi.php" method="post">
			<input type="submit" value="確認画面へ">
		</form>
	</body>

<html>
