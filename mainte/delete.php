<?php

function deleteContact($request)
{
    require 'db_connection.php';
    if (isset($request['id']) && is_numeric($request['id'])) {
        $id = array($request['id']);
        $sql = 'DELETE FROM conditions WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute($id);
    }
}
