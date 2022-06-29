
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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
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
            <div class="form-area" id="userAdd"><div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header">
                                <h2>Реєстрація помешкання</h2>
                            </div>
                            <p>Будь ласка, заповніть цю форму та надішліть її, щоб додати запис помешкань до бази даних.</p>
                            <form action="insertAppartment.php" method="post" >
                                <div class="form-group">
                                <label for="pwd">Owner phone:</label>
                                <input type="text" class="form-control" id="appartment_owner_idi" placeholder="Enter owner id" name="appartment_owner_idi">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">City:</label>
                                    <select name="appartment_city_namei" class="form-control">                                        
                                        <?php $servername='sql108.byethost32.com';
                                        $username='b32_31818718';
                                        $password='fxmj2hyq';
                                        $dbname = "b32_31818718_firstlabdb";

                                        // Create connection
                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        // Check connection
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }

                                        $sql = "SELECT id, name FROM City ORDER BY ltrim(name)";
                                        $result = $conn->query($sql); ?>
                                        <?php if ($result->num_rows > 0): ?>
                                        <?php while($array=mysqli_fetch_row($result)): ?>
                                            <option value='<?php echo $array[0];?>'><?php echo $array[1];?></option>
                                        <?php endwhile; ?>
                                        <?php endif; ?>
                                        <?php mysqli_free_result($result); ?>                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Street:</label>
                                    <select name="appartment_street_namei" class="form-control">                                        
                                        <?php $servername='sql108.byethost32.com';
                                        $username='b32_31818718';
                                        $password='fxmj2hyq';
                                        $dbname = "b32_31818718_firstlabdb";

                                        // Create connection
                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        // Check connection
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }
                                        $sql = "SELECT id, name FROM Street ORDER BY ltrim(name)";
                                        $result = $conn->query($sql); ?>
                                        <?php if ($result->num_rows > 0): ?>
                                        <?php while($array=mysqli_fetch_row($result)): ?>
                                            <option value='<?php echo $array[0];?>'><?php echo $array[1];?></option>
                                        <?php endwhile; ?>
                                        <?php endif; ?>
                                        <?php mysqli_free_result($result); ?>                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Building:</label>
                                    <input type="text" class="form-control" id="appartment_buildi" placeholder="Enter appartment number" name="appartment_buildi">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Appartment number:</label>
                                    <input type="text" class="form-control" id="appartment_numi" placeholder="Enter appartment number" name="appartment_numi">
                                </div>
                                <input type="submit" class="btn btn-primary" name="submit" value="Відправити">
                            </form>
                        </div>
                    </div>        
                </div>         
            </div>
        </div>
        <div id="appartments">
            <h2>Помешкання</h2>
            <div class="filter">
                <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                      <label for="email">Appartment id:</label>
                      <input type="text" class="form-control" id="appartment_id" placeholder="Enter appartment id" name="appartment_id">
                    </div>
                    <div class="form-group">
                      <label for="pwd">Owner id:</label>
                      <input type="text" class="form-control" id="appartment_owner_id" placeholder="Enter owner id" name="appartment_owner_id">
                    </div>
                    <div class="form-group">
                        <label for="pwd">City:</label>
                        <input type="text" class="form-control" id="appartment_city" placeholder="Enter address id" name="appartment_city">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Street:</label>
                        <input type="text" class="form-control" id="appartment_street" placeholder="Enter address id" name="appartment_street">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Building:</label>
                        <input type="text" class="form-control" id="appartment_building" placeholder="Enter address id" name="appartment_building">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Appartment number:</label>
                        <input type="text" class="form-control" id="appartment_num" placeholder="Enter appartment number" name="appartment_num">
                    </div>
                    <button type="submit" class="btn btn-default">Find</button>
                </form>
            </div>
            <div class="updater">
                <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                      <label for="email">Appartment id:</label>
                      <input type="text" class="form-control" id="appartment_idu" placeholder="Enter appartment id" name="appartment_idu">
                    </div>
                    <div class="form-group">
                      <label for="pwd">Owner id:</label>
                      <input type="text" class="form-control" id="appartment_owner_idu" placeholder="Enter owner id" name="appartment_owner_idu">
                    </div>
                    <div class="form-group">
                        <label for="pwd">City:</label>
                        <select name="appartment_cityu" class="form-control">    
                                <option></option>                                                                  
                                        <?php $servername='sql108.byethost32.com';
                                        $username='b32_31818718';
                                        $password='fxmj2hyq';
                                        $dbname = "b32_31818718_firstlabdb";

                                        // Create connection
                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        // Check connection
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }

                                        $sql = "SELECT id, name FROM City ORDER BY ltrim(name)";
                                        $result = $conn->query($sql); ?>
                                        <?php if ($result->num_rows > 0): ?>
                                        <?php while($array=mysqli_fetch_row($result)): ?>
                                            <option value='<?php echo $array[0];?>'><?php echo $array[1];?></option>
                                        <?php endwhile; ?>
                                        <?php endif; ?>
                                        <?php mysqli_free_result($result); ?>                                        
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Street:</label>
                        <select name="appartment_streetu" class="form-control">  
                                <option></option>                                                                    
                                        <?php $servername='sql108.byethost32.com';
                                        $username='b32_31818718';
                                        $password='fxmj2hyq';
                                        $dbname = "b32_31818718_firstlabdb";

                                        // Create connection
                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        // Check connection
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }
                                        $sql = "SELECT id, name FROM Street ORDER BY ltrim(name)";
                                        $result = $conn->query($sql); ?>
                                        <?php if ($result->num_rows > 0): ?>
                                        <?php while($array=mysqli_fetch_row($result)): ?>
                                            <option value='<?php echo $array[0];?>'><?php echo $array[1];?></option>
                                        <?php endwhile; ?>
                                        <?php endif; ?>
                                        <?php mysqli_free_result($result); ?>                                        
                                    </select>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Building:</label>
                        <input type="text" class="form-control" id="appartment_buildingu" placeholder="Enter address id" name="appartment_buildingu">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Appartment number:</label>
                        <input type="text" class="form-control" id="appartment_numu" placeholder="Enter appartment number" name="appartment_numu">
                    </div>
                    <button type="submit" class="btn btn-default">Update</button>
                </form>
            </div>
            <div class="deletor">
                <form class="form-inline" action="appartmentDelete.php" method="post">
                    <div class="form-group">
                        <label for="pwd">Appartment id:</label>
                        <input type="text" class="form-control" id="appartment_idd" placeholder="Enter appartment id" name="appartment_idd">
                    </div>
                    <button type="submit" class="btn btn-default">Delete</button>
                </form>
            </div>
            <!-- Export a Table to PDF - START -->
