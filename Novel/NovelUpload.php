<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sample</title>
</head>
<body>
<p><?php
    // mysql:host=ホスト名;dbname=データベース名;charset=文字エンコード
    $dsn = 'mysql:host=localhost;dbname=itohii_work;charset=utf8';
 
    // データベースのユーザー名
    $user = 'itohii_work';
 
    // データベースのパスワード
    $password = '1996626Itohii';
 
    // tryにPDOの処理を記述
    try {
 
    // PDOインスタンスを生成
    $dbh = new PDO($dsn, $user, $password);
 
    // エラー（例外）が発生した時の処理を記述
    } catch (PDOException $e) {
 
    // エラーメッセージを表示させる
    echo 'データベースにアクセスできません！' . $e->getMessage();
 
    // 強制終了
    exit;
    }
    
// INSERT文を変数に格納
$sql = "INSERT INTO novel (title, synopsis, url) VALUES (:title, :synopsis, :url)";
 
// 挿入する値は空のまま、SQL実行の準備をする
$stmt = $dbh->prepare($sql);
    
$title = $_POST['title'];
$synopsis = $_POST['synopsis'];
$url = $_POST['url'];

echo $title + "<br>";
echo $synopsis+ "<br>";
echo $url+ "<br>";
    
// 挿入する値を配列に格納する
$params = array(':title' => $title,':synopsis' => $synopsis,':url' => $url);

// 挿入する値が入った変数をexecuteにセットしてSQLを実行
$stmt->execute($params);

// 登録完了のメッセージ
echo '登録完了しました';

?></p>
<a href="Novel.php">マイページへ</a>
</body>
</html>