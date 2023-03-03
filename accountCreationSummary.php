<?php include("..\NavBar/NavBar.php"); 

$uID = $_GET['id'];
$db = new SQLite3('C:\xampp\Data\database.db');
$sql = "SELECT * FROM Account WHERE puid =:uid";
$stmt = $db->prepare($sql);
$stmt->bindParam(':uid', $uID, SQLITE3_TEXT);
$result= $stmt->execute();
$arrayResult = [];
while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}



?>
<link rel="stylesheet" href="..\stylesheet\accountCreationSummary.css" />
<div class="container pb-5">
    <main role="main" class="pb-3">
    <h2>Account Created</h2><br>
    Hi <?php echo $arrayResult[0][1]?><br>
    Thankyou for Creating an account with us ! <br>
    Your Username is <div class="info"><?php echo $arrayResult[0][2]?></div><br>
    Your Password is <div class="info"><?php echo $arrayResult[0][4]?></div><br>
    Please note this down as you will need it to login.
    <br><br>
    <div><a href="../Login\UserLogin.php">Continue to Sign-in</a>
    </div>
</div>

<?php
include("..\Footer/footer.php");
?>