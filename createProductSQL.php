<?php


function createProducts(){


    
    $created = false;
    $db = new SQLite3('C:\xampp\Data\database.db'); 
    $sql = 'INSERT INTO Products(ProductName, ProductDescription, price, OriginalPrice, Category, OriginalLink, ImageAdded,SupplierEmail) VALUES (:pName, :pDesc, :price, :oPrice, :Category, :oLink, :sContactNumber, :sEmail)';
    $stmt = $db->prepare($sql); 

    $stmt->bindParam(':pName', $_POST['pName'], SQLITE3_TEXT);
    $stmt->bindParam(':pDesc', $_POST['pDesc'], SQLITE3_TEXT); 
    $stmt->bindParam(':price', $_POST['price'], SQLITE3_TEXT);
    $stmt->bindParam(':oPrice', $_POST['oPrice'], SQLITE3_TEXT);
    $stmt->bindParam(':sEmail', $_POST['sEmail'], SQLITE3_TEXT);
    $stmt->bindParam(':oLink', $_POST['oLink'], SQLITE3_TEXT);
    $stmt->bindParam(':sContactNumber', $_POST['sContactNumber'], SQLITE3_TEXT);
    $stmt->bindParam(':Category', $_POST['Category'], SQLITE3_TEXT);
    $stmt->execute();

    if($stmt){
        $created = true;
    }

    return $created;
}