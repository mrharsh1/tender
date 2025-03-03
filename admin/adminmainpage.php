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
    <h1 class="h3 mb-4 text-gray-800 text-uppercase text-center">UTM INDIA 🇮🇳<br>Welcome <?php echo $_SESSION['user'] ?></h1>
    
    <marquee style="color: black;">For Technical Support Call +91-7982451415</marquee>
    <h2  class="text-center" style="color: red;align-content: center;">Online Tender Management <br> By Chourasia</h2>
    <?php
    include('includes/footer.php');
    include('includes/scripts.php');
    ?>