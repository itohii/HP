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
        echo "<a href=\"BooksLog.php\">セッション生成ページ</a>";
        exit;
    } 

}catch(Exception $e){
    echo "データベースの接続に失敗しました：";
    echo $e->getMessage();
    die();
}

if(isset($_POST["username"])) setcookie("username", $_POST["username"], time()+120);
?>

<form action="BookTxtUpload.php" method="post" enctype="multipart/form-data">
  ファイル：<br />
  <input type="file" name="upfile" size="30" /><br />
  <br />
  <input type="submit" value="アップロード" />
</form>

<a href="BooksLog.php">マイページへ</a>