<?php
	//txtの呼び出し
	$filename = 'mission_1-6_Tsuchimine.txt';
	//file()で行ごとに配列で読み込み
	$array = file($filename);
	//foreach文で各配列を$lineにループ変換
	foreach($array as $line){
		//配列ごとの改行はブラウザ表示する為HTML形式
		echo $line. "<br/>";
	}
?>