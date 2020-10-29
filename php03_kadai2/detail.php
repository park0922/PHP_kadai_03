<?php
//１．PHP
//select.phpのPHPコードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。
//URLで送った場合はgetで取得できる
$id =$_GET['id'];
// var_dump($id);


// <!--
// ２．HTML
// 以下にindex.phpのHTMLをまるっと貼り付ける！
// 理由：入力項目は「登録/更新」はほぼ同じになるからです。
// ※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
// ※form要素 action="update.php"に変更
// ※input要素 value="ここに変数埋め込み"
// -->

//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
require_once("funcs.php");
$pdo = db_conn();


//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=" . $id);

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
    <div class="navbar-header"><a class="navbar-brand" href="index.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

 <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
            <a href="detail.php"></a>
            <?= $view ?>
        </div>
    </div>
<!-- Main[End] -->


<!-- Main[Start] -->
<form method="POST" action="update.php">
  <div class="jumbotron">
   <fieldset>
   <legend>管理画面</legend>
     <label>Username：<input type="text" name="name" value=<?=$result["name"]?>></label><br>
     <label>UserID ：<input type="text" name="lid" value=<?=$result["lid"]?>></label><br>
     <label>UserPW ：<input type="text" name="lpw" value=<?=$result["lpw"]?>></label><br>
     <label>Kanri_flg ：<input type="text" name="kanri_flg" value=<?=$result["kanri_flg"]?>></label><br>
     <label>life_flg ：<input type="text" name="life_flg" value=<?=$result["life_flg"]?>></label><br>
     <input type="hidden" name='id' value=<?=$result["id"]?>>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>


