<?php 
include_once("..\NavBar\NavBar.php");
include_once("accountCreationSQL.php");
include_once("loginFunctions.php");



$errorFullName = $errorUserName = $errorEmail = $errorpwd = $errorpwdrepeat = "";
$allFields = "yes";
if (isset($_POST['submit'])){


    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdRepeat"];


    if ($_POST['fullName']==""){
        $errorFullName = "Full Name is mandatory";
        $allFields = "no";
        }
    if ($_POST['userName']==""){
        $errorUserName = "User Name is mandatory";
        $allFields = "no";
        }
    if ($_POST['email']==""){
        $errorEmail = "email is mandatory";
        $allFields = "no";
        }
    if ($_POST['pwd']==""){
        $errorpwd = "pwd is mandatory";
        $allFields = "no";
        }
    if ($_POST['pwdRepeat']==""){
        $errorpwdrepeat = "repeated password is mandatory";
        $allFields = "no";
        }
    if($allFields == "yes"){ 
        if(pwdMatch($pwd, $pwdRepeat)!== true){
            $createAccount = createAccount();
            $uid = Retrieveuid();
            header('Location: accountCreationSummary.php?id='.$uid[0][0]);
        }
        else{
            echo ("passwords dont match");
        }
    } 
}
?>
<div class="container pb-5">
    <main role="main" class="pb-3">
        <form method="post">
            <div class="form-group col-md-6">
                <label class="control-label labelFont">Full Name
                </label>
                <input class="form-control" type="text" name = "fullName">
                <span class="text-danger"><?php echo $errorFullName; ?>
                </span>
            </div>

            <div class="form-group col-md-6">
                <label class="control-label labelFont">Username
                </label>
                <input class="form-control" type="text" name = "userName">
                <span class="text-danger"><?php echo $errorUserName; ?>
                </span>
            </div>

            <div class="form-group col-md-6">
                <label class="control-label labelFont">email adress
                </label>
                <input class="form-control" type="text" name = "email">
                <span class="text-danger"><?php echo $errorEmail; ?>
                </span>
            </div>

            <div class="form-group col-md-6">
                <label class="control-label labelFont">Password
                </label>
                <input class="form-control" type="password" name = "pwd">
                <span class="text-danger"><?php echo $errorpwd; ?>
                </span>
            </div>

            <div class="form-group col-md-6">
                <label class="control-label labelFont">Repeat Password
                </label>
                <input class="form-control" type="password" name = "pwdRepeat">
                <span class="text-danger"><?php echo $errorpwdrepeat; ?>
                </span>
            </div>
                        
                            
            <div class="form-group col-md-6">
                <input class="btn btn-primary" type="submit"
                    value="Create Account" name ="submit">
            </div>
        </form>
    </main>
</div>

<?php require("..\Footer/footer.php");?>