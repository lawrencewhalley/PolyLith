
<?php include("../NavBar/LoggedNavBar.php");
$puid = $_GET['id'];
?>

UPLOAD YOUR IMAGE HERE !
<form action="upload.php?id=<?php echo $puid ?>" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type ="submit" name="submited">upload</button>
</form>
<a href="adminView.php">Back</a>



<?php require("../Footer/footer.php");?>


