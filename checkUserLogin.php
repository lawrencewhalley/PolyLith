<?php

function verifyUsers () {

    if (!isset($_POST['userName']) or !isset($_POST['password'])) {
        return; 
    }

    $db = new SQLite3('C:\xampp\Data\database.db');
    $stmt = $db->prepare('SELECT userName, Upassword FROM Account WHERE userName=:userName AND uPassword=:password');
    $stmt->bindParam(':userName', $_POST['userName'], SQLITE3_TEXT);
    $stmt->bindParam(':password', $_POST['password'], SQLITE3_TEXT);
    $result = $stmt->execute();
    $rows_array = [];
    while ($row=$result->fetchArray())
    {
        $rows_array[]=$row;
    }
    return $rows_array;
}
