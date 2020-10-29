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
<form method="POST" action="insert.php">
  <div class="jumbotron">
   <fieldset>
   <legend>管理画面</legend>
     <label>Username：<input type="text" name="name"></label><br>
     <label>UserID ：<input type="text" name="lid"></label><br>
     <label>UserPW ：<input type="text" name="lpw"></label><br>
     <label>UserID ：<input type="text" name="lid"></label><br>
     <label>Kanri_flg ：<input type="text" name="kanri_flg"></label><br>
     <label>life_flg ：<input type="text" name="life_flg"></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
