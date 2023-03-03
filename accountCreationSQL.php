<?php


function createAccount(){

    $Result = false;
    $db = new SQLite3('C:\xampp\Data\database.db'); 
    $sql = 'INSERT INTO Account(fullName, userName, email, Upassword) VALUES (:fullName, :userName, :email, :pwd)';
    $stmt = $db->prepare($sql); 

    $stmt->bindParam(':fullName', $_POST['fullName'], SQLITE3_TEXT);
    $stmt->bindParam(':userName', $_POST['userName'], SQLITE3_TEXT); 
    $stmt->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
    $stmt->bindParam(':pwd', $_POST['pwd'], SQLITE3_TEXT);
    
    $stmt->execute();

    if($stmt){
        $Result = true;
    }

    return $Result;
}