<?php 
require("../NavBar/LoggedNavBar.php");

$db = new SQLITE3('C:\xampp\Data\database.db');
$sql = "SELECT * FROM Products";
$stmt = $db->prepare($sql);
$result = $stmt->execute();
$data = [];
while ($row = $result->fetchArray()){
    $data [] = $row; 
 }
?>

<link rel="stylesheet" href="..\stylesheet\adminView.css" />


<h2>Admin Products View</h2><br>
<table class="content-table">
    <thead>
        <td>Product Name</td>
        <td>Edit Links</td>
        <td>Image?</td>
    </thead>

    <?php
        for ($i=1; $i<count($data); $i++):
    ?>

    <tr>
        <td>
        <div class="productNameHere">
            <?php echo $data[$i]['ProductName']?>
        </div>
        </td>
        <td>
        <a href="adminProductPage.php?id=<?php echo $data[$i]['puid']; ?>">Product Details</a>
        </td>
        <td>
            <?php
                $puid = $data[$i]['puid'];
                $imageAdded = $data[$i]['ImageAdded'];
                if($imageAdded == "no"){
                    echo "<img src='..\uploadedImages\default.png'>";} 
                else{
                    echo "<img src='..\uploadedImages\product".$puid.".png'>";
                }
            ?>
        </td>
    </tr>
    
    <?php endfor;?>
                
</table>

<br><br><br>
