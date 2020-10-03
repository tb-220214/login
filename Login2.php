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
	
	echo "ログインしました！こんにちは！<br>";


    $who=$_POST["who"];
    $what=$_POST["what"];
    $when=$_POST["when"];
    if($who!=NULL && $what!=NULL && $when!=NULL){
        switch ($who) {
        /*
            case "1人":
            switch ($what) {
                case "温泉・リゾート":
                    switch ($when) {
                        case "3日":
                            echo "韓国";
                            break;
                        case "3~7日":
                            echo "";
                            break;
                        case "7日以上";
                            echo "";
                            break;
                    }
                break;
                        
                case "アクティビティ・自然":
                    switch ($when) {
                        case "3日":
                            echo "韓国";
                        break;
                        case "3~7日":
                            echo "オーストラリア、ケアンズ";
                        break;
                        case "7日以上";
                            echo "";
                        break;
                    }
                break;
                
                case "食事・グルメ":
                    switch ($when) {
                        case "3日":
                            echo "台湾";
                        break;
                        case "3~7日":
                            echo "";
                        break;
                        case "7日以上";
                            echo "";
                        break;
                    }
                break;
                
                case "買い物":
                    switch ($when) {
                        case "3日":
                            echo "韓国";
                        break;
                        case "3~7日":
                            echo "";
                        break;
                        case "7日以上";
                            echo "";
                        break;
                    }
                break;
            }
            break;
            */
            
            case "友達":
            switch ($what) {
                case "温泉・リゾート":
                    switch ($when) {
                        case "3日":
                            echo "大分";
                            break;
                        case "3~7日":
                            echo "セブ島";
                            break;
                        case "7日以上";
                            echo "モルディブ";
                            break;
                    }
                break;
                        
                case "アクティビティ・自然":
                    switch ($when) {
                        case "3日":
                            echo "箱根";
                        break;
                        case "3~7日":
                            echo "沖縄";
                        break;
                        case "7日以上";
                            echo "ケアンズ";
                        break;
                    }
                break;
                
                case "食事・グルメ":
                    switch ($when) {
                        case "3日":
                            echo "台湾";
                        break;
                        case "3~7日":
                            echo "北海道";
                        break;
                        case "7日以上";
                            echo "タイ";
                        break;
                    }
                break;
                
                case "買い物":
                    switch ($when) {
                        case "3日":
                            echo "韓国";
                        break;
                        case "3~7日":
                            echo "シドニー";
                        break;
                        case "7日以上";
                            echo "アメリカ";
                        break;
                    }
                break;
            }
            
            
            case "家族":
            switch ($what) {
                case "温泉・リゾート":
                    switch ($when) {
                        case "3日":
                            echo "伊豆";
                            break;
                        case "3~7日":
                            echo "沖縄";
                            break;
                        case "7日以上";
                            echo "ハワイ";
                            break;
                    }
                break;
                
                case "アクティビティ・自然":
                    switch ($when) {
                        case "3日":
                            echo "箱根";
                        break;
                        case "3~7日":
                            echo "沖縄";
                        break;
                        case "7日以上";
                            echo "グアム";
                        break;
                    }
                break;
                
                case "食事・グルメ":
                    switch ($when) {
                        case "3日":
                            echo "大阪";
                        break;
                        case "3~7日":
                            echo "北海道";
                        break;
                        case "7日以上";
                            echo "沖縄";
                        break;
                    }
                break;
                
                case "買い物":
                    switch ($when) {
                        case "3日":
                            echo "東京";
                        break;
                        case "3~7日":
                            echo "大阪";
                        break;
                        case "7日以上";
                            echo "福岡";
                        break;
                    }
                break;
            }
            break;


            case "恋人":
            switch ($what) {
                case "温泉・リゾート":
                    switch ($when) {
                        case "3日":
                            echo "箱根";
                            break;
                        case "3~7日":
                            echo "バリ";
                            break;
                        case "7日以上";
                            echo "ハワイ";
                            break;
                    }
                break;
                        
                case "アクティビティ・自然":
                    switch ($when) {
                        case "3日":
                            echo "北海道";
                        break;
                        case "3~7日":
                            echo "セブ";
                        break;
                        case "7日以上";
                            echo "ケアンズ4";
                        break;
                    }
                break;
                
                case "食事・グルメ":
                    switch ($when) {
                        case "3日":
                            echo "韓国";
                        break;
                        case "3~7日":
                            echo "北海道";
                        break;
                        case "7日以上";
                            echo "イタリア";
                        break;
                    }
                break;
                
                case "買い物":
                    switch ($when) {
                        case "3日":
                            echo "名古屋";
                        break;
                        case "3~7日":
                            echo "大阪";
                        break;
                        case "7日以上";
                            echo "アメリカ";
                        break;
                    }
                break;
            }
            break;
        }
        
        
    }else{
        echo "全部入力してください";
    }

?>
<center>
<form action="" method="post">
<h1>次の旅行先診断</h1>

<h2>誰と行く？</h2>
    <!--<input type="radio" name="who" value="1人"> 1人-->
    <input type="radio" name="who" value="友達"> 友達
    <input type="radio" name="who" value="恋人"> 恋人
    <input type="radio" name="who" value="家族"> 家族


<h2>何したい？</h2>
    <input type="radio" name="what" value="温泉・リゾート"> 温泉・リゾート
    <input type="radio" name="what" value="アクティビティ・自然"> アクティビティ・自然
    <input type="radio" name="what" value="食事・グルメ"> 食事・グルメ
    <input type="radio" name="what" value="買い物"> 買い物

<h2>何日行ける？</h2>
    <input type="radio" name="when" value="3日"> 3日
    <input type="radio" name="when" value="3~7日"> 3~7日
    <input type="radio" name="when" value="7日以上"> 7日以上<br>

    <input type="submit" value="送信">
</form>
</center>

</body>
</html>