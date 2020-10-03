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
    
    /*
    //仮登録テーブル作成
    $sql = "CREATE TABLE IF NOT EXISTS pre_user"
	." ("
	. "id INT AUTO_INCREMENT PRIMARY KEY,"
	. "name char(32),"
	. "pass TEXT,"
	. "mail char(128)"
	. "urltoken char(128)"
	.");";
	$stmt = $pdo->query($sql);
	*/
	
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


    //ログイン    
    $name=$_POST["name"];
    $pass=$_POST["pass"];
    $mail=$_POST["mail"];
    
    if($name!=NULL && $pass!=NULL && $mail!=NULL){
        $sql = 'SELECT * FROM user';
	    $stmt = $pdo->query($sql);
	    $results = $stmt->fetchAll();
	    foreach ($results as $row){
	        if($name==$row['name'] && $pass==$row['pass'] && $mail==$row['mail']){
        	    echo '
            <script type="text/javascript">
            setTimeout("redirect()", 0);
            function redirect() {
                location.href="https://tb-220214.tech-base.net/Login2.php";
            }
            </script>';
            
            }else{
                echo "入力データが間違っています。";
            }
	    }
    }
    
?>

<h1>ログインフォーム</h1>
<form action="" method="post">
<input type="text" name="name" placeholder="ユーザー名"><br>
<input type="password" name="pass" placeholder="パスワード"><br>
<input type="text" name="mail" placeholder="メールアドレス">
<input type="submit" name="submit"><br>
</form>
<br>
初めての方は
<a href="https://tb-220214.tech-base.net/Newlogin.php" target="_blank">こちら</a>

</body>
</html>