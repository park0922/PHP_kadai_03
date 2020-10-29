<?php
//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る
//2. $id = POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更
require_once('funcs.php');

//1. POSTデータ取得
$name=$_POST["name"];
$lid=$_POST["lid"];
$lpw=$_POST["lpw"];
$kanri_flg=$_POST["kanri_flg"];
$life_flg=$_POST["life_flg"];
$id    = $_POST["id"]; //追加されています

//2. DB接続します
//*** function化する！  *****************
$pdo=db_conn();
// try {
//     $db_name = "gs_db3";    //データベース名
//     $db_id   = "root";      //アカウント名
//     $db_pw   = "root";      //パスワード：XAMPPはパスワード無しに修正してください。
//     $db_host = "localhost"; //DBホスト
//     $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
// } catch (PDOException $e) {
//     exit('DB Connection Error:'.$e->getMessage());
// }
// echo "a";


//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE 
        gs_user_table
        SET 
            name=:name, 
            lid=:lid, 
            lpw=:lpw, 
            kanri_flg=:kanri_flg, 
            life_flg=:life_flg
        WHERE 
        id =:id;");


$stmt->bindValue(':name',h($name), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid',h($lid), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw',h($lpw), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg',h($kanri_flg), PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flg',h($life_flg), PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', h($id), PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();




//４．データ登録処理後
if($status==false){
    sql_error($stmt);
    //*** function化する！*****************
    // $error = $stmt->errorInfo();
    // exit("SQLError:".$error[2]);
}else{
    //*** function化する！*****************
    redirect('index.php');
    // header("Location: index.php");
    // exit();
}

?>
