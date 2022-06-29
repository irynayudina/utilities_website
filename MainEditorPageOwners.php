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
                                <h2>Реєстрація користувача</h2>
                            </div>
                            <p>Будь ласка, заповніть цю форму та надішліть її, щоб додати запис користувачів до бази даних.</p>
                            <form action="insert.php" method="post" >
                                <div class="form-group">
                                    <label>Прізвище</label>
                                    <input type="text" name="forename" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Ім'я</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>По-батькові</label>
                                    <input type="text" name="middlename" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Телефон</label>
                                    <input type="mobile" name="mobile" class="form-control">
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
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-primary" name="submit" value="Відправити">
                            </form>
                        </div>
                    </div>        
                </div>
            </div>  
        </div>   
        <div id="workers">
            <h2>Власники</h2>
            <div class="filter">
            <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                      <label for="email">Owner id:</label>
                      <input type="text" class="form-control" id="oi" placeholder="Enter owner id" name="oi">
                    </div>
                    <div class="form-group">
                      <label for="pwd">Forename:</label>
                      <input type="text" class="form-control" id="of" placeholder="Enter forename" name="of">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Name:</label>
                        <input type="text" class="form-control" id="on" placeholder="Enter name" name="on">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Middlename:</label>
                        <input type="text" class="form-control" id="om" placeholder="Enter middlename" name="om">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="text" class="form-control" id="op" placeholder="Enter password" name="op">
                    </div>
                    <button type="submit" class="btn btn-default">Find</button>
            </form>
            </div>
            <div class="updater">
            <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                      <label for="email">Owner id:</label>
                      <input type="text" class="form-control" id="oiu" placeholder="Enter owner id" name="oiu">
                    </div>
                    <div class="form-group">
                      <label for="pwd">Forename:</label>
                      <input type="text" class="form-control" id="ofu" placeholder="Enter forename" name="ofu">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Name:</label>
                        <input type="text" class="form-control" id="onu" placeholder="Enter name" name="onu">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Middlename:</label>
                        <input type="text" class="form-control" id="omu" placeholder="Enter middlename" name="omu">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="text" class="form-control" id="opu" placeholder="Enter password" name="opu">
                    </div>
                    <button type="submit" class="btn btn-default">Update</button>
            </form>
            </div>
            <div class="deletor">
                <form class="form-inline" action="ownerDelete.php" method="post">
                    <div class="form-group">
                        <label for="pwd">Owner id:</label>
                        <input type="text" class="form-control" id="oidd" placeholder="Enter owner id" name="oidd">
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
                  <th scope="col">phone</th>
                  <th scope="col">Forename</th>
                  <th scope="col">Name</th>
                  <th scope="col">Middlename</th>
                  <th scope="col">Password</th>
                </tr>
              </thead>
              <tbody>
              <?php include 'updateOwners.php';?>
              <?php include 'allOwners.php';?>
              <?php include 'ownerSort.php';?>
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
                        phone: { type: String },
                        Forename: { type: String },
                        Name: { type: String },
                        Middlename: { type: String },
                        Password: { type: String }
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
                        { field: "phone", title: "phone:", width: 100 },
                        { field: "Forename", title: "Forename:", width: 100 },
                        { field: "Name", title: "Name:", width: 200 },
                        { field: "Middlename", title: "Middlename", width: 100 },
                        { field: "Password", title: "Password:", width: 200 }
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
        </div>
        
    </div>

<style>
    #exportButton {
        border-radius: 0;
    }
</style>
</body>
</html>