<?php
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn,$user,$password);
?>

<?php
header('Content-Type: text/html; charset=UTF-8');
if($_POST["editing"] != null and $_POST["name"] != null and $_POST["pass"] != null){
	$editing = $_POST["editing"];
	$name = $_POST["name"];
	$pass = $_POST["pass"];
	$sql = $pdo -> prepare('SELECT * FROM mission41');
	$sql -> execute();
	$results = $sql -> fetchAll();
	foreach ($results as $row){
		if($row[0] == $editing and $row[1] == $name and $row[3] == $pass){
?>

<!DOCTYPE html>

	<head>
		<!--下行は文字化け防止-->
		<meta charset="utf-8">
	</head>

	<body>
		<form action="mission_4-4_Tsuchi.php" method="post">
			<br>
			<h2>----------編集フォーム----------</h2>
			<br>
			<input type="hidden" name="editing" value="<?php echo $_POST["editing"]; ?>">
			編集対象番号: <?php echo $_POST["editing"]; ?><br>
			名前　　　　:<input type="text" name="name2" value="<?php echo $row['name']; ?>"><br>
			コメント　　:<input type="text" name="comment2" value="<?php echo $row['comment']; ?>">
			<input type="submit" value="編集">
		</form>

		<br>

		<form action="mission_4-5_Tsuchi.php" method="post">
			<input type="hidden" name="editing" value="<?php echo $_POST["editing"]; ?>">
			削除対象番号: <?php echo $_POST["editing"]; ?>
			<input type="submit" value="削除">
		</form>

	</body>

<html>

<?php
		}
		elseif ($row[0] == $editing and $row[1] != $name and $row[3] == $pass) {
			echo "名前に間違いがあります。";
		}
		elseif ($row[0] == $editing and $row[1] == $name and $row[3] != $pass) {
			echo "パスワードに間違いがあります。";
		}
		elseif ($row[0] == $editing and $row[1] != $name and $row[3] != $pass) {
			echo "入力に間違いがあります。";
		}
	}
}
else {
	echo "入力に間違いがあります。";
}
?>

<br>
<br>

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
