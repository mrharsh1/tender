<?php
include('includes/dbh.inc.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>



<div class="modal" id="addadminprofile" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" onclick="document.getElementById('addadminprofile').style.display='none'">&times;</span>
        </button>
      </div>
      <form action="" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('addadminprofile').style.display='none'">Close</button>
            <input type="submit" name="registerbtn" class="btn btn-primary" value="Save">
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
        <button type="button" class="btn btn-primary" data-toggle="modal"  onclick="openAddAdminProfileModal()" data-target="#addadminprofile">
              Add Admin Profile 
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Email </th>
            <th>Password</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
     
          <tr>
            <td> 1 </td>
            <td> Funda of WEb IT</td>
            <td> funda@example.com</td>
            <td> *** </td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="edit_id" value="">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="" method="post">
                  <input type="hidden" name="delete_id" value="">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
        
        </tbody>
      </table>

    </div>
  </div>
</div>
<script type="text/javascript">
 
var modal = document.getElementById('addadminprofile');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

    
  function openAddAdminProfileModal() {
  var x = document.getElementById("addadminprofile");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
};





</script>
</div>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Username = $_POST['username'];
    $Password = $_POST['password'];
    
    // Move the uploaded file to a secure location
      $sql = "INSERT INTO `admin` (`user`, `pass`) VALUES ('$Username', '$Password')";
      $data = mysqli_query($conn, $sql);
      
      echo $data;

        if ($data) {
            echo "<script>alert('Admin Profile susccessful Created')</script>";
        } else {
            echo "Failed to insert data into the database";
        }
    } 

?>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
