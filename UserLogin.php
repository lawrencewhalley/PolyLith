<?php require_once("..\NavBar\NavBar.php");
require_once("checkUserLogin.php");
include_once("..\accountCreation/loginFunctions.php");

$nameErr = $pwdErr = "";
$allFields = "yes";
$invalidMesg = "";

if (isset($_POST['submit'])){
	if ($_POST['userName']==""){
		$nameErr = "Username is mandatory";
		$allFields = "no";
		}
	if ($_POST['password']==""){
		$pwdErr = "password is mandatory";
		$allFields = "no";
		}
	if($allFields == "yes") {
    	$verifyUsers = verifyUsers();
		if ($verifyUsers != null) {
			$arrayResult = Retrieveuid();
			//INSERT ADMIN PAGES AND NORMAL PAGES HERE


			if($arrayResult[0][6]=="admin"){
            header("Location: ..\Loggedin\adminView.php"); 
            exit();
			} else{
			header("Location: ..\customerPages\customerHomePage.php");
			}
		}	
		if ($verifyUsers == null) {
			$invalidMesg = "Invalid username and password!";
		}
	}
}
?>

<div class="container bgColor">
    <main role="main" class="pb-3">
		<link rel="stylesheet" href="..\stylesheet\login.css"/>
		<div class="box">
			<form method="post"> 
				<h2>User Login</h2>
				<div class="form-group">
					<label class="control-label">Username</label>
					<input class="form-control" type = "text" name="userName"/>
					<span class="text-danger"><?php echo $nameErr; ?></span>
				</div>

				<div class="form-group">
					<label class="control-label">Password</label>
					<input class="form-control" type = "password" name="password"/>
					<span class="text-danger"><?php echo $pwdErr;?></span>
					<span class="text-danger"><?php echo $invalidMesg; ?></span>
				</div>
					<input class="btn btn-primary" type="submit"
					value="Login" name ="submit">
				<div class="createAccount">
					<a class="createAccount" href="..\accountCreation\accountCreation.php">Create Account</a>
				</div>
				</script>
			</form>
		</div>
	</main>
</div>

<?php require("..\Footer/footer.php");?>