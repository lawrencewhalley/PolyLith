<?php 
include("../NavBar/LoggedNavBar.php");
include("../Loggedin/createProductSQL.php");

$errorpName = $errorpDesc = $errorprice = $erroroPrice = $errorsContactNumber = $errorsEmail = $erroroLink = "";
$allFields = "yes";
if (isset($_POST['submiting'])){
if ($_POST['pName']==""){
$errorpName = "Product name is mandatory";
$allFields = "no";
 }
if ($_POST['pDesc']==""){
$errorpDesc = "Product Number is mandatory";
$allFields = "no";
 }
if ($_POST['price']==""){
$errorprice = "Price is mandatory";
$allFields = "no";
 }
 if ($_POST['oPrice']==""){
$erroroPrice = "Original Price is mandatory";
$allFields = "no";
 }
if ($_POST['sEmail']==""){
$errorsEmail = "Supplier email mandatory";
$allFields = "no";
 }
if ($_POST['oLink']==""){
$erroroLink = "Original Link mandatory";
$allFields = "no";
 }
if ($_POST['sContactNumber']==""){
    $errorsEmail = "Supplier Contact Number is mandatory";
    $allFields = "no";
     }
if($allFields == "yes")
 {

    $createProducts = createProducts();
    header('Location: ProductCreationSummary.php?createProducts='.
    $createProducts);
    }
}

?>

<div class="container pb-5">
        <main role="main" class="pb-3">
            <div class="row">
                <div class="col-6">
                    <form method="post">
                        <div class="form-group col-md-6">
                            <label class="control-label labelFont">Product Name
                            </label>
                            <input class="form-control" type="text" name = "pName">
                            <span class="text-danger"><?php echo 
                            $errorpName; ?></span>
                        </div>
                            <div class="form-group col-md-6">
                            <label class="control-label labelFont">Product Description
                            </label>
                            <input class="form-control" type="text" name = "pDesc">
                            <span class="text-danger"><?php echo 
                            $errorpDesc; ?></span>
                        </div>
                            <div class="form-group col-md-6">
                            <label class="control-label labelFont">Price: £
                            </label>
                            <input class="form-control" type="text" name = "price">
                            <span class="text-danger"><?php echo 
                            $errorprice; ?></span>
                            </div>
                        </div>
                            <div class="form-group col-md-6">
                            <label class="control-label labelFont">Original Price: £
                            </label>
                            <input class="form-control" type="text" name = "oPrice">
                            <span class="text-danger"><?php echo 
                            $erroroPrice; ?></span>
                        </div>
                            <div class="form-group col-md-6">
                            <label class="control-label labelFont">Original Link
                            </label>
                            <input class="form-control" type="text" name = "oLink">
                            <span class="text-danger"><?php echo 
                            $erroroLink; ?></span>
                        </div>
                            <div class="form-group col-md-6">
                            <label class="control-label labelFont">Supplier Email
                            </label>
                            <input class="form-control" type="text" name = "sEmail">
                            <span class="text-danger"><?php echo 
                            $errorsEmail; ?></span>
                        </div>
                            <div class="form-group col-md-6">
                            <label class="control-label labelFont">Supplier Contact Number
                            </label>
                            <input class="form-control" type="text" name = "sContactNumber">
                            <span class="text-danger"><?php echo 
                            $errorsContactNumber; ?></span>
                        </div>
                            <div class="form-group col-md-6">
                            <label class="control-label labelFont">Category
                            </label>
                            <select name="Category" class="form-control">
                                <option value="N/A">N/A</option>
                                <option value="Short Life">Short Life</option>
                                <option value="Long Life">Long Life</option>
                                <option value="Alcohol">Alcohol</option>
                                <option value="Freezer">Freezer</option>
                                <option value="Ambient">Ambient</option>
                                <option value="Produce">Produce</option>
                            </select> 
                        </div>
                    <div class="form-group col-md-6">
                        <input class="btn" type="submit"
                        value="Create Product" name ="submiting">
                    </div>
            </div>
        </div>
    </main>
</div>
<?php require("../Footer/footer.php");?>