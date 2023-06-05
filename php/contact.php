<?php


?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>contact</title>
    <link rel="stylesheet" href="css/reset.css"> 
	<link rel="stylesheet" href="css/style.css">
	
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="js/main.js"></script>
</head>
<body>
	<main>
		<div class="contact" id="contact">
			<h2>CONTACT</h2>
			<p><!-- contact -->
			ご覧いただき大変ありがとうございました！
			このサイトや私について少しでも気になる点や質問等御座いましたら、お気軽に下記フォームよりご連絡ください。<br>
			＊補足＊<br></p>
			<div class="p1">
				<p>・</p><p>DEMOサイトの為実際はお問い合わせ内容は送信されません。</p>
			</div>
			<div class="p1">
				<p>・</p><p>一枚ページに仕上げたかったのですが、「CONTACT」部分のエラーチェックや動作確認を行って頂く場合がある際は
				テスト時に手間がかかる可能性があると判断し、下記部分のみ別ページを設置しました。
				</p>
			</div>
			<form method="POST" action="" novalidate><!-- ノーバリ消す後で -->
				<div id="contact_form">
					<div class="name-area">
						<label for="name" id="name-title">Name</label><br>
						<input id="name" name="name" type="text" required>
					</div>
					<div class="email-area">
						<label for="email" id="email-title">Email</label><br>
						<input id="email" name="email" type="email"  required>
					</div>
					<div class="text-area">
						<label for="comment" id="comment-title">Comment</label><br>
						<textarea id="textarea" name="comment" rows="10" class="form-control" required></textarea>
					</div>
					<input name="position" type="hidden" value="0">
					<div class="btn-area" id="submit_btn" >
						<button type="submit" class="submit_btn">送 信</button>
					</div>
				</div>
			</form>
		</div>
	</main>
</body>