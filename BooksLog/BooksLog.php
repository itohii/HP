<?php
$targetDir = 'BooksLogTxt';
$txtFiles = glob($targetDir.DIRECTORY_SEPARATOR."*.txt");

if (
  isset($_GET["page"]) &&
  $_GET["page"] > 0 &&
  $_GET["page"] <= count($txtFiles)
) {
  $page = (int)$_GET["page"];
} else {
  $page = count($txtFiles);
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ArgusWeb</title>
    <link rel="stylesheet" href="BooksLog.css">
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
            // ファイルを変数に格納
            $filename = 'BooksLogTxt/bookimg'.$page.'.txt';
        
            // fopenでファイルを開く（'r'は読み込みモードで開く）
            $fp = fopen($filename, 'r');
            
            // whileで行末までループ処理
            while (!feof($fp)) {                
                // fgetsでファイルを読み込み、変数に格納
                $txt = fgets($fp);
                $SplitTxt = explode(",",$txt);
                // ファイルを読み込んだ変数を出力
                echo '<p><a href='.$SplitTxt[3].'>',$SplitTxt[0],'</a></p>';
                echo '<p>',$SplitTxt[1].'「'.$SplitTxt[2],'」</p>';
            }

            // fcloseでファイルを閉じる
            fclose($fp);
        ?>
        
        <p>
    <?php if ($page > 1) : ?>
      <a href="?page=<?php echo ($page - 1); ?>">前のページへ</a>
    <?php endif; ?>
    <?php if ($page < count($txtFiles)) : ?>
    　　<a href="?page=<?php echo ($page + 1); ?>">次のページへ</a>
    <?php endif; ?>
  </p>
    </div>
</body>