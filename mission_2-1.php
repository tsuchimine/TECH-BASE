<!DOCTYPE html>
<html>

	<head>
		<!--下行は文字化け防止-->
		<meta charset="utf-8">
	</head>
	
	<body>
		<!--<form>で囲ったところがフォーム　actionは送信するアドレス　methodは送信方法の指定-->
		<form action="mission_2-1.php" method="post">
			<!--typeには入力できるデータの種類　nameはデータの種類（各自で設定可能）　valueは空欄にもともと入れておくことのできるデータ-->
			  名   前  ：<input type="text" name="name" value=""><br>
			コメント：<input type="text" name="comment" value=""><br>
			<!--<button>で囲まれたところはボタンになる　”送信する”はボタンの柄-->
			<button type="submit">送信する</button>
		</form>
				
	</body>
	
<html>

<?php
	//空欄がある場合更新無し
	if($_POST["comment"] != "" and $_POST["name"] != ""){
		$filename = 'mission_2-1_Tsuchimine.txt';
		$file = file($filename);
		if(file_get_contents($filename) == null){
			$number = 1;
		}
		else{
			//file関数で$filnameを行ごとに格納、count関数で行をカウント
			$number = count($file);
			//格納してある行に+1
			$number++;
		}
		//描きたいものを1行にまとめる
		$line = $number.'<>'.$_POST["name"].'<>'.$_POST["comment"].'<>'.date("Y/m/d H:i:s");	
		$fp1 = fopen($filename, "a");
		fwrite($fp1, $line. PHP_EOL);
		fclose($fp1);
	}
?>
