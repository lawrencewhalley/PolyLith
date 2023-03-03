<?php

function pwdMatch($pwd, $pwdRepeat){
    $result;
    if($pwd!== $pwdRepeat){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function Retrieveuid(){

    $db = new SQLite3('C:\xampp\Data\database.db');
    $stmt = $db->prepare('SELECT * FROM Account WHERE userName=:userName');
    $stmt->bindParam(':userName', $_POST['userName'], SQLITE3_TEXT);
    $result = $stmt->execute();
    $rows_array = [];
    while ($row=$result->fetchArray())
    {
        $rows_array[]=$row;
    }
    return $rows_array;
}




?>