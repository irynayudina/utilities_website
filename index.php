<?php
// Initialize the session
session_start();
   ini_set('display_errors', 1);
error_reporting(~0);
 
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$phone = $password = "";
$phone_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["mobile"]))){
        $phone_err = "Please enter phone.";
    } else{
        $phone = trim($_POST["mobile"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    } 
    $myrole = $_POST['userRole'];
      $sql = "";
      mysqli_query("SET TRANSACTION ISOLATION LEVEL SERIALIZABLE");
    
    // Validate credentials
    if(empty($phone_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT phone, forename, password FROM Editor WHERE phone = ?";
        if($myrole  == 'Worker'){
            $sql = "SELECT phone, forename, password FROM Worker WHERE phone = ?";
        }
        if($myrole  == 'Accountant'){
            $sql = "SELECT phone, forename, password FROM Accountant WHERE phone = ?";
        }
        if($myrole  == 'Owner'){
            $sql = "SELECT phone, forename, password FROM Owner WHERE phone = ?";
        }
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_phone);
            
            // Set parameters
            $param_phone = $phone;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $phone, $forename, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        echo $hashed_password;
                        echo $password;
                        if($password == $hashed_password){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["phone"] = $phone;
                            $_SESSION["role"] = $myrole;
                            $_SESSION["forename"] = $forename;                            
                            
                            // Redirect user to welcome page
                            if($myrole  == 'Worker'){
                                header("location: WorkerPage.php");
                            }
                            if($myrole  == 'Editor'){
                                header("location: MainEditorPage.php");
                            }                            
                            if($myrole  == 'Accountant'){
                                header("location: AccountantPage.php");
                            }                           
                            if($myrole  == 'Owner'){
                                header("location: OwnerPage.php");
                            }
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTILITIES</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="view">
        <div class="header">
            <div class="logo">
                <div class="name"><b>UTILITIES</b></div>
                <div class="description">Облік заборгованості за комунальні послуги</div>
            </div>
        </div>
        <div class="main">
            <div class="form-area"><div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header">
                                <h2>Вхід</h2>
                            </div>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
                                <div class="form-group">
                                    <label>Телефон</label>
                                    <input type="tel" name="mobile" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Пароль</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Роль</label>
                                    <select name="userRole" class="form-control">
                                        <option>Editor</option>
                                        <option>Worker</option>
                                        <option>Owner</option>
                                        <option>Accountant</option>
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-primary" name="submit" value="Відправити">
                            </form>
                        </div>
                    </div>        
                </div>
            </div>
        </div>
            
        </div>
        
    </div>
    
</body>
</html>