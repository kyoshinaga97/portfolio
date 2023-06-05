<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="../css/reset.css">
	<link rel="stylesheet" href="../css/complete.css">
	<script src="../js/jquery-1.10.2.min.js"></script>
	<script src="../js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="../js/complete.js"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<?php

$post = $_SESSION['form'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//トークン取得
	$recaptcha = htmlspecialchars($_POST['g-recaptcha-response'],ENT_QUOTES,'UTF-8');
	
	if(isset($recaptcha)){
		$secret = "6LcaAl4mAAAAAK8JbFi0DWIvuaO_S5prsNqLTiHL";
		$res = @file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&resonse={$recaptcha}");
		$result =json_decode($res,true);
		
		if(intval($result["success"])!== 1){
			//エラー時処理　DEMOの為未実装
		}
	} else {
		echo "トークン無！！！！！！！";
	}?>
	<title>[DEMO]送信完了画面</title>
</head>	
	<body>
		<div class="frame">
			<div class="a1">
				<h1>お問合せ有難う御座いました。</h1>
				<div class="b2">
					<p class="co2">＊</P><p class="co2">DEMOサイトの為お問い合わせ内容は送信されません。</P>
				</div>
				<div class="btn_return">
					<div class="btn2">
						<a  href="../index.php">戻る</a>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<?PHP
}else{?>
	<title>お問合せ内容確認画面</title>
</head>
	<body>
		<div class="frame">
			<div class="a1">
				<h1>お問合せ確認画面</h1>
				<div class="b1">
					<p class="co1">お名前</p>
					<p class="post"><?php echo htmlspecialchars($post['name']); ?></p>
				</div>
				<div class="b1">
					<p class="co1">メールアドレス</p>
					<p class="post"><?php echo htmlspecialchars($post['email']); ?></p>
				</div>
				<div class="b1">
					<p class="co1">お問い合わせ内容</p>
					<p class="post"><?php echo nl2br(htmlspecialchars($post['comment'])); ?></p>
				</div>
				<!-- recaptcha -->
				<form action="?" method="POST">
					<div class="g-recaptcha" data-sitekey="6LcaAl4mAAAAAPL1NocEeXZcgfOf-UKkdZTX8tsu"></div>
					<br/>
					<div class="btn">
						<div class="btn2">
							<a  href="../index.php">戻る</a>
						</div>
						<div class="btn2">
							<button type="submit">送信</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>
<?php 
}
?>