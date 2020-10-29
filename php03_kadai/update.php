<?php

require_once('funcs.php');


//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "emtitle ); //こういtitleるよ

$title=$_POST["title"];
$url=$_POST["url"];
$comment=$_POST["comment"];
$id    = $_POST["id"]; //追加されています

//2. DB接続します
// try {
//   //ID MAMP ='root'
//   //Password:MAMP='root',XAMPP=''
//   $pdo = new PDO('mysql:dbname=gs_kadai;charset=utf8;host=localhost', 'root', 'root');
// } catch (PDOException $e) {
//   exit('DBConnectError:'.$e->getMessage());
// }
$pdo=db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE gs_kadai_table 
SET
  title=:title, 
  url=:url, 
  comment=:comment, 
  date=sysdate()
WHERE
  id=:id;"); 



$stmt->bindValue(':title',$title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url',$url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment',$comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',$id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();



//４．データ登録処理後
if($status==false){
    sql_error($stmt);
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
//   $error = $stmt->errorInfo();
//   exit("ErrorMessage:".$error[2]);
}else{
  //５．index.phpへリダイレクト
//   header('Location: index.php');
  redirect('index.php');
}
?>
