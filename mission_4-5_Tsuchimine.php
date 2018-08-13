<?php
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn,$user,$password);
?>

<?php
header('Content-Type: text/html; charset=UTF-8');
$editing = $_POST["editing"];

$sql = $pdo -> prepare('SELECT * FROM mission41');
$sql -> execute();
$results = $sql -> fetchAll();
//元々のテーブルにあったデータを格納

$sql2 = "DELETE FROM mission41";
$res = $pdo -> query($sql2);
//テーブル内の全データを削除
$co = count($results);
$co--;

for ($i = 0; ; $i++) {
	if ($i > $co) {
		break;
	}
	elseif ($results[$i][0] == $editing) {
		echo "データの削除を確認致しました";
		echo date("Y年m月d日 H時i分s秒");
	}
	elseif ($results[$i][0] != $editing) {
		//テーブル内にデータを書き込む準備
		$sql3 = $pdo -> prepare(
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
		$sql3 -> bindParam(':id', $dbid, PDO::PARAM_INT);
		$sql3 -> bindParam(':name', $dbname, PDO::PARAM_STR);
		$sql3 -> bindParam(':comment', $dbcomment, PDO::PARAM_STR);
		$sql3 -> bindParam(':pass', $dbpass, PDO::PARAM_STR);

		$sql4 = $pdo -> prepare('SELECT id FROM mission41');
		$sql4 -> execute();
		$results4 = $sql4 -> fetchAll();

		$line = count($results4);
		$line++;

		$dbid = $line;
		$dbname = $results[$i][1];
		$dbcomment = $results[$i][2];
		$dbpass = $results[$i][3];
		$sql3 -> execute();
	}
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
