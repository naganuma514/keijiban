<?php
define( 'FILENAME', './message.txt');
date_default_timezone_set('Asia/Tokyo');

if( !empty($_POST['btn_submit']) ) {
    if( $file_handle = fopen( FILENAME, "a") ) {
        $now_date = date("Y-m-d H:i:s");
        $data = "'".$_POST['view_name']."','".$_POST['message']."','".$now_date."'\n";
        fwrite( $file_handle, $data);

		// ファイルを閉じる
		fclose( $file_handle);
	}	
	
}
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
</body>
</html>