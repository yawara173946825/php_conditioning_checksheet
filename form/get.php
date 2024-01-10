<html>
<!-- 確認画面 -->


<?php require '../mainte/insert.php';
insertContact($_POST); ?>


<body>

    <form method="POST" action="complete.php">
        起床時心拍数（臥位）
        <?php echo $_POST['supine_heart_rate']; ?><br>
        自覚的疲労度
        <?php echo $_POST['fatigue']; ?> <br>
        起床時体重
        <?php echo $_POST['weight']; ?> <br>
        起床時心拍数（立位）
        <?php echo $_POST['standing_heart_rate']; ?> <br>
        <br>
        <input type="submit" value="登録する">
        <button type="button" onclick="history.back()">戻る</button>
        <input type="hidden" name="csrf" value="<?php echo $token; ?>">
    </form>
    <?php var_dump($_POST); ?>



</body>



</html>