<?php

function selectContact()
{
    require 'db_connection.php';
    $sql = "SELECT * FROM conditions ORDER BY id DESC";
    $conditions = $pdo->query($sql);
    return $conditions;
}

function selectDetailContact($request)
{
    require 'db_connection.php';
    $id = array($request['id']);
    $sql = 'SELECT * FROM conditions WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    //bindParam, 引数1は何個目の？にバインドするか（?の位置を指定）、引数2はどの値をバインドするか、引数3はバインド値の条件
    // var_dump(array($id));
    // exit;
    $stmt->execute($id);
    $condition = $stmt->fetch();
    return $condition;
}
