<?php
// セキュリティ対策
header('X-FRAME-OPTIONS:DENY');
// セッションスタート
session_start();

// トークン発行
if (!isset($_SESSION['csrfToken'])) {
    $csrfToken = bin2hex(random_bytes(32));
    $_SESSION['csrfToken'] = $csrfToken;
}
$token = $_SESSION['csrfToken'];

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- スピンボタンの常時表示用スタイル設定 -->
    <style>
        /* 数値の入力欄にスピナーを常時表示する */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            opacity: 1;
        }
    </style>
</head>

<body>

    <h3>コンディショニングチェックシート</h3>



    <div class="container">
        <div class="row">
            <div class="col-md-6">


                <form action="confirm.php" method="POST">
                    <!-- 起床時心拍数 -->
                    <div class="mb-3 row">

                        <label for="supine_heart_rate" class="col-sm-4 col-form-label">起床時心拍数（臥位）</label>

                        <div class="col-sm-2">
                            <input type="number" name="supine_heart_rate" class="form-control text-center" value="<?php if (!empty($_POST['supine_heart_rate'])) {
                                                                                                                        echo $_POST['supine_heart_rate'];
                                                                                                                    } ?> " required>
                        </div>
                        <div class="col-auto">
                            <span class="form-text">
                                拍/分
                            </span>
                        </div>
                    </div>

                    <!-- 体重 -->
                    <div class="mb-3 row">

                        <label for="weight" class="col-sm-4 col-form-label">起床時体重</label>

                        <div class="col-sm-2">
                            <input type="number" name="weight" class="form-control text-center" value="<?php if (!empty($_POST['weight'])) {
                                                                                                            echo $_POST['weight'];
                                                                                                        } ?>" required>
                        </div>
                        <div class="col-auto">
                            <span class="form-text">
                                kg
                            </span>
                        </div>
                    </div>

                    <!-- 自覚疲労度（5段階） -->
                    <div class="mb-3 row">

                        <label for="fatigue" class="col-sm-4 col-form-label">自覚疲労度（5段階）</label>

                        <div class="col-sm-2">
                            <select name="fatigue" id="fatigue" class="form-select text-center" required>
                                <option value="" selected>選択</option>
                                <option value="1" <?php if (isset($_POST['fatigue']) && $_POST['fatigue'] === "1") echo 'selected'; ?>>1</option>
                                <option value="2" <?php if (isset($_POST['fatigue']) && $_POST['fatigue'] === "2") echo 'selected'; ?>>2</option>
                                <option value="3" <?php if (isset($_POST['fatigue']) && $_POST['fatigue'] === "3") echo 'selected'; ?>>3</option>
                                <option value="4" <?php if (isset($_POST['fatigue']) && $_POST['fatigue'] === "4") echo 'selected'; ?>>4</option>
                                <option value="5" <?php if (isset($_POST['fatigue']) && $_POST['fatigue'] === "5") echo 'selected'; ?>>5</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <span class="form-text">
                                /5段階中
                            </span>
                        </div>
                    </div>

                    <!-- 起床時心拍数（立位） -->
                    <div class="mb-3 row">

                        <label for="standing_heart_rate" class="col-sm-4 col-form-label">起床時心拍数（立位）</label>

                        <div class="col-sm-2">
                            <input type="number" name="standing_heart_rate" class="form-control text-center" value="<?php if (!empty($_POST['standing_heart_rate'])) {
                                                                                                                        echo $_POST['standing_heart_rate'];
                                                                                                                    } ?>">
                        </div>
                        <div class="col-auto">
                            <span class="form-text">
                                拍/分
                            </span>
                        </div>
                    </div>
                    <!-- トークンを送る、後で認証する -->
                    <input type="hidden" name="csrf" value="<?php echo $token; ?>">


                    <!-- 送信ボタン -->

                    <input type="submit" value="確認する">

                </form>
            </div>
        </div>
    </div>
</body>