<?php
	if($_POST["delet"] > 0){
?>

<!DOCTYPE html>
<html>

	<head>
		<!--下行は文字化け防止-->
		<meta charset="utf-8">
	</head>
	
	<body>
		<form action="mission_2-5-b_Tsuchi.php" method="post">
			<br>
			<h2>----------削除フォーム----------</h2>
			<br>
			削除対象番号：<input type="hidden" name="delet" value="<?php echo $_POST["delet"]; ?>"><br>
			パスワード：<input type="password" name="pass1" value=""><br>
			<input type="submit" value="送信する">
		</form>
				
	</body>
	
<html>

<?php
		if(isset($_POST["pass1"])){
			$filename = 'mission_2-5_Tsuchimine.txt';
			$file = file($filename);
			$delet = $_POST["delet"];
			$fp1 = fopen($filename, "w");
			fwrite($fp1,'');
			foreach($file as $newtxts){
				$newtxt = explode('<>',$newtxts);
				if($newtxt[0] == $delet and $_POST["pass1"] == $newtxt[4]){
					echo "データの削除を確認致しました";
					echo date("Y年m月d日 H時i分s秒");
				}
				elseif($newtxt[0] != $delet){
					$file1 = file($filename);
					if(file_get_contents($filename) == null){
						$number1 = 1;
					}
					else{
						$number1 = count($file1);
						$number1++;
					}
					$line1 = $number1.'<>'.$newtxt[1].'<>'.$newtxt[2].'<>'.$newtxt[3].'<>'.$newtxt[4].'<>';
					fwrite($fp1, $line1.PHP_EOL);
				}
			
			}
			fclose($fp1);
		}
	}
?>

<?php
//編集対象番号に1以上の入力が必要
if($_POST["editing"] > 0){
?>

<!DOCTYPE html>
<html>

	<head>
		<!--下行は文字化け防止-->
		<meta charset="utf-8">
	</head>
	
	<body>
		<form action="mission_2-5-b_Tsuchi.php" method="post">
			編集対象番号：<input type="hidden" name="editing" value="<?php echo $_POST["editing"]; ?>"><br>
			パスワード：<input type="password" name="pass2" value=""><br>
			<input type="submit" value="送信する">
		</form>
				
	</body>
	
<html>

<?php
	if(isset($_POST["pass2"])){
		$editing = $_POST["editing"];
		$filename = 'mission_2-5_Tsuchimine.txt';
		$file2 = file($filename);
		$fp2 = fopen($filename, "w");
		fwrite($fp2,'');
		//ループ処理
		foreach($file2 as $newtxts2){
			//更に細かい配列に分解
			$newtxt2 = explode('<>',$newtxts2);
			//一つ目の配列（投稿番号）が編集対象番号に一致したら実行
			if($newtxt2[0] == $editing and $_POST["pass2"] == $newtxt2[4]){
				
?>

<html>

	<head>
		<!--下行は文字化け防止-->
		<meta charset="utf-8">
	</head>
	
	<body>
		<form action="mission_2-5-b_Tsuchi.php" method="post">
			<br>
			<h2>----------編集フォーム----------</h2>
			<br>
			編集対象番号：<input type="hidden" name="editing" value="<?php echo $_POST["editing"]; ?>"><br>
			　名前　：<input type="text" name="name2" value="<?php echo $newtxt2[1]; ?>"><br>
			コメント：<input type="text" name="comment2" value="<?php echo $newtxt2[2]; ?>"><br>
			パスワード：<input type="hidden" name="pass2" value="<?php echo $_POST["pass2"]; ?>"><br>
			<input type="submit" value="送信する">
		</form>
				
	</body>
	
<html>

<?php

				//編集フォームで2つとも書き込まれた場合実行
				if($_POST["name2"] != null and $_POST["comment2"] != null){
					$file3 = file($filename);
					$line3 = $editing.'<>'.$_POST["name2"].'<>'.$_POST["comment2"].'<>'.date("Y/m/d H:i:s").'<>'.$_POST["pass2"].'<>';
					fwrite($fp2, $line3.PHP_EOL);
					echo "データの編集を確認致しました";
					echo date("Y年m月d日 H時i分s秒");
				}
				else{
					$line2 = $newtxt2[0].'<>'.$newtxt2[1].'<>'.$newtxt2[2].'<>'.$newtxt2[3].'<>'.$newtxt2[4].'<>';
					fwrite($fp2, $line2.PHP_EOL);
				}
			}
			//一つ目の配列（投稿番号）が編集対象番号に一致しない場合実行、コピーペースト
			elseif($newtxt2[0] != $editing){
				$line2 = $newtxt2[0].'<>'.$newtxt2[1].'<>'.$newtxt2[2].'<>'.$newtxt2[3].'<>'.$newtxt2[4].'<>';
				fwrite($fp2, $line2.PHP_EOL);
			}
		}
		fclose($fp2);
	}
}
?>