<link rel="stylesheet" type="text/css" href="/Content/font-awesome/css/font-awesome.min.css" />
            <div class="displayer" style="background-image: url(white.PNG);">
            <button id="exportButton" class="btn btn-lg btn-danger clearfix"><span class="fa fa-file-pdf-o"></span> Export to PDF</button>
            <table id="exportTable" class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Address</th>
                  <th scope="col">Owner_id</th>
                  <th scope="col">Owner</th>
                </tr>
              </thead>
              <tbody>
              <?php include 'updateAppartments.php';?>
              <?php include 'allAppartments.php';?>
              <?php include 'appartmentSort.php';?>
                <?php if ($result->num_rows > 0): ?>
                <?php while($array=mysqli_fetch_row($result)): ?>
                <tr>
                    <th scope="row"><?php echo $array[0];?></th>
                    <td><?php echo $array[1];?></td>
                    <td><?php echo $array[2];?></td>
                    <td><?php echo $array[3];?></td>
                </tr>
                <?php endwhile; ?>
                <?php else: ?>
                <tr>
                   <td colspan="3" rowspan="1" headers="">No Data Found</td>
                </tr>
                <?php endif; ?>
                <?php mysqli_free_result($result); ?>
                  </tbody>
                </table>
            </div>
            <!-- you need to include the shieldui css and js assets in order for the components to work -->
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/jszip.min.js"></script>

<script type="text/javascript">
    jQuery(function ($) {
        $("#exportButton").click(function () {
            // parse the HTML table element having an id=exportTable
            var dataSource = shield.DataSource.create({
                data: "#exportTable",
                schema: {
                    type: "table",
                    fields: {
                        id: { type: String },
                        Address: { type: String },
                        Owner_id: { type: String },
                        Owner: { type: String }
                    }
                }
            });

            // when parsing is done, export the data to PDF
            dataSource.read().then(function (data) {
                var pdf = new shield.exp.PDFDocument({
                    author: "PrepBootstrap",
                    created: new Date()
                });

                pdf.addPage("a2", "portrait");

                pdf.table(
                    50,
                    50,
                    data,
                    [
                        { field: "id", title: "id:", width: 100 },
                        { field: "Address", title: "Address:", width: 400 },
                        { field: "Owner_id", title: "Owner id:", width: 100 },
                        { field: "Owner", title: "Owner", width: 400 }
                    ],
                    {
                        margins: {
                            top: 50,
                            left: 50
                        }
                    }
                );

                pdf.saveAs({
                    fileName: "PrepBootstrapPDF"
                });
            });
        });
    });
</script>
        </div>
        
    </div>

<style>
    #exportButton {
        border-radius: 0;
    }
</style>
</body>
</html>