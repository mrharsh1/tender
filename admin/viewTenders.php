<?php
session_start();
if (!isset($_SESSION['user'])) {        //To prevent login using Back button of browser
    header('location:index.php');  //As session as already been destroyed in logout.php thus it should not be set
}
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View Tenders</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <?php
//                    require 'includes/dbh.inc.php';
                    include('includes/dbh.inc.php'); 
                    error_reporting();
                    $query = "SELECT * FROM gen_tender";
                    $data = mysqli_query($conn, $query);
                    $total = mysqli_num_rows($data);
//                    $sql = "SELECT tenderno, Dept, Desc, File, Price, Duedate, DUration FROM genTender";
//                    $query = mysqli_query($conn, $sql);
                    
                    if ($total != 0)
{
           ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">
                                <thead>
                                    <tr>
                                  
                                        <th>Tender No.</th>
                                        <th>Department</th>
                                        <th>Description</th>
                                        <th>File</th>
                                        <th>Price</th>
                                        <th>Due Date</th>
                                        <th>Duration</th>
                                        <th>Close</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php
                             

        while($row = mysqli_fetch_assoc($data)){
            
       ?>
                                 <tr id="table_row">
                                        <td><?php echo $row['tenderno'] ?></td>
                                        <td><?php echo $row['Dept'] ?></td>
                                        <td><?php echo $row['Desc'] ?></td>
                                        <td><?php echo $row['File'] ?></td>
                                        <td><?php echo $row['Price'] ?></td>
                                        <td><?php echo $row['Duedate'] ?></td>
                                        <td><?php echo $row['DUration'] ?></td>                                                               
                                        <td><a href="javascript:HideRow();" class="btn btn-danger" id="close">X</a>
                                        <script type="application/x-javascript">
                                                function HideRow() {
                                                 $("#table_row").remove();
                                                 };
                                                    </script>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
                <div class="my-2"></div>
            </div>
        </div>
    </div>


    <?php
    include('includes/footer.php');
    include('includes/scripts.php');
    ?>

               



