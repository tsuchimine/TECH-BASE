<!DOCTYPE html>
<html>

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
			に
			<?php
				echo $_POST["comment"]
			?>
			を受け付けました
		</p>
	</body>
	
</html>