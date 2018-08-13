<!DOCTYPE html>
	<!--文字化け防止-->
	<head>
		<meta http-equiv="content-type" charset="utf-8">
	</head>
	
	<body>
		<!--フォームの下に表示-->
		<form action="mission_1-5.php" method="post">
			<input type="text" name="comment" value="">
			<button type="submit">送信する</button>
		</form>
	</body>
	 
	<body>
		<p class="message">
			<?php
			if(empty($_POST["comment"])){
			}
			elseif($_POST["comment"] == "team C"){
				echo "we are だいやもんど！";
			}
			else{
				$filename = 'mission_1-5_Tsuchimine.txt';
				$post = fopen($filename, 'w');
				fwrite($post, $_POST["comment"]);
				fclose($post);
				$post = file_get_contents($filename);
				echo $post;
			}
			?>
		</p>
	</body>
	
</html>		