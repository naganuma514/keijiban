<?php
require 'database.php';
require 'keijiban.php';

// タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');

$user=new Usertext();
if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    // 表示名の入力チェック
    $err=$user->Validation();
    $keijiban=$user->getUserInfo();

    if (empty($err)) {
        // データベースに接続
        $pdo = connect();

        insertText($pdo,$keijiban->view_name,$keijiban->message);
    }
}
    
        // ここにデータを取得する処理が入る
        $pdo = connect();
        $sql = "SELECT * FROM message";
        $stmt = $pdo->query($sql);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>ひと言掲示板</h1>
<!-- ここにメッセージの入力フォームを設置 -->
<?php if( !empty($success_message) ): ?>
    <p class="success_message"><?php echo $success_message; ?></p>
<?php endif; ?>

<?php if( !empty($err) ): ?>
	<ul class="error_message">
		<?php foreach( $err as $value ): ?>
			<li>・<?php echo $value; ?></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>
<form method="post">
	<div>
		<label for="view_name">表示名</label>
		<input id="view_name" type="text" name="view_name" value="">
	</div>
	<div>
		<label for="message">ひと言メッセージ</label>
		<textarea id="message" name="message"></textarea>
	</div>
	<input type="submit" name="btn_submit" value="書き込む">
</form>
<hr>
<section>
<?php if( !empty($stmt) ): ?>
<?php foreach( $stmt as $value ): ?>
	<article>
    <div class="info">
        <h2><?php echo $value['view_name']; ?></h2>
        <time><?php echo date('Y年m月d日 H:i', strtotime($value['post_date'])); ?></time>
    </div>
    <p><?php echo $value['message']; ?></p>
</article>
<?php endforeach; ?>
<?php endif; ?>
</section>
</body>
</html>