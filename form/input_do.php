 <?php session_start(); ?>


 送信完了画面

 <!-- DB接続 -->
 <?php require '../mainte/insert.php';
    // var_dump($_POST);
    insertContact($_POST);
    ?>
 <!-- DB保存 -->

 送信が完了しました。
 <a href="view.php">コンディショニングチェック一覧へ</a>
 <?php unset($_SESSION['csrfToken']); ?>