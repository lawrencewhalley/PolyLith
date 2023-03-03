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


if (isset($_POST['delete'])){

    $db = new SQLite3('C:\xampp\Data\database.db');
    $stmt = "DELETE FROM Products WHERE puid =:uid";
    $sql = $db->prepare($stmt);
    $sql->bindParam(':uid', $uID, SQLITE3_TEXT);
    $sql->execute();

    header("Location:adminView.php?deleted=true");
}

?>

	<div class="container bgColor">
        	<main role="main" class="pb-3">
		</main>
	</div>
	<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2>Inventory Management</h2><br>



		<h2>Delete Product <?php echo $uID;?></h2><br>
        <h4 style="color: red;">Are you sure want to delete this product ?</h4><br>
        
        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Product Name</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][1] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Product Description</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][2] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Price</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][3] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color:blue; font-weight: bold;">oPrice</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][4] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-5">
                <form method="post">
                     <input type="hidden" name="id" value = "<?php echo $_GET['id'] ?>"><br>
                    <input type="submit" value="Delete" class="btn btn-danger" name="delete"><a href="Admin View.php" style="font-weight: bold; padding-left: 30px;">Back</a>
                </form>
            </div>
        </div>






    </main>
</div>

<?php require("../Footer/footer.php");?>