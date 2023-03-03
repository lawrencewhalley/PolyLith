<?php 
require("../NavBar/LoggedNavBar.php");

$uID = $_GET['id'];
$db = new SQLite3('C:\xampp\Data\database.db');
$sql = "SELECT * FROM Products WHERE puid =:uid";
$stmt = $db->prepare($sql);
$stmt->bindParam(':uid', $uID, SQLITE3_TEXT);
$result= $stmt->execute();
$arrayResult = [];
while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}
?>


<link rel="stylesheet" href="..\stylesheet\adminProductPage.css" />


<h2>Admin View for <?php echo $arrayResult[0][1] ?>
</h2><br>
puid: <?php echo $arrayResult[0][0]?> <br>
Name: <?php echo $arrayResult[0][1]?> <br>
Product Description:
<div class="description">
<?php echo $arrayResult[0][2]?>
</div> <br>
Price:<?php echo $arrayResult[0][3]?> <br>
Original Price:<?php echo $arrayResult[0][4]?> <br>
Category:<?php echo $arrayResult[0][5]?> <br>
Image:
<?php
    $puid = $arrayResult[0][0];
    $imageAdded = $arrayResult[0][1];
    if($imageAdded == "no"){
        echo "<img src='..\uploadedImages\default.png'>"; } 
    else{
        echo "<img src='..\uploadedImages\product".$puid.".png'>";
    }
?> <br>

<a href="addImages.php?id=<?php echo $arrayResult[0][0]; ?>">Add Images</a>
<a href="updateProduct.php?id=<?php echo $arrayResult[0][0] ?>">Update</a>
<a href="deleteProduct.php?id=<?php echo $arrayResult[0][0]; ?>">Delete</a>






<?php require("../Footer/footer.php");?>