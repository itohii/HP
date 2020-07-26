<?php
session_start();

// データベースのユーザー名
$user = 'itohii_work';
// データベースのパスワード
$dbpassword = '1996626Itohii';

try{
    $dbh = new PDO("mysql:host=localhost; dbname=itohii_work; charset=utf8", "$user", "$dbpassword");

    $stmt = $dbh->prepare('SELECT * FROM passtable WHERE id = :username');

    $stmt->execute(array(':username' => $_POST['username']));

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(password_verify($_POST['pass'], $result['passhash'])){
        echo "ログイン認証に成功しました";
    }else{
        echo "ログイン認証に失敗しました";
        echo "<a href=\"Illust.php\">セッション生成ページ</a>";
        exit;
    } 

}catch(Exception $e){
    echo "データベースの接続に失敗しました：";
    echo $e->getMessage();
    die();
}

if(isset($_POST["username"])) setcookie("username", $_POST["username"], time()+120);
?>

<form action="IllustUpload.php" method="post" enctype="multipart/form-data">  
  参考画像ファイル：<br />
  <input type="file" name="upfile" size="30" /><br />
  タイトル：<br/>
  <input type="text" name="title"><br/>
  URL：<br />
  <input type="text" name="url"><br/>
  <input type="submit" value="アップロード" />
</form>

<a href="Illust.php">マイページへ</a>