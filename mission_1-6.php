<!DOCTYPE html>
<html>
	<!--文字化け防止-->
	<head>
		<meta charset="utf-8">
	</head>
	
	<body>
		<!--フォームの下に表示-->
		<form action="mission_1-6.php" method="post">
			<input type="text" name="comment" value="">
			<button type="submit">送信する</button>
		</form>
	</body>
	 
	<body>
		<p class="message">
			<?php
			if(empty($_POST["comment"])){
			}
			else{
				$filename = 'mission_1-6_Tsuchimine.txt';
				$post = fopen($filename, 'a');
				fwrite($post, $_POST["comment"].PHP_EOL);
				fclose($post);
			}
			?>
		</p>
	</body>
	
</html>		