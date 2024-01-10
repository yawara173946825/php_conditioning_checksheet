<?php

function validation($request) //$_POST連想配列
{
    $errors = [];

    if (empty($request['supine_heart_rate']) || 3 < mb_strlen($request['supine_heart_rate'])) {
        $errors[] = '心拍数（臥位）の入力は必須です';
    }


    return $errors;
}
