<?php

const DB_HOST = 'mysql:dbname=conditioning_checksheet;host=127.0.0.1;charset=utf8';
const DB_USER = 'conditioning_user';
const DB_PASSWORD = 'password123';



try {
    $pdo = new PDO(DB_HOST, DB_USER, DB_PASSWORD, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //連想配列（設定方法と設定値を指定する）
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //例外
        PDO::ATTR_EMULATE_PREPARES => false, //SQLインジェクション対策

    ]);
    echo '接続成功';
} catch (PDOException $e) {
    echo '接続失敗' . $e->getMessage() . "\n";
    exit();
}
