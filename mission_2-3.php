<!DOCTYPE html>
<html>

	<head>
		<!--下行は文字化け防止-->
		<meta charset="utf-8">
	</head>
	
	<body>
		<!--<form>で囲ったところがフォーム　actionは送信するアドレス　methodは送信方法の指定-->
		<form action="mission_2-3.php" method="post">
			<!--typeには入力できるデータの種類　nameはデータの種類（各自で設定可能）　valueは空欄にもともと入れておくことのできるデータ-->
			削除対象番号：<input type="number" name="delete" value="">
			<!--<button>で囲まれたところはボタンになる　”送信する”はボタンの柄-->
			<button type="submit">送信する</button>
		</form>
				
	</body>
	
<html>

<?php
	//空欄がある場合更新無し
	if($_POST["delete"] > 0){
		$filename = 'mission_2-1_Tsuchimine.txt';
		$file = file($filename);
		$delete = $_POST["delete"];
		$fp2 = fopen($filename, "w");
		fwrite($fp2,'');
		foreach($file as $newtxts){
			//$newlineの中の<>で分割して<>を消去
			$newtxt = explode('<>',$newtxts);
			if($newtxt[0] != $delete){
				$file2 = file($filename);
				if(file_get_contents($filename) == null){
					$number2 = 1;
				}
				else{
					//file関数で$filnameを行ごとに格納、count関数で行をカウント
					$number2 = count($file2);
					//格納してある行に+1
					$number2++;
				}
				$line2 = $number2.'<>'.$newtxt[1].'<>'.$newtxt[2].'<>'.$newtxt[3];
				fwrite($fp2, $line2);
			}
			else{
			}
		}
		fclose($fp2);
	}
?>