<!DOCTYPE html>
<html>

	<head>
		<!--下行は文字化け防止-->
		<meta charset="utf-8">
	</head>
	
	<body>
		<form action="mission_2-4_Tsuchimine.php" method="post">
			編集対象番号：<input type="number" name="editing" value="">
			<input type="submit" value="送信する">
		</form>
				
	</body>
	
<html>

<?php
	//編集対象番号が0以下の時実行しない
	if($_POST["editing"] <= 0){
	}
	//編集対象番号に1以上の入力が必要
	else{
		$editing = $_POST["editing"];
		$filename = 'mission_2-1_Tsuchimine.txt';
		$file = file($filename);
		$fp2 = fopen($filename, "w");
		fwrite($fp2,'');
		//ループ処理
		foreach($file as $newtxts){
			//更に細かい配列に分解
			$newtxt = explode('<>',$newtxts);
			//一つ目の配列（投稿番号）が編集対象番号に一致したら実行
			if($newtxt[0] == $editing){
				
?>

<html>

	<head>
		<!--下行は文字化け防止-->
		<meta charset="utf-8">
	</head>
	
	<body>
		<form action="mission_2-4_Tsuchimine.php" method="post">
			<br>
			<h2>----------編集フォーム----------</h2>
			<br>
			編集対象番号：<input type="hidden" name="editing" value="<?php echo $_POST["editing"]; ?>"><br>
			　名前　：<input type="text" name="name2" value="<?php echo $newtxt[1]; ?>"><br>
			コメント：<input type="text" name="comment2" value="<?php echo $newtxt[2]; ?>"><br>
			<input type="submit" value="送信する">
		</form>
				
	</body>
	
<html>

<?php

				//編集フォームで編集対象番号が投稿番号に一致した場合実行
				if($_POST["name2"] != null and $_POST["comment2"] != null){
					$file3 = file($filename);
					$line3 = $editing.'<>'.$_POST["name2"].'<>'.$_POST["comment2"].'<>'.date("Y/m/d H:i:s");
					fwrite($fp2, $line3.PHP_EOL);
				}
				else{
					$line2 = $newtxt[0].'<>'.$newtxt[1].'<>'.$newtxt[2].'<>'.$newtxt[3];
					fwrite($fp2, $line2);
				}
			}
			//一つ目の配列（投稿番号）が編集対象番号に一致しない場合実行、コピーペースト
			elseif($newtxt[0] != $editing){
				$line2 = $newtxt[0].'<>'.$newtxt[1].'<>'.$newtxt[2].'<>'.$newtxt[3];
				fwrite($fp2, $line2);
			}
		}
		fclose($fp2);
	}
?>