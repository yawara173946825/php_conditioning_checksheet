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
require '../mainte/update.php';

updateContact($_POST);

// $id = $_POST['id'];
// $supine_heart_rate = $_POST['supine_heart_rate'];
// $weight = $_POST['weight'];
// $fatigue = $_POST['fatigue'];
// $standing_heart_rate = $_POST['standing_heart_rate'];

// $data = array($id, $supine_heart_rate);
// var_dump($data);

// require '../mainte/db_connection.php';


// if (isset($_POST)) {
//     $id = $_POST['id'];
//     $supine_heart_rate = $_POST['supine_heart_rate'];
//     $weight = $_POST['weight'];
//     $fatigue = $_POST['fatigue'];
//     $standing_heart_rate = $_POST['standing_heart_rate'];
//     $sql = 'UPDATE conditions SET supine_heart_rate=?, weight=?, fatigue=?, standing_heart_rate=?  WHERE id=?';
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute(array($supine_heart_rate, $weight, $fatigue, $standing_heart_rate, $id));
// }
?>

<body>
    <p>編集しました。</p>
    <p><a href="view.php">戻る</a></p>
</body>

</html>