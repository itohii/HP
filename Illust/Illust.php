<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ArgusWeb</title>
    <link rel="stylesheet" href="Illust.css">
    <link rel="stylesheet" href="../common.css">
</head>

<body>
   <div id="sideMenu">   
        <li><a href="../index.php">Who?</a></li>
        <li><a href="../Game/Game.php">Game</a></li>
        <li><a href="../Illust/Illust.php">Illust</a></li>
        <li><a href="../Novel/Novel.php">Novel</a></li>
        <li><a href="../BooksLog/BooksLog.php">BooksLog</a></li>
    </div>
   
    <div class="content">
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
    
    //テスト用ここから
//    $db_hostname    = 'localhost';
//    $db_username    = 'root';
//    $db_password    = '';
//    $db_name        = 'itohii_work';
//
//    $dbh = mysqli_connect( $db_hostname, $db_username, $db_password, $db_name);
//
//    if (!$dbh) {
//        exit( 'エラー : mysqli_connect : ' . mysqli_connect_error() );
//    }
    //テスト用ここまで
        
    // SELECT文を変数に格納
    $sql = "SELECT * FROM Illust";

    // SQLステートメントを実行し、結果を変数に格納
    $stmt = $dbh->query($sql);
        
    // foreach文で配列の中身を一行ずつ出力
    foreach ($stmt as $row) { ?>
        <div class="content_img">
        <?php echo '<a href="' . $row['url'] . '">';?>
            <img src="<?php echo $row['img'] ?>" alt="<?php echo $row['title']?>">
            <div class="mask">
                <div class="caption"><?php echo $row['title']?></div>
            </div>
        <?php echo "</a>"?>
        </div>
    <?php    
    }
    ?>
    </div>
</body>