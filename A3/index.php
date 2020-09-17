<?php
/*
 * ------------------------------------------------------------------------------
 * Assignment 3
 * Written by: (Raffi Alan Bezirjian) -> 29538690
 * For SOEN 287  – Summer 2019
 * -----------------------------------------------------------------------------
 */

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

if (! empty($_POST["register-user"])) {
    
    $username = filter_var($_POST["userName"], FILTER_SANITIZE_STRING);
    $displayName = filter_var($_POST["firstName"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["userEmail"], FILTER_SANITIZE_STRING);
    require_once ("Process.php");
    /* Form Required Field Validation */
    $member = new Process();
    $errorMessage = $member->validateMember($username, $displayName, $password, $email);
    
    if (empty($errorMessage)) {

       // header("Location: thankyou.php");



        $result = $member->isUserNameExists($username);
        if($result == true){
            
            header("Refresh:0");
            phpAlert(   "Username already exists!"   );
        }else{
            header("Location: display.php");
        }
        

    }
}
?>
<html>
<head>
<title>User Registration Form</title>
<link href="./css/style.css" rel="stylesheet" type="text/css" />
<!-- <link rel="stylesheet" type="text/css" media="screen" href="style.php"> -->
</head>
<body>
    <form name="frmRegistration" method="post" action="">
        <div class="demo-table">
        <div class="form-head">Sign Up</div>
            
<?php
if (! empty($errorMessage) && is_array($errorMessage)) {
    ?>	
            <div class="error-message">
            <?php 
            foreach($errorMessage as $message) {
                echo $message . "<br/>";
            }
            ?>
            </div>
<?php
}
?>

            <div class="field-column">
                <label>Full Name</label>
                <div>
                    <input type="text" class="demo-input-box"
                        name="firstName" placeholder="UserName"
                        value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>">
                </div>
                </div>

                <div class="field-column">
                <label>Email</label>
                <div>
                    <input type="text" class="demo-input-box"
                        name="userEmail" placeholder="Email Address"
                        value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>">
                </div>
            </div>



            <div class="field-column">
                <label>UserName</label>
                <div>
                    <input type="text" class="demo-input-box" name="userName" placeholder="UserName"
                    value="<?php if(isset($_POST['userName'])) echo $_POST['userName']; ?>">
                </div>
            </div>
            
            <div class="field-column">
                <label>Password</label>
                <div><input type="password" class="demo-input-box" placeholder="Password"
                    name="password" value=""></div>
            </div>
            <div class="field-column">
                <label>Repeat Password</label>
                <div>
                    <input type="password" class="demo-input-box" placeholder="Repeat Password"
                        name="confirm_password" value="">
                </div>
            </div>
          

            
           
            <div class="field-column">
                <div class="terms">
                    <input type="checkbox" name="terms"> I accept terms
                    and conditions
                </div>
                <div>
                    <input type="submit"
                        name="register-user" value="Register"
                        class="btnRegister">
                </div>
            </div>
        </div>
    </form>
</body>
</html>