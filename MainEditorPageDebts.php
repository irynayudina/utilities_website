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
                                <h2>Додавання боргу</h2>
                            </div>
                            <p>Будь ласка, заповніть цю форму та надішліть її, щоб додати запис боргів до бази даних. 
                                При додаванні нового богру до зайнятого місяця, він буде переписаний.</p>
                            <form action="insertDebt.php" method="post" >
                                <p id="inside_form"></p>
                                <div class="form-group">
                                <label for="pwd">Appartment id:</label>
                                <input type="text" class="form-control" id="dai" placeholder="Enter owner id" name="dai" onchange="showHint(this.value)">
                                </div>
                                <div class="form-group">
                                <label for="pwd">Date of current debt:</label>
                                <input type="date" class="form-control" id="dd" name="dd">
                                </div>
                                <div class="form-group">
                                <label for="pwd">Gas debt:</label>
                                <input type="text" class="form-control" id="dgd" placeholder="Enter owner id" name="dgd">
                                </div>
                                <div class="form-group">
                                <label for="pwd">Water debt:</label>
                                <input type="text" class="form-control" id="dwd" placeholder="Enter owner id" name="dwd">
                                </div>
                                <div class="form-group">
                                <label for="pwd">Power debt:</label>
                                <input type="text" class="form-control" id="dpd" placeholder="Enter owner id" name="dpd">
                                </div>
                                <input type="submit" class="btn btn-primary" name="submit" value="Відправити">
                            </form>
                        </div>
                    </div>        
                </div>         
            </div>
        </div>
        <div id="appartments">
            <h2>Заборгованості</h2>
            <div class="filter">
                <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                
                                <div class="form-group">
                                <label for="pwd">id:</label>
                                <input type="text" class="form-control" id="d_id" placeholder="Enter owner id" name="d_id">
                                </div>
                                <div class="form-group">
                                <label for="pwd">Owner phone:</label>
                                <input type="text" class="form-control" id="doif" placeholder="Enter owner id" name="doif">
                                </div>
                                <div class="form-group">
                                <label for="pwd">Appartment id:</label>
                                <input type="text" class="form-control" id="daif" placeholder="Enter owner id" name="daif">
                                </div>
                                <div class="form-group">
                                <label for="pwd">Date of current debt:</label>
                                <input type="date" class="form-control" id="ddf" name="ddf">
                                </div>
                                <div class="form-group">
                                <label for="pwd">Gas debt:</label>
                                <input type="text" class="form-control" id="dgdf" placeholder="Enter owner id" name="dgdf">
                                </div>
                                <div class="form-group">
                                <label for="pwd">Water debt:</label>
                                <input type="text" class="form-control" id="dwdf" placeholder="Enter owner id" name="dwdf">
                                </div>
                                <div class="form-group">
                                <label for="pwd">Power debt:</label>
                                <input type="text" class="form-control" id="dpdf" placeholder="Enter owner id" name="dpdf">
                                </div>
                    <button type="submit" class="btn btn-default">Find</button>
                </form>
            </div>
            <!-- Export a Table to PDF - START -->
<link rel="stylesheet" type="text/css" href="/Content/font-awesome/css/font-awesome.min.css" />
            <div class="displayer" style="background-image: url(white.PNG);">
            <button id="exportButtonDebt" class="btn btn-lg btn-danger clearfix"><span class="fa fa-file-pdf-o"></span> Export to PDF</button>
            <table id="exportTableDebt" class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Owner_id</th>
                  <th scope="col">Appartment_id</th>
                  <th scope="col">Date_debt</th>
                  <th scope="col">Gas_debt_UAH</th>
                  <th scope="col">Water_debt_UAH</th>
                  <th scope="col">Power_debt_UAH</th>
                </tr>
              </thead>
              <tbody>
              <?php include 'allDebts.php';?>
              <?php include 'debtsSort.php';?>
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
        $("#exportButtonDebt").click(function () {
            // parse the HTML table element having an id=exportTable
            var dataSource2 = shield.DataSource.create({
                data: "#exportTableDebt",
                schema: {
                    type: "table",
                    fields: {
                        id: { type: String },
                        Owner_id: { type: String },
                        Appartment_id: { type: String },
                        Date_debt: { type: String },
                        Gas_debt_UAH: { type: String },
                        Water_debt_UAH: { type: String },
                        Power_debt_UAH: { type: String }
                    }
                }
            });

            // when parsing is done, export the data to PDF
            dataSource2.read().then(function (data) {
                var pdf2 = new shield.exp.PDFDocument({
                    author: "PrepBootstrap",
                    created: new Date()
                });

                pdf2.addPage("a2", "portrait");

                pdf2.table(
                    50,
                    50,
                    data,
                    [
                        { field: "id", title: "id:", width: 100 },
                        { field: "Owner_id", title: "Owner id:", width: 100 },
                        { field: "Appartment_id", title: "Appartment id:", width: 100 },
                        { field: "Date_debt", title: "Date", width: 100 },
                        { field: "Gas_debt_UAH", title: " Gas debt(UAH):", width: 100 },
                        { field: "Water_debt_UAH", title: "Water debt(UAH):", width: 100 },
                        { field: "Power_debt_UAH", title: "Power debt(UAH)", width: 100 }
                    ],
                    {
                        margins: {
                            top: 50,
                            left: 50
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
</body>
</html>