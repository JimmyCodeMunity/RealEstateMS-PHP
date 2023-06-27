<?php
@include('config.php');
session_start();
$collect = "SELECT * FROM apartments ORDER BY id desc";
$result = mysqli_query($conn,$collect);
  $row = mysqli_fetch_array($result);

?>
<?php
if (!isset($_SESSION['username'])) {
  // code...
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/favicon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: EstateAgency - v4.9.1
  * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <!--alert-->
  <script type="text/javascript">
    function quitrequest(){
      var result = confirm("You are logging out.Are you sure you want to continue ?");
      if (!result) {
        event.preventDefault();
        }
        else{
          location.href = "logout.php";
        }
  // go to page in a tag's href when user choose 'OK'
}
  </script>
</head>

<body>

  

  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.html" onclick="quitrequest(event)"><img src="assets/img/favicon.png"> Apartment<span class="color-b">Finder</span></a>

      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link active" href="userpage.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="userdash/dashboard/index.php">Dashboard</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="serv.php">Property</a>
          </li>

         
          <li class="nav-item">
            <a class="nav-link " href="footer.php">Contact</a>
          </li>
          

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi,<?php echo $_SESSION['username']; ?></a>
            <div class="dropdown-menu">
              <a class="dropdown-item " href="logout.php">Log out</a>
              
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link " href="contact.html"><i class="fa fa-home" style="color: black;"></i> </a>
          </li>
        </ul>
      </div>

      <a href="search.php"><button type="button" class="btn btn-b-n">
        <i class="bi bi-search"></i>
      </button></a>


    </div>
  </nav><!-- End Header/Navbar -->
</head>
<div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <style type="text/css">
    .navbar-brand img{
      height: 50px;
      width: 50px;
      border-radius: 50%;
    }
  </style>
</html>