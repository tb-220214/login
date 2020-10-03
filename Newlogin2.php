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
    
    
	//本登録テーブル作成
    $sql = "CREATE TABLE IF NOT EXISTS user"
	." ("
	. "id INT AUTO_INCREMENT PRIMARY KEY,"
	. "name char(32),"
	. "pass TEXT,"
	. "mail char(128)"
	.");";
	$stmt = $pdo->query($sql);
	
    
    echo "メール認証が完了しました！<br>";
    echo "続いて本登録を行います。";
    
    
    $name=$_POST["name"];
    $pass=$_POST["pass"];
    $mail1=$_POST["mail"];
    $url="https://tb-220214.tech-base.net/Login.php";
    
    if($name!=NULL && $pass!=NULL && $mail1!=NULL){
        
        $sql = 'SELECT * FROM pre_user';
	    $stmt = $pdo->query($sql);
	    $results = $stmt->fetchAll();
	    foreach ($results as $row){
	        if($pass==$row['pass'] && $mail1==$row['mail']){
        	    
        	    //データを挿入
                $sql = $pdo -> prepare("INSERT INTO user (name, pass, mail) VALUES (:name, :pass, :mail)");
	            $sql -> bindParam(':name', $name, PDO::PARAM_STR);
	            $sql -> bindParam(':pass', $pass, PDO::PARAM_STR);
                $sql -> bindParam(':mail', $mail1, PDO::PARAM_STR);
	            $sql -> execute();
	            
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
                $mail->addAddress($mail1, '受信者さん'); //受信者（送信先）を追加する
            //    $mail->addReplyTo('$newmail','返信先');
            //    $mail->addCC('$newmail'); // CCで追加
            //    $mail->addBcc('$newmail'); // BCCで追加
                $mail->Subject = MAIL_SUBJECT; // メールタイトル
                $mail->isHTML(true);    // HTMLフォーマットの場合はコチラを設定します
                $body = '本登録が完了しました！'.$url;

                $mail->Body  = $body; // メール本文
                // メール送信の実行
                if(!$mail->send()) {
    	            echo 'メッセージは送られませんでした！';
    	            echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
    	            echo '送信完了！';
                }
	        }
		}
    }
    
?>

<!--新規ユーザー登録-->
<h1>本登録フォーム</h1>
<form action="" method="post">
<input type="text" name="name" placeholder="ユーザー名"><br>
<input type="password" name="pass" placeholder="パスワード"><br>
<input type="text" name="mail" placeholder="メールアドレス">
<input type="submit" name="submit"><br>
</form>


<a href="https://tb-220214.tech-base.net/Login.php" target="_blank">こちら</a>
からログインしてください。
</body>
</html>