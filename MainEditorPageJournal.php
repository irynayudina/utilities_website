
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor Page</title>
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
    <script>
    function getOwner() {
        return document.getElementById("doi").value;
    }
    </script>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
</head>
<body>
    <div class="view">
        <div class="header">
            <div class="logo">
                <div class="name"><b>UTILITIES</b></div>
                <div class="description">Облік заборгованості за комунальні послуги</div>
            </div>
            <div class="authorize">
                <div class="signup">Привіт, <?php echo htmlspecialchars($_SESSION["role"]); ?> <b><?php echo htmlspecialchars($_SESSION["forename"]); ?></b></div> 
                <div class="login"><a href="logout.php">Вийти</a></div>
            </div>
        </div>
        <div class="main">                
            <ul class="nav nav-tabs" style="background:#ffffff;" role="tablist">
                <li><a href="MainEditorPage.php">Додавання користувачів</a></li>
                <li><a href="MainEditorPageWorkers.php">Працівники</a></li>
                <li><a href="MainEditorPageOwners.php">Власники</a></li>
                <li><a href="MainEditorPageAppartments.php">Помешкання</a></li>   
                <li><a href="MainEditorPageDebts.php">Заборгованості</a></li>
                <li><a href="MainEditorPageJournal.php">Журнал</a></li>
                <li><a href="MainEditorPageDebtsTime.php">Графік заборгованості за деякий час</a></li>
                <li><a href="MainEditorPageDebtsDetailed.php">Детальний звіт із заборгованістю</a></li>     
            </ul>
            <div>
           <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <input class="form-control border-end-0 border rounded-pill" type="text" value="search" id="example-search-input">
                    <div class="input-group-append">
                        
                    </div>
                </div> 
                <button class="btn " type="button">
                    <i class="fa fa-search"></i>
                </button>
           </form>             
           </div>  
        </div>
        <h1>WORKING ON IT</h1>
        
        
    </div>
    
</body>
</html>