<?php include("../NavBar/LoggedNavBar.php");
$result = $_GET['createProducts']; 
?>
<div class="container pb-5">
<main role="main" class="pb-3">
<h2>Product Created</h2><br>
<div>
<?php
if($result){
echo "The Inventory Management System has been updated.";
 }
else{
echo "Error";
 }
?>
<div><a href="createProduct.php">Back</a></div>
</div>
</div>
<?php
include("../Footer/footer.php");
?>