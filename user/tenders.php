<?php
session_start();

if (!isset($_SESSION['userId'])) {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        HOMEPAGE
    </title>
    <!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /> -->
    <?php
    include 'links.php'
    ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <meta name="keywords" content="Tender Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndriodCompatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <!--Google Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $("html,body").animate({
                        scrollTop: $(this.hash).offset().top
                    },
                    1000
                );
            });
        });
    </script>
    <!-- //end-smoth-scrolling -->
</head>

<body>
    <!--top nav start here-->
    <div class="mother-grid">
        <div class="container">
            <div class="temp-padd">
                <!--top nav end here-->
                <!--title start here-->
                <div class="title-main">
                    <a href="index.html">
                        <h1>Tender Management System</h1>
                    </a>
                </div>
                <!--title end here-->
                <!--header start here-->
                <div class="header mb-4">
                    <div class="navg">
                        <span class="menu"> <img src="images/icon.png" alt="" /></span>
                        <?php
                        if (isset($_SESSION['userId'])) {
                            echo '<ul class="res">
                            <li><a href="index.php">Home</a></li>
                            <li><a class="active" href="tenders.php">Tenders</a></li>
                            <li><a href="myBiddings.php">My Biddings</a></li>
                            <li><a href="viewConfirmedBiddings.php">Confirm Biddings</a></li>
                            <li><a href="includes/logout.inc.php">Logout</a></li>
                            </ul>';
                        } else {
                            echo '<ul class="res">
                            <li><a href="index.php">Home</a></li>
                            <li><a class="active" href="tenders.php">Tenders</a></li>
                            <li><a href="signup.php">Register</a></li>
                            <li><a href="login.php">Login</a></li>
                            </ul>';
                        }
                        ?>
                        <script>
                            $("span.menu").click(function() {
                                $("ul.res").slideToggle("slow", function() {
                                    // Animation complete.
                                });
                            });
                        </script>
                    </div>
                    <form class="search" action="search.php" method="GET">
                        <!-- <div class="search"> -->
                        <input type="text" name="query" value="Tenders search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Site search';}" />
                        <input type="submit" value="" />
                        <!-- </div> -->
                    </form>

                    <div class="clearfix"></div>
                </div>
                <!--header end here-->

                <h4 class="heading-4 text-center mb-4 text-white bg-danger">TENDERS</h4>
       <form method="post" action="" style="float: left;">
        <label for="rowLimit">Rows to display:</label>
        <select id="rowLimit" name="rowLimit" onchange="this.form.submit()">
            <option value="10" <?php echo ($limit == 10) ? 'selected' : ''; ?>>10</option>
            <option value="20" <?php echo ($limit == 20) ? 'selected' : ''; ?>>20</option>
            <option value="5" <?php echo ($limit == 5) ? 'selected' : ''; ?>>5</option>
        </select>
    </form>

    <form method="GET" action="" style="float: right;">
        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate" name="startDate">
        <label for="endDate">End Date:</label>
        <input type="date" id="endDate" name="endDate">
        <button type="submit">Apply Filter</button>
        <button type="button" onclick="resetFilter()">Reset Filter</button>
    </form>

    <!-- Display your table and other HTML content -->

    <script>
        function resetFilter() {
            document.getElementById('startDate').value = '';
            document.getElementById('endDate').value = '';
        }
    </script>   <?php
   include 'includes/dbh.inc.php';

// Set default values
$limit = isset($_POST['rowLimit']) ? $_POST['rowLimit'] : 10;

// Check if the form is submitted with date filter
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Check if both start and end dates are set
    if (isset($_GET['startDate']) && isset($_GET['endDate'])) {
        $startDate = $_GET['startDate'];
        $endDate = $_GET['endDate'];

        // Modify your SQL query to include the date filter
        $query = "SELECT * FROM gen_tender WHERE Duedate BETWEEN '$startDate' AND '$endDate' LIMIT $limit";
    } else {
        // If either start or end date is not set, use the original query without date filter
        $query = "SELECT * FROM gen_tender LIMIT $limit";
    }
} else {
    // If the form is not submitted, use the original query without date filter
    $query = "SELECT * FROM gen_tender LIMIT $limit";
}

                   
//                    require 'includes/dbh.inc.php';
                    include('includes/dbh.inc.php'); 
                    error_reporting();
                
                    $data = mysqli_query($conn, $query);
                    $total = mysqli_num_rows($data);
//                    $sql = "SELECT tenderno, Dept, Desc, File, Price, Duedate, DUration FROM genTender";
//                    $query = mysqli_query($conn, $sql);
                    
                    if ($total != 0)
{
           ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">                 
                        <thead class="thead-light">                    
                            <tr>
                                <th>Tender No.</th>
                                <th>Department</th>
                                <th>Description</th>
                                <th>File</th>
                                <th>Price</th>
                                <th>Due Date</th>
                                <th>Duration</th>
                                <th>Bid</th>
                                <th>Download</th>
                                <th>Select</th>
                                <th>Allotted</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                             

        while($row = mysqli_fetch_assoc($data)){
              ?>
                                     <tr>
                                       <td><?php echo $row['tenderno'] ?></td>
                                        <td><?php echo $row['Dept'] ?></td>
                                        <td><?php echo $row['Desc'] ?></td>
                                        <td><?php echo $row['File'] ?></td>
                                        <td><?php echo $row['Price'] ?></td>
                                        <td><?php echo $row['Duedate'] ?></td>
                                        <td><?php echo $row['DUration'] ?></td>                                       
                                        <td>
                                            <?php
                                                    if (isset($_SESSION['userId'])) {
                                                        //$id = $_SESSION['userId'];
                                                        $id = $row['TenderID'];
                                                        echo '<a href="biddings.php?id=' . $id . '" class="btn btn-primary">' . 'BID</a>';
                                                    } else {
                                                        echo '<a href="login.php" class="btn btn-primary">BID</a>';
                                                    }
                                            ?>
                                        </td>                                        
                                        <script>
                                            function open_script() {
                                                window.location.assign('download.php');
                                            }
                                        </script>
                                        <td>
                                            <!-- <button class="btn btn-success" onclick="open_script()">Download</button> -->
                                            <?php $name = $row['filename']; ?>
                                            <a href="download.php?name=<?php echo $name; ?>" class="btn btn-success">Download</a>
                                        </td>
       <td>
                                            <input type="checkbox" name="checkbox" onclick="myFunction(this)">
                                        </td>

                                        <td class="allotted"></td>
                                  </tr>
                            <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <div class="mb-8"></div>
            </div>
        </div>
    </div>


   
<script>
        function myFunction(checkbox) {
        let userId = "<?php echo $_SESSION['userUid']; ?>";
            if (confirm("Confirm alloted Or Not ")) {
               userId = checkbox.closest('tr').querySelector('td').innerHTML  = userId;;
            } else {
               userId = " ";
            }
            
        // Update the content of the 'allotted' column in the current row with the user ID
        checkbox.closest('tr').querySelector('.allotted').innerHTML = userId;
            
        }
    </script>
</body>
</html>


