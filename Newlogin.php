<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>mission_6-1</title>
</head>
<body>

<?php

	// DB接続設定
	$dsn = 'データベース';
	$user = 'ユーザー名';
	$password = 'パスワード';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    
    
    //仮登録テーブル作成
    $sql = "CREATE TABLE IF NOT EXISTS pre_user"
	." ("
	. "id INT AUTO_INCREMENT PRIMARY KEY,"
	. "mail char(128),"
	. "pass TEXT"
	.");";
	$stmt = $pdo->query($sql);
	
	
	/*
	//本登録テーブル作成
    $sql = "CREATE TABLE IF NOT EXISTS user"
	." ("
	. "id INT AUTO_INCREMENT PRIMARY KEY,"
	. "name char(32),"
	. "pass TEXT,"
	. "mail char(128)"
	.");";
	$stmt = $pdo->query($sql);
	*/

    
    //仮登録機能
    $newmail=$_POST["mail"];
    $pass=$_POST["pass"];

if($newmail!=NULL){
    //$urltoken = hash('sha256',uniqid(rand(),1));
    $url = "https://tb-220214.tech-base.net/Newlogin2.php";
    //."?urltoken=".$urltoken;;
    
    // メール情報
    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';
    require 'setting.php';

// PHPMailerのインスタンス生成
    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->isSMTP(); // SMTPを使うようにメーラーを設定する
    $mail->SMTPAuth = true;
    $mail->Host = MAIL_HOST; // メインのSMTPサーバー（メールホスト名）を指定
    $mail->Username = MAIL_USERNAME; // SMTPユーザー名（メールユーザー名）
    $mail->Password = MAIL_PASSWORD; // SMTPパスワード（メールパスワード）
    $mail->SMTPSecure = MAIL_ENCRPT; // TLS暗号化を有効にし、「SSL」も受け入れます
    $mail->Port = SMTP_PORT; // 接続するTCPポート

    // メール内容設定
    $mail->CharSet = "UTF-8";
    $mail->Encoding = "base64";
    $mail->setFrom(MAIL_FROM,MAIL_FROM_NAME);
    $mail->addAddress($newmail, '受信者さん'); //受信者（送信先）を追加する
//    $mail->addReplyTo('$newmail','返信先');
//    $mail->addCC('$newmail'); // CCで追加
//    $mail->addBcc('$newmail'); // BCCで追加
    $mail->Subject = MAIL_SUBJECT; // メールタイトル
    $mail->isHTML(true);    // HTMLフォーマットの場合はコチラを設定します
    $body = '仮登録が完了しました！'.$url;

    $mail->Body  = $body; // メール本文
    // メール送信の実行
    if(!$mail->send()) {
    	echo 'メッセージは送られませんでした！';
    	echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
    	echo '送信完了！';
    
        //テーブルにデータを入力
        $sql = $pdo -> prepare("INSERT INTO pre_user (mail, pass) 
        VALUES (:mail, :pass)");
    	$sql -> bindParam(':mail', $newmail, PDO::PARAM_STR);
    	$sql -> bindParam(':pass', $pass, PDO::PARAM_STR);
	    $sql -> execute();

    }
    
}
    
	
?>

<!--新規ユーザー登録-->
<h1>新規登録フォーム</h1>
<form action="" method="post">
<input type="text" name="mail" placeholder="メールアドレス">
<input type="password" name="pass" placeholder="パスワード">
<input type="submit" name="submit"><br>
</form>


</body>
</html>