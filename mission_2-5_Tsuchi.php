<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
	</head>
	
	<body>
		<form action="mission_2-5_Tsuchi.php" method="post">
			名前：<input type="text" name="name" value=""><br>
			コメント：<input type="text" name="comment" value=""><br>
			パスワード：<input type="password" name="pass" value=""><br>
			<button type="submit">送信する</button>
		</form>
				
	</body>
	
<html>

<?php
	if($_POST["comment"] != null and $_POST["name"] != null and $_POST["pass"] != null){
		$filename = 'mission_2-5_Tsuchimine.txt';
		$file = file($filename);
		if(file_get_contents($filename) == null){
			$number = 1;
		}
		else{
			$number = count($file);
			$number++;
		}
		$line = $number.'<>'.$_POST["name"].'<>'.$_POST["comment"].'<>'.date("Y/m/d H:i:s").'<>'.$_POST["pass"].'<>';	
		$fp1 = fopen($filename, "a");
		fwrite($fp1, $line. PHP_EOL);
		fclose($fp1);
	}
	$filename = 'mission_2-5_Tsuchimine.txt';
	$file = file($filename);
	//ループ処理
	foreach($file as $newlines){
		$newline = explode('<>',$newlines);
		$implode = implode(' ',$newline);
		echo $implode."<br>";
	}
?>