<?php
    //本番用ここから
    $db_hostname    = 'mysql747.db.sakura.ne.jp';
    $db_username    = 'argusweb';
    $db_password    = '1996626Itohii';
    $db_name        = 'argusweb_itohii';
    $dbh = mysqli_connect( $db_hostname, $db_username, $db_password, $db_name);

    if (!$dbh) {
        exit( 'エラー : mysqli_connect : ' . mysqli_connect_error() );
    }
    //本番用ここまで
    
    // SELECT文を変数に格納
    $sql = "SELECT * FROM passtable ";

    // SQLステートメントを実行し、結果を変数に格納
    $stmt = $dbh->query($sql);
    
    foreach ($stmt as $row) {
        if( strcmp($_POST['pass'], $row['pass']) == 0){
            echo "ログイン認証に成功しました";
        }else{
            echo "ログイン認証に失敗しました";
            exit;
        }
    }
?>

<form action="GameUpload.php" method="post" enctype="multipart/form-data">
  参考画像ファイル：<br />
  <input type="file" name="upfile" size="30" /><br />
  URL：<br />
  <input type="text" name="url"><br/>
  <input type="submit" value="アップロード" />
</form>

<a href="Game.css">マイページへ</a>