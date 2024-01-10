<?php

// DB接続 PDO


function insertContact($request)
{

    require 'db_connection.php';

    // 入力 DB保存 prepare, bind, execute(配列（全て文字列）) 
    $params = [
        'id' => null,
        'supine_heart_rate' => $request['supine_heart_rate'],
        'fatigue' => $request['fatigue'],
        'weight' => $request['weight'],
        'standing_heart_rate' => $request['standing_heart_rate'],
        'created_at' => null
    ];

    $count = 0;
    $columns = '';
    $values = '';

    foreach (array_keys($params) as $key) {
        if ($count++ > 0) {
            $columns .= ',';
            $values .= ',';
        }
        $columns .= $key;
        $values .= ':' . $key;
    }

    $sql = 'INSERT into conditions (' . $columns . ')values(' . $values . ')'; //名前付きプレースフォルダー

    // var_dump($sql);
    // exit;

    $stmt = $pdo->prepare($sql); //プリペアードステートメント、sql分のセット
    $stmt->execute($params); //実行
}
