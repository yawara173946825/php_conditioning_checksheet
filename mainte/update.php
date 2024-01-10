<?php

// DB接続 PDO


function updateContact($request)
{

    require 'db_connection.php';



    // 入力 DB保存 prepare, bind, execute(配列（全て文字列）) 
    $params = [
        'supine_heart_rate' => $request['supine_heart_rate'],
        'fatigue' => $request['fatigue'],
        'weight' => $request['weight'],
        'standing_heart_rate' => $request['standing_heart_rate'],
        'id' => $request['id'],
    ];



    $count = 0;
    // $columns = '';
    $values = '';

    foreach (array_keys($params) as $key) {
        if ($count++ > 0 && $count < 5) {
            // $columns .= ',';
            $values .= ', ';
        }
        if ($count < 5) {
            $values .=  $key . '=' . ':' . $key;
            // $columns .= $key;
            // $values .= '=' . ':' . $key;
        }
    }

    $sql = 'UPDATE conditions SET ' . $values . '  WHERE id = :id '; //名前付きプレースフォルダー

    // var_dump($sql);
    // exit;

    $stmt = $pdo->prepare($sql); //プリペアードステートメント、sql分のセット
    $stmt->execute($params); //実行
}
