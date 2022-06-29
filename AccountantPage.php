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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accountant Page</title>
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
    <script>
    function getOwner() {
        return document.getElementById("doi").value;
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
                    <li><a href="AccountantPageCoeficients.php">Редагування боргових коефіцієнтів</a></li>
                    <li><a href="AccountantPageSumDebts.php">Штрафи за послуги по квартирам</a></li>
                    <li><a href="AccountantPage.php">Облік та оплата заборгованостей</a></li>
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
        <div id="appartments">
            <h2>Облік та оплата заборгованостей</h2>
            <div class="filter">
                <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                
                                <div class="form-group">
                                <label for="pwd">Appartment id:</label>
                                <input type="text" class="form-control" id="daif" placeholder="Enter owner id" name="daif">
                                </div>
                                <div class="form-group">
                                <label for="pwd">Start date of debt:</label>
                                <input type="date" class="form-control" id="start_date" name="start_date">
                                </div>
                                <div class="form-group">
                                <label for="pwd">End date of debt:</label>
                                <input type="date" class="form-control" id="end_date" name="end_date">
                                </div>
                                <div class="form-group">
                                <label for="pwd">City:</label>
                                <select name="debt_city" class="form-control"> 
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
                                <label for="pwd">Phone number of owner:</label>
                                <input type="text" class="form-control" id="debt_owner" name="debt_owner">
                                </div>
                    <button type="submit" class="btn btn-default">Find</button>
                </form>
            </div>
            <div class="updater">
            <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                      <label for="email">Appartment id:</label>
                      <input type="text" class="form-control" id="oiu" placeholder="Enter owner id" name="oiu">
                    </div>
                    <div class="form-group">
                      <label for="pwd">Paid for gas:</label>
                      <input type="text" class="form-control" id="ofu" placeholder="Enter forename" name="ofu">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Paid for water:</label>
                        <input type="text" class="form-control" id="onu" placeholder="Enter name" name="onu">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Paid for power:</label>
                        <input type="text" class="form-control" id="omu" placeholder="Enter middlename" name="omu">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Payment for the month:</label>
                        <input type="date" class="form-control" id="opu" name="opu">
                    </div>
                    <button type="submit" class="btn btn-default">Update</button>
            </form>
            </div>
            <!-- Export a Table to PDF - START -->
<link rel="stylesheet" type="text/css" href="/Content/font-awesome/css/font-awesome.min.css" />
            <div class="displayer" style="background-image: url(white.PNG);">
            <button id="exportButton" class="btn btn-lg btn-danger clearfix"><span class="fa fa-file-pdf-o"></span> Export to PDF</button>
            <table id="exportTable" class="table table-hover" style="transform: scale(0.9); margin-left:-70px">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Appartment_id</th>
                  <th scope="col">Address</th>
                  <th scope="col">Owner_phone</th>
                  <th scope="col">Owner_info</th>
                  <th scope="col">Date_debt</th>
                  <th scope="col">Gas_debt_UAH</th>
                  <th scope="col">Water_debt_UAH</th>
                  <th scope="col">Power_debt_UAH</th>
                  <th scope="col">Gas_paid_UAH</th>
                  <th scope="col">Water_paid_UAH</th>
                  <th scope="col">Power_paid_UAH</th>
                  <th scope="col">Gas_remained_UAH</th>
                  <th scope="col">Water_remained_UAH</th>
                  <th scope="col">Power_remained_UAH</th>
                </tr>
              </thead>
              <tbody>              
              <?php include 'updateAccountantDebts.php';?>
              <?php include 'allAccountantDebts.php';?>
              <?php include 'debtsAccountantSort.php';?>
                <?php if ($result->num_rows > 0): ?>
                <?php while($array=mysqli_fetch_row($result)): ?>
                <tr>
                    <th scope="row"><?php echo $array[0];?></th>
                    <td><?php echo $array[1];?></td>
                    <td><?php echo $array[2];?></td>
                    <td><?php echo $array[3];?></td>
                    <td><?php echo $array[4];?></td>
                    <td><?php echo $array[5];?></td>                    
                    <td><?php echo $array[6];?></td>                   
                    <td><?php echo $array[7];?></td>                   
                    <td><?php echo $array[8];?></td>                                     
                    <td><?php echo $array[9];?></td>                   
                    <td><?php echo $array[10];?></td>                   
                    <td><?php echo $array[11];?></td>                   
                    <td><?php echo $array[12];?></td>                   
                    <td><?php echo $array[13];?></td>                   
                    <td><?php echo $array[14];?></td>
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
            var dataSource2 = shield.DataSource.create({
                data: "#exportTable",
                schema: {
                    type: "table",
                    fields: {
                        id: { type: String },
                        Appartment_id: { type: String },
                        Address: { type: String },
                        Owner_phone: { type: String },
                        Owner_info: { type: String },
                        Date_debt: { type: String },
                        Gas_debt_UAH: { type: String },
                        Water_debt_UAH: { type: String },
                        Power_debt_UAH: { type: String },
                        Gas_paid_UAH: { type: String },
                        Water_paid_UAH: { type: String },
                        Power_paid_UAH: { type: String },
                        Gas_remained_UAH: { type: String },
                        Water_remained_UAH: { type: String },
                        Power_remained_UAH: { type: String }
                    }
                }
            });

            // when parsing is done, export the data to PDF
            dataSource2.read().then(function (data) {
                var pdf2 = new shield.exp.PDFDocument({
                    author: "PrepBootstrap",
                    created: new Date()
                });

                pdf2.addPage("a2", "landscape");

                pdf2.table(
                    10,
                    50,
                    data,
                    [
                        { field: "id", title: "id:", width: 50 },
                        { field: "Appartment_id", title: "Appartment id:", width: 100 },
                        { field: "Address", title: "Address:", width: 200 },
                        { field: "Owner_phone", title: "Owner_phone", width: 100 },
                        { field: "Owner_info", title: "Owner_info:", width: 200 },
                        { field: "Date_debt", title: "Date_debt:", width: 100 },
                        { field: "Gas_debt_UAH", title: "Gas_debt_UAH:", width: 100 },
                        { field: "Water_debt_UAH", title: "Water_debt_UAH:", width: 100 },
                        { field: "Power_debt_UAH", title: "Power debt(UAH)", width: 100 },
                        { field: "Gas_paid_UAH", title: "Gas paid(UAH)", width: 100 },
                        { field: "Water_paid_UAH", title: "Water paid(UAH)", width: 100 },
                        { field: "Power_paid_UAH", title: "Power paid(UAH)", width: 100 },
                        { field: "Gas_remained_UAH", title: "Gas_remained_UAH", width: 100 },
                        { field: "Water_remained_UAH", title: "Water_remained_UAH", width: 100 },
                        { field: "Power_remained_UAH", title: "Power_remained_UAH", width: 100 }
                    ],
                    {
                        margins: {
                            top: 50,
                            left: 10
                        }
                    }
                );

                pdf2.saveAs({
                    fileName: "PrepBootstrapPDF"
                });
            });
        });
    });
</script>
        </div>
        </div>
    </div>
    
</body>
</html>