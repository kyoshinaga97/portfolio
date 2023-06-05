<?php
session_start();
$error = [];
$get = 1; //GET時エラーの為追加 修正後消去
$cl = 0;  //エラー修正後消去

//errorチェック
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	//GET時エラーの為追加 修正後消去
	$get = "2";
	
	// 文字列フィルター
	$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	
	if ($_POST['name'] === '') {
		$error['name'] = 'blank';
	} else {
		$error['name'] = 'null';
		$cl ++;
	}
	if ($_POST['email'] === '') {
		$error['email'] = 'blank';
	} else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$error['email'] = 'syntax';
	}else {
		$error['email'] = 'null';
		$cl ++;
	}
	if ($_POST['comment'] === '') {
		$error['comment'] = 'blank';
	}else {
		$error['comment'] = 'null';
		$cl ++;
	}
	if ($cl === 3) {
		// エラーがないので確認画面に移動
		$_SESSION['form'] = $post;
		header('Location: php/complete.php');
		exit();
	}
}

//表示位置
$position = 0;

if (isset($_REQUEST["position"]) == true){
	$position = $_REQUEST["position"];
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">	
	<link rel="stylesheet" href="css/reset.css"> 
	<link rel="stylesheet" href="css/style.css">
	
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="js/main.js"></script>
	<title>Yoshinaga's portfolio</title>
	
	<script>
	$(document).ready(function(){
		window.onload = function (){$(window).scrollTop(<?php echo $position; ?>);}
		$("button[type=submit]").click(function(){
			var position = $(window).scrollTop();
			$("input:hidden[name=position]").val(position);
			
		});
	});
	</script>
	
</head>
	<body>
		<header id="top_visual" class="page-header" role="banner">
			<h1>
				<div class="inner"><p class="title_name">K.Yoshinaga's Portfolio</div>
			</h1>
		</header>
		<nav class="primary-nav" role="navigation">
			<div class="wrapper">
				<ul>
					<li><a href="#" class="scroll-to-top-li">トップ</a></li>
					<li><a href="#profile">プロフィール</a>
					<li><a href="#skill">スキル</a></li>
					<li><a href="#works">制作物</a></li>
					<li><a href="#contact">連絡先</a></li>
				</ul>
			</div>
		</nav>
		
		<!-- ここまでヘッダー -->
		<main>
			<div class="profile" id="profile">
				<h2>PROFILE</h2>
				<div id="salutation"><!--  -->
					<div class=icon></div>
					<p>
					はじめまして。現在26歳、エンジニア志望のヨシナガと申します。<br>
					この度は、私のポートフォリオ・プロフィールを御覧頂きありがとうございます。<br>
					これまでの私の経歴や習得、学習スキル等を簡単にまとめています。<br>
					至らない部分もあるかと思いますが、是非御社で働きたい思いで作成しました。<br>
					お手数ですが、続きも御覧頂ければ幸いです。<br><br>
					尚、気になる点や質問があれば気軽に「<a href="#contact">CONTACT</a>」からご連絡頂ければ幸いです。
					</p>
				</div>
			</div>
			<div class="skill" id="skill">
				<h2>My skill set</h2>
					<p class="skill-text">
					職業訓練校や自身で学習し身につけたスキルや利用した技術等をまとめました。<br>
					在学していた学科が「Webシステム開発科」であった事もありフロントスキルが多いです。<br>
					在学期間も１年間で、まだまだ理解が浅い部分があるのも認識しています。<br>
					今後はバックエンドに関しても理解を深め専門性を高めていきたいと考えています。
					</p>
					<div class="graph" id="graph">
						<!-- バックエンド -->
						<div class="backend">
							<h4 class="graph name">バックエンド</h4>
							<p>要編集</p>
							<table class="table">
								<thead>
									<tr>
										<th scope="col">技術</th>
										<th class="align" scope="col">経験年数</th>
										<th class="align" scope="col">スキルLv</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row">php(Laravel)</th>
										<td>1年</td>
										<td><span class="lv"><p class="lv 4">★★★★☆</p></span></td>
									</tr>
									<tr>
										<th scope="row">Java</th>
										<td>1年</td>
										<td><span class="lv"><p class="lv 3">★★★☆☆</p></span></td>
									</tr>
									<tr>
										<th scope="row">C#</th>
										<td>1年</td>
										<td><span class="lv"><p class="lv 2">★★☆☆☆</p></span></td>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- デザイン -->
						<div class="design">
							<h4 class="graph name">デザイン・コーディング</h4>
							<p>基本的な事は一通りできます。</p>
							<table class="table">
								<thead>
									<tr>
										<th scope="col">技術</th>
										<th class="align" scope="col">経験年数</th>
										<th class="align" scope="col">スキルLv</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row">HTML5       </th>
										<td>1年</td>
										<td><span class="lv"><p class="lv 4">★★★☆☆</p></span></td>
									</tr>
									<tr>
										<th scope="row">CSS3</th>
										<td>1年</td>
										<td><span class="lv"><p class="lv 3">★★★☆☆</p></span></td>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- フロントエンド -->
						<div class="frontend">
							<h4 class="graph name">フロントエンド</h4>
							<p>要編集</p>
							<table class="table">
								<thead>
									<tr>
										<th scope="col">技術</th>
										<th class="align" scope="col">経験年数</th>
										<th class="align" scope="col">スキルLv</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row">JavaScript</th>
										<td>1年</td>
										<td><span class="lv"><p class="lv 4">★★★★☆</p></span></td>
									</tr>
									<tr>
										<th scope="row">jQuery</th>
										<td>1年</td>
										<td><span class="lv"><p class="lv 3">★★★☆☆</p></span></td>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- データベース -->
						<div class="backend">
							<h4 class="graph name">DB</h4>
							<p>要編集</p>
							<table class="table">
								<thead>
									<tr>
										<th scope="col">技術</th>
										<th class="align" scope="col">経験年数</th>
										<th class="align" scope="col">スキルLv</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row">MySQL</th>
										<td>1年</td>
										<td><span class="lv"><p class="lv 4">★★★★☆</p></span></td>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- その他 -->
						<div class="others">
							<h4 class="graph name">その他</h4>
							<p>訓練や個人的に学習した内容や、開発等で使用したソフトウェア・ツール等です。</p>
							<section class="experience">
								<h6>開発・学習内容</h6>
								<ul>
									<li>・「Java」を使用した「Android Studio」によるアプリ開発</li>
									<li>・「C#」を使用した「Unity」によるゲーム開発</li>
									<li>・「Linux」を使用したサーバー構築とプロトコルの学習</li>
								</ul>
							</section>
							<section class="tools">
								<h6>ツール等</h6>
								<p>
									・XAMPP・FileZilla・FFFTP・Slack・git
								</p>
							</section>
						</div>
					</div>
				</div>
			</div>
			<div class="works" id="works">
				<h2 class="works-h2">WORK's</h2>
				<h3>ECサイト</h3>
				<div class="work1" id="work-graph">
					<div class="works-left">
						<div class="sample1"></div>
						<div class="under">
							<div class="link">
								<a href="https://websystem.rulez.jp/22/web22g2/picstock/" class="a1"target="_blank" rel="noopener">DEMO</a>
							</div>
							<p>＊公開元が技術訓練校になりますのでECサイトの問い合わせは私宛にお願い致します。</P>
						</div>
					</div>
					<div class="works-right">
						<h5>概要</h5>
						<p class="border">職業訓練校にて訓練の一環として作成したものです。</p>
						<h5>使用言語など</h5>
						<p class="border">HTML,CSS,JavaScript,jQuery,PHP,MySQL,Linux,Slack</p>
						<h5>担当した箇所</h5>
						<div class="border">
							<div class="flex">
								<p class="skill-name">PHP：</p>
								<p class="ec1">ログイン関連、会員登録・情報関連、DB接続、お気に入り機能、ショッピングカート</p>
							</div>
							<div class="flex">
								<p class="skill-name">JavaScript･jQuery：</p>
								<p class="ec1">ヘッダー関連</p>
							</div>
							<div class="flex">
								<p class="skill-name">HTML/CSS：</p>
								<p class="ec1">諸ページ</p>
							</div>
						</div>
						<h5>テキスト編集</h5>
						<p>
						開発メンバー6名で制作。私自身は主にバックエンド(PHP)を担当しました。<br>
						工夫した点はログイン処理、登録関連、ショッピングカート等です。
						前提条件として、制作課題のルールでメールアドレス(当サイトの場合ID)を平文のまま、DB登録不可だったので対応。
						また、共同開発かつ全ページにて常にログインチェックが必要だったので対応可能なクラス作成を行った。
						</p>
						
					</div>
				</div>
				<h3 class="h3portfolio">ポートフォリオ</h3>
				<div class="work2" id="work-graph">
					<div class="works-left">
						<div class="sample2">
						</div>
						<div class="under">
							<div class="link">
								<a href="https://github.com/kyoshinaga97/portfolio" class="a2" target="_blank" rel="noopener">GitHub</a>
							</div>
						</div>
					</div>
					<div class="works-right">
						<h5>概要</h5>
						<p class="border">当サイトです。</p>
						<h5>使用言語など</h5>
						<p class="border">HTML,CSS,JavaScript,jQuery,PHP</p>
						<h5>テキスト編集</h5>
						<p>
						このWebページです。HTMLとCSS、PHP、jQueryを使用し、1枚のランディングページに仕上げました。
						取り入れたいアイディアはまだまだあるのですが、実現できるスキルや時間がないので現状にとどまっています。
						</p>
					</div>
				</div>
			</div>
			<?php if ($get == "1"): include("php/contact.php"); else:  //出来れば修正?>
			<div class="contact" id="contact">
			<h2>CONTACT</h2>
			<p>
			ご覧いただき大変ありがとうございました！
			このサイトや私について少しでも気になる点や質問等御座いましたら、お気軽に下記フォームよりご連絡ください。<br>
			※補足※<br></p>
			<div class="p1">
				<p>・</p><p>DEMOサイトの為実際はお問い合わせ内容は送信されません。</p>
			</div>
			<div class="p1">
				<p>・</p><p>一枚ページに仕上げたかったのですが、「CONTACT」部分のエラーチェックや動作確認を行って頂く場合がある際は
				テスト時に手間がかかる可能性があると判断し、下記部分のみ別ページを設置しました。
				</p>
			</div>
			<form method="POST" action="" novalidate>
			<div id="contact_form">
			<div class="name-area">
			<label for="name" id="name-title">Name</label><br>
			<input id="name" name="name" type="text"  value="<?php echo htmlspecialchars($post['name']); ?>" required>
					<?php if($error['name'] === 'blank'): ?>
								<p class="error_msg">※お名前をご記入下さい。</p>
							<?php endif; ?>
						</div>
						<div class="email-area">
							<label for="email" id="email-title">Email</label><br>
							<input id="email" name="email" type="email" value="<?php echo htmlspecialchars($post['email']); ?>" required>
							<?php if ($error['email'] === 'blank'): ?>
								<p class="error_msg">※メールアドレスをご記入下さい。</p>
							<?php endif; ?>
							<?php if ($error['email'] === 'syntax'): ?>
								<p class="error_msg">※メールアドレスを正しく入力して下さい。</p>
							<?php endif; ?>
						</div>
						<div class="text-area">
							<label for="comment" id="comment-title">Comment</label><br>
							<?php if ($error['comment'] === 'blank'): ?>
								<p class="error_msg">※お問い合わせ内容をご記入下さい。</p>
							<?php endif; ?>
							<textarea id="textarea" name="comment" rows="10" class="form-control" required><?php echo htmlspecialchars($post['comment']); ?></textarea>
						</div>
						<input name="position" type="hidden" value="0"><!--  -->
						<div class="btn-area" id="submit_btn" >
							<button type="submit" class="submit_btn">送 信</button>
						</div>
					</div>
				</form>
			</div>
			<?php endif; ?>
		</main>
		<footer id="footer">
			<div class="aroow_up">
				<a href="#" class="top_btn"><i class="material-icons">⇧</i></a>
			</div>
			<div class="copyright">
				<p>© 2023 Keita Yoshinaga</p>
			</div>
		</footer>
	</body>
</html>