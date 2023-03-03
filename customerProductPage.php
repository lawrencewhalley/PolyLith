<?php 
require("../NavBar/customerNavBar.php");
?>
<link rel="stylesheet" href="..\stylesheet\productPage.css" />
<?php
$puid = $_GET['puid'];
$db = new SQLITE3('C:\xampp\Data\database.db');
$sql = "SELECT * FROM Products WHERE puid=$puid";
$stmt = $db->prepare($sql);
$result = $stmt->execute();
$data = [];
while ($row = $result->fetchArray()){
    $data [] = $row; 
 }
 for ($i=0; $i<count($data); $i++):
            ?>




<div class="mainwrapper">
<a href="customerviewProduct.php">Return to Products</a>
<br>
    <div class="imagegallery">
    <?php
                                $puid = $data[$i]['puid'];
                                $imageAdded = $data[$i]['ImageAdded'];
                                if($imageAdded == "no"){
                                echo "<img src='..\uploadedImages\default.png'>";
                                } else{
                                    echo "<img src='..\uploadedImages\product".$puid.".png'>";
                                }
                                ?>
    </div>
    <div class="productinfo">
        <div class="productName">
            <?php echo $data[$i]['ProductName']?>
        </div>
        <div class="price">
            <?php echo "£".$data[$i]['price']?>
        </div>
        <div class="productDescription">
            <?php echo $data[$i]['ProductDescription']?>
        </div>
    </div>




</div>









<?php endfor;?>
<?php require("../Footer/footer.php");?>