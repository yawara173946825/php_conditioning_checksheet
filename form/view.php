<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // require '../mainte/db_connection.php';
    // $sql = 'SELECT * FROM conditions ORDER BY id DESC';
    // $conditions = $pdo->query($sql);

    require '../mainte/select.php';
    $conditions = selectContact();

    while ($condition = $conditions->fetch()) : ?>

        <pre>
        <h2><a href="view_more.php?id=<?php echo $condition['id'] ?>"><?php echo $condition['created_at'] . "のコンディション"; ?></a></h2>
        </pre>

    <?php endwhile ?>

    <p><a href="input.php">新規作成</a></p>

</body>

</html>