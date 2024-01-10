<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <?php


    require '../mainte/delete.php';
    deleteContact($_GET);

    // require '../mainte/db_connection.php';
    // if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    //     $id = $_GET['id'];
    //     $sql = 'DELETE FROM conditions WHERE id = :id';
    //     $stmt = $pdo->prepare($sql);
    //     $stmt->execute(array($id));
    // }
    ?>


    <a href="view.php">戻る</a></p>

</body>

</html>