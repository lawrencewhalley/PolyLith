<?php 
require("../NavBar/LoggedNavBar.php");


$id = $_GET['id'];
$db = new SQLite3('C:\xampp\Data\database.db');
$sql = "SELECT * FROM Products WHERE puid= $id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $GET_['id'], SQLITE3_TEXT);
$result= $stmt->execute();
$arrayResult = [];

while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}


if (isset($_POST['submit'])){

    $db = new SQLite3('C:\xampp\Data\database.db');
    $sql = "UPDATE Products SET ProductDescription = :pDesc, Price = :price, OriginalPrice = :oPrice, OriginalLink = :oLink, Category = :product, ImageAdded = :imageAdded, SupplierEmail = :sEmail WHERE puid=$id";
    $stmt = $db->prepare($sql);


    $stmt->bindParam(':pName', $_POST['pName'], SQLITE3_TEXT);
    $stmt->bindParam(':pDesc', $_POST['pDesc'], SQLITE3_TEXT); 
    $stmt->bindParam(':price', $_POST['price'], SQLITE3_TEXT);
    $stmt->bindParam(':oPrice', $_POST['oPrice'], SQLITE3_TEXT);
    $stmt->bindParam(':imageAdded', $_POST['imageAdded'], SQLITE3_TEXT);
    $stmt->bindParam(':oLink', $_POST['oLink'], SQLITE3_TEXT);
    $stmt->bindParam(':product', $_POST['product'], SQLITE3_TEXT);
    $stmt->bindParam(':sEmail', $_POST['sEmail'], SQLITE3_TEXT);
    
    $stmt->execute();

    header('Location: adminView.php');
}
?>

<div class="container bgColor">
    <main role="main" class="pb-5">
	</main>
</div>
<div class="container pb-5">
    <main role="main" class="pb-5">
    <h2> Update Product Page </h2><br>
        you are about to update the information for <?php echo $arrayResult[0][1]; ?>
		<p><a href ="adminView.php">Back</a></p>
        <div class="row">
            <div class="col-11">
                <form method="post">

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Product Description</label>
                        <input class="form-control" type="text" name = "pDesc" value="<?php echo $arrayResult[0][2]; ?>">
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Price</label>
                        <input class="form-control" type="text" name = "price" value="<?php echo $arrayResult[0][3]; ?>">
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Original Price</label>
                        <input class="form-control" type="text" name = "oPrice" value="<?php echo $arrayResult[0][4]; ?>">
                   </div>

				   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Image Available </label>
                        <p><input type="checkbox" name = "imageAdded" value="no" />No</p>
                        <p><input type="checkbox" name = "imageAdded" value="yes" />Yes</p>
                   </div>

				   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Original Link</label>
                        <input class="form-control" type="text" name = "oLink" value="<?php echo $arrayResult[0][6]; ?>">
                   </div>
                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Supplier Email</label>
                        <input class="form-control" type="text" name = "sEmail" value="<?php echo $arrayResult[0][8]; ?>">
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Product</label>
                        <select name="product" class="form-control">
                           <option value="N/A" <?php echo ($arrayResult[0][5]=="N/A") ? "selected" : ""; ?>>N/A</option>
                           <option value="Short Life" <?php echo ($arrayResult[0][5]=="Short Life") ? "selected" : ""; ?>>Short Life</option>
                           <option value="Long Life" <?php echo ($arrayResult[0][5]=="Long Life") ? "selected" : ""; ?>>Long Life</option>
						   <option value="Alcohol" <?php echo ($arrayResult[0][5]=="Alcohol") ? "selected" : ""; ?>>Alcohol</option>
                           <option value="Freezer" <?php echo ($arrayResult[0][5]=="Freezer") ? "selected" : ""; ?>>Freezer</option>
                           <option value="Ambient" <?php echo ($arrayResult[0][5]=="Ambient") ? "selected" : ""; ?>>Ambient</option>
                           <option value="Produce" <?php echo ($arrayResult[0][5]=="Produce") ? "selected" : ""; ?>>Produce</option>
                        </select>
                   </div>
                   <div class="form-group col-md-3">
                       <input type="submit" name="submit" value="Update" class="btn btn-primary">
                   </div>
                </form>
            </div>
        </div>
    </main>
</div>

<?php require("../Footer/footer.php");?>