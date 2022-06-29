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
    <title>Owner Page</title>
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
                    <li><a href="OwnerPage.php">Мої борги</a></li>
                    <li><a href="OwnerPageFines.php">Мої штрафи</a></li>
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
            <h2>Суми штрафів по квартирам</h2>
            <div class="filter">
                <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                
                               <div class="form-group">
                                <label for="pwd">Owner id:</label>
                                <input type="text" class="form-control" id="daif" value="<?php echo htmlspecialchars($_SESSION["phone"]); ?>" name="daif" disabled>
                                </div>
                                <div class="form-group">
                                <label for="pwd">Forename:</label>
                                <input type="text" class="form-control" id="fn" value="<?php echo htmlspecialchars($_SESSION["forename"]); ?>" name="start_date" disabled>
                                </div>
                    <button type="submit" class="btn btn-default">Find</button>
                </form>
            </div>
            <!-- Export a Table to PDF - START -->
<link rel="stylesheet" type="text/css" href="/Content/font-awesome/css/font-awesome.min.css" />
            <div class="displayer" style="background-image: url(white.PNG);">
            <button id="exportButton" class="btn btn-lg btn-danger clearfix"><span class="fa fa-file-pdf-o"></span> Export to PDF</button>
            <table id="exportTable" class="table table-hover" style="transform: scale(0.9); margin-left:-70px">
              <thead>
                <tr>
                  <th scope="col">appartment_id</th>
                  <th scope="col">address</th>
                  <th scope="col">gas_fine</th>
                  <th scope="col">water_fine</th>
                  <th scope="col">power_fine</th>
                </tr>
              </thead>
              <tbody>              
              <?php include 'findOwnerFines.php';?>
                <?php if ($result->num_rows > 0): ?>
                <?php while($array=mysqli_fetch_row($result)): ?>
                <tr>
                    <th scope="row"><?php echo $array[0];?></th>
                    <td><?php echo $array[1];?></td>
                    <td><?php echo $array[2];?></td>
                    <td><?php echo $array[3];?></td>
                    <td><?php echo $array[4];?></td>
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
                        appartment_id: { type: String },
                        address: { type: String },
                        gas_fine: { type: String },
                        water_fine: { type: String },
                        power_fine: { type: String }
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
                        { field: "appartment_id", title: "appartment_id:", width: 100 },
                        { field: "address", title: "address:", width: 100 },
                        { field: "gas_fine", title: "gas_fine:", width: 100 },
                        { field: "water_fine", title: "water_fine:", width: 100 },
                        { field: "power_fine", title: "power_fine:", width: 100 }
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