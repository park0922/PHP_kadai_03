<?php

// 1.PHP
$id=$_GET['id'];
// var_dump($id);

require_once("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_kadai_table WHERE id=" . $id);
//実行して結果を代入
$status = $stmt->execute();



//３．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    // while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // while ($result = $stmt->fetch()) {
            $result = $stmt->fetch();
            // while ($result = $stmt->fetch()) {
            //GETデータ送信リンク作成
        // <a>で囲う。
    //     $view .= '<p>';
    //     $view .= '<a href="detail.php?id='. $result["id"].'">';
    //     $view .= $result["indate"] . "：" . $result["name"];
    //     $view .= '</a>';
    //     $view .= '</p>';
    // }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>本の評価</legend>
     <label>Book title：<input type="text" name="title" value=<?=$result["title"]?>></label><br>
     <label>Book URL ：<input type="text" name="url" value=<?=$result["url"]?>></label><br>
     <label>Comment:<br><textArea name="comment" rows="4" cols="40"><?=$result["comment"]?></textArea></label><br>
     <input type="hidden" name='id' value=<?=$result["id"]?>>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>



