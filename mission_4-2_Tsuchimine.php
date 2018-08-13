<?php
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn,$user,$password);
?>

<?php
if($_POST["comment"] != null and $_POST["name"] != null and $_POST["pass"] != null){
	$sql = $pdo -> prepare(
	'INSERT INTO mission41 (
		id,
		name,
		comment,
		pass
	)
	VALUES (
		:id,
		:name,
		:comment,
		:pass
	)'
		);
	$sql -> bindParam(':id', $dbid, PDO::PARAM_INT);
	$sql -> bindParam(':name', $dbname, PDO::PARAM_STR);
	$sql -> bindParam(':comment', $dbcomment, PDO::PARAM_STR);
	$sql -> bindParam(':pass', $dbpass, PDO::PARAM_STR);

	$sql2 = $pdo -> prepare('SELECT id FROM mission41');
	$sql2 -> execute();
	$results = $sql2 -> fetchAll();

	$line = count($results);
	$line++;

	$dbid = $line;
	$dbname = $_POST["name"];
	$dbcomment = $_POST["comment"];
	$dbpass = $_POST["pass"];
	$sql -> execute();
}
?>

<!DOCTYPE html>

	<head>
		<!--L6は文字化け防止-->
		<meta charset="utf-8">
	</head>

	<body>
		<p class="message">
			ご入力ありがとうございます。<br>
			<?php
			echo date("Y年m月d日 H時i分s秒");
			?>
			に投稿番号
			<?php
			echo $line."で";
			echo $_POST["comment"];
			?>
			を受け付けました。
		</p>
	</body>

	<br>
	<br>

	<body>
		<form action="mission_4-2_Tsuchi.html" method="post">
			<button type="submit">入力画面へ</button>
		</form>

	</body>

	<body>
		<form action="mission_3-6_Tsuchi.php" method="post">
			<input type="submit" value="確認画面へ">
		</form>
	</body>

<html>
