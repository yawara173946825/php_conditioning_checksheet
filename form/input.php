<?php



header('X-FRAME-OPTIONS:DENY');
session_start();

require 'validation.php';

// セキュリティ対策
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

if (!empty($_POST)) {
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
}


$pageFlag = 0;
$errors = validation($_POST);

if (!empty($_POST['btn_confirm']) && empty($errors)) {
    $pageFlag = 1;
}

if (!empty($_POST['btn_submit'])) {
    $pageFlag = 2;
}

?>



<!DOCTYPE html>
<meta charset="utf-8">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <?php

    ?>


    <!-- バリデーション -->

    <!-- 入力画面 -->
    <?php if ($pageFlag === 0) : ?>

        <?php if (!isset($_SESSION['csrfToken'])) {
            $csrfToken = bin2hex(random_bytes(32));
            $_SESSION['csrfToken'] = $csrfToken;
        }
        $token = $_SESSION['csrfToken'];
        ?>

        <?php if (!empty($errors) && !empty($_POST['btn_confirm'])) : ?>
            <?php echo '<ul>'; ?>
            <?php
            foreach ($errors as $error) {
                echo '<li>' . $error . '</li>';
            }
            ?>
            <?php echo '</ul>'; ?>
        <?php endif; ?>

        <br>
        入力画面<br>
        <!-- 新入力画面 -->




        <!-- 新入力画面ここまで -->

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form method="POST" action="input.php">

                        <div class="mb-3">
                            <label for="supine_heart_rate" class="form-label">起床時心拍数（臥位）</label><br>
                            <input type="number" max="150" name="supine_heart_rate" class="form-control form-control-sm" value="<?php if (!empty($_POST['supine_heart_rate'])) {
                                                                                                                                    echo $_POST['supine_heart_rate'];
                                                                                                                                } ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="fatigue" class="form-label">自覚的疲労度</label><br>
                            <select name="fatigue" id="fatigue" class="form-select" required>
                                <option value="" selected>選択してください</option>
                                <option value="1" <?php if (isset($_POST['fatigue']) && $_POST['fatigue'] === "1") echo 'selected'; ?>>1</option>
                                <option value="2" <?php if (isset($_POST['fatigue']) && $_POST['fatigue'] === "2") echo 'selected'; ?>>2</option>
                                <option value="3" <?php if (isset($_POST['fatigue']) && $_POST['fatigue'] === "3") echo 'selected'; ?>>3</option>
                                <option value="4" <?php if (isset($_POST['fatigue']) && $_POST['fatigue'] === "4") echo 'selected'; ?>>4</option>
                                <option value="5" <?php if (isset($_POST['fatigue']) && $_POST['fatigue'] === "5") echo 'selected'; ?>>5</option>
                            </select>
                        </div>
                        <div mb-3>
                            <label for="weight" class="form-label">起床時体重</label><br>
                            <input type="number" name="weight" step="0.1" max="120" class="form-control form-control-sm" value="<?php if (!empty($_POST['weight'])) {
                                                                                                                                    echo $_POST['weight'];
                                                                                                                                } ?>" required>
                        </div>
                        <div mb-3>
                            <label for="standing_heart_rate" class="form-label">起床時心拍数（立位）</label><br>
                            <input type="number" max="150" name="standing_heart_rate" class="form-control form-control-sm" value="<?php if (!empty($_POST['standing_heart_rate'])) {
                                                                                                                                        echo $_POST['standing_heart_rate'];
                                                                                                                                    } ?>" required><br>
                        </div>
                        <div class="col-12">
                            <input type="submit" name="btn_confirm" value="確認する" class="btn btn-primary">
                        </div>
                        <input type="hidden" name="csrf" value="<?php echo 'やわです'; ?>">
                    </form>
                </div>
            </div>
        </div>

    <?php endif; ?>


    <!-- 確認画面 -->
    <?php if ($pageFlag === 1) : ?>
        <?php if ($_POST['csrf'] === $_SESSION['csrfToken']) : ?>
            <form method="POST" action="input.php">
                起床時心拍数（臥位）
                <?php echo $_POST['supine_heart_rate']; ?><br>
                自覚的疲労度
                <?php echo $_POST['fatigue']; ?> <br>
                起床時体重
                <?php echo $_POST['weight']; ?> <br>
                起床時心拍数（立位）
                <?php echo $_POST['standing_heart_rate']; ?> <br>
                <br>
                <input type="submit" name="back" value="戻る">
                <input type="submit" name="btn_submit" value="送信する">

                <input type="hidden" name="supine_heart_rate" value="<?php echo $_POST['supine_heart_rate']; ?>">
                <input type="hidden" name="fatigue" value="<?php echo ($_POST['fatigue']); ?>">
                <input type="hidden" name="weight" value="<?php echo $_POST['weight']; ?>">
                <input type="hidden" name="standing_heart_rate" value="<?php echo $_POST['standing_heart_rate']; ?>">
                <input type="hidden" name="csrf" value="<?php echo h($_POST['csrf']); ?>">
            </form>
        <?php endif; ?>
    <?php endif; ?>

    <!-- 送信画面 -->
    <?php if ($pageFlag === 2) : ?>
        <?php if ($_POST['csrf'] === $_SESSION['csrfToken']) : ?>
            送信完了画面

            <!-- DB接続 -->
            <?php require '../mainte/insert.php';

            insertContact($_POST);
            ?>
            <!-- DB保存 -->

            送信が完了しました。
            <a href="view.php">コンディショニングチェック一覧へ</a>
            <?php unset($_SESSION['csrfToken']); ?>
        <?php endif; ?>
    <?php endif; ?>

</body>


</html>