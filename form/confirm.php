<?php
// セキュリティ対策
header('X-FRAME-OPTIONS:DENY');
session_start();


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

</head>

<?php
// if (!empty($_POST)) {
//     $_SESSION['supine_heart_rate'] = $_POST['supine_heart_rate'];
//     $_SESSION['weight'] = $_POST['weight'];
//     $_SESSION['fatigue'] = $_POST['fatigue'];
//     $_SESSION['standing_heart_rate'] = $_POST['standing_heart_rate'];
//     var_dump($_SESSION);
// }


?>



<body>

    <h3>コンディショニングチェックシート（確認画面）</h3>


    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <?php if ($_POST['csrf'] === $_SESSION['csrfToken']) : ?>
                    <form action="input_do.php" method="POST">
                        <!-- 起床時心拍数 -->
                        <div class="mb-3 row">

                            <label for="supine_heart_rate" class="col-sm-4 col-form-label">起床時心拍数（臥位）</label>

                            <div class="col-sm-2">
                                <input type="text" name="supine_heart_rate" class="form-control-plaintext text-center" value="<?php if (!empty($_POST['supine_heart_rate'])) {
                                                                                                                                    echo $_POST['supine_heart_rate'];
                                                                                                                                } ?>" required>
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
                                <input type="text" name="weight" class="form-control-plaintext text-center" value="<?php if (!empty($_POST['weight'])) {
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
                                <input type="text" name="fatigue" class="form-control-plaintext text-center" value="<?php if (!empty($_POST['fatigue'])) {
                                                                                                                        echo ($_POST['fatigue']);
                                                                                                                    } ?>">
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
                                <input type="text" name="standing_heart_rate" class="form-control-plaintext text-center" value="<?php if (!empty($_POST['standing_heart_rate'])) {
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
                        <input type="hidden" name="csrf" value="<?php echo '$token'; ?>">


                        <!-- 送信ボタン -->

                        <input type="submit" value="登録する">
                        <button type="button" onclick="history.back()">戻る</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>