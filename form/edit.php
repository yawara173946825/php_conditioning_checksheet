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


require '../mainte/select.php';
$condition = selectDetailContact($_GET);


// require '../mainte/db_connection.php';
// $id = $_GET['id'];
// $sql = 'SELECT * FROM conditions WHERE id=?';
// $conditions = $pdo->prepare($sql);
// //bindParam, 引数1は何個目の？にバインドするか（?の位置を指定）、引数2はどの値をバインドするか、引数3はバインド値の条件
// $conditions->bindParam(1, $id, PDO::PARAM_INT);
// $conditions->execute();
// $condition = $conditions->fetch();
?>

<body>

    <h3><?php echo $condition['created_at'] . "のコンディション"; ?></h3>
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <!-- <form>
                    <input type="text" name="yawara">
                    <input type="submit" value="登録する">
                </form> -->
                <form action="edit_do.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    <!-- 起床時心拍数 -->
                    <div class="mb-3 row">

                        <label for="supine_heart_rate" class="col-sm-4 col-form-label">起床時心拍数（臥位）</label>

                        <div class="col-sm-2">
                            <input type="text" name="supine_heart_rate" class="form-control text-center" value="<?php echo $condition['supine_heart_rate'];  ?>">
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
                            <input type="text" name="weight" class="form-control text-center" value="<?php echo $condition['weight'];  ?>">
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
                            <input type="text" name="fatigue" class="form-control text-center" value="<?php echo $condition['fatigue'];  ?>">
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
                            <input type="text" name="standing_heart_rate" class="form-control text-center" value="<?php echo $condition['standing_heart_rate'];  ?>">
                        </div>
                        <div class="col-auto">
                            <span class="form-text">
                                拍/分
                            </span>
                        </div>
                    </div>
                    <!-- 送信ボタン -->

                    <input type="submit" value="登録する">

                </form>
            </div>
        </div>
    </div>
</body>