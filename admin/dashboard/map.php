
<?php
@include('config.php');

error_reporting(1);
if(isset($_POST['post'])){
  $s_name = mysqli_real_escape_string($conn,$_POST['servname']);
  $s_price = $_POST['price'];
  $loc = $_POST['location'];
  $gar = $_POST['garages'];
  $types = $_POST['types'];
  $bth = $_POST['bathrooms'];

  $path="images/".basename($image_name);
  
  $image_name = $_FILES["profile_pic"]["name"];
  
  $file_extension= pathinfo($_FILES["profile_pic"]["name"], PATHINFO_EXTENSION);
  
  $allowed_ext = array("png","jpg");
  
  if (!in_array($file_extension, $allowed_ext )){
    header("Location:map.php");
    exit();
  }
  $profile_pic = rand() .$profile_pic.'.'.$file_extension;
  
  $profile_pic_tmp_name = $_FILES["profile_pic"]["tmp_name"];
  
  $target = $path . $profile_pic;
  
  move_uploaded_file($profile_pic_tmp_name, $target);

  $insert = "INSERT INTO apartments(apartment_name,apartment_photo,apartment_price,apartment_location,garages,apartment_type,bathrooms)VALUES('$s_name','$profile_pic','$s_price','$loc','$gar','$types','$bth')";
  mysqli_query($conn,$insert);

}

else{
  echo "data not saved";
}


if(isset($_GET['type']) && $_GET['type']!=''){
  $type=$_GET['type'];
  if($type=='status'){
    $operation=$_GET['operation'];
    $id=$_GET['id'];
    if($operation=='active'){
      $status='1';
    }else{
      $status='0';
    }
    $update_status_sql="update apartments set status='$status' where id='$id'";
    mysqli_query($conn,$update_status_sql);
  }
  
  if($type=='delete'){
    $id=$_GET['id'];
    $delete_sql="delete from apartments where id='$id'";
    mysqli_query($conn,$delete_sql);
  }
}
$sql="SELECT * FROM apartments";
$res=mysqli_query($conn,$sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    ApartmentFinder
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          ApartmentFinder
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./index.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          
          <li class="active ">
            <a href="./map.php">
              <i class="nc-icon nc-pin-3"></i>
              <p>apartments</p>
            </a>
          </li>
          
          <li>
            <a href="./user.php">
              <i class="nc-icon nc-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li>
            <a href="./tables.php">
              <i class="nc-icon nc-tile-56"></i>
              <p>Customers</p>
            </a>
          </li>
          <li>
            <a href="./notice.php">
              <i class="nc-icon nc-chat-33"></i>
              <p>Notice</p>
            </a>
          </li>
         <li>
            <a href="../../logout.php">
              <i class="fa fa-close"></i>
              <p>Logout</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Add Apartment</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="javascript:;">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="javascript:;">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Add Service</h5>
              </div>
              <div class="card-body">
                <form action="" method="post" enctype ="multipart/form-data">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Company (disabled)</label>
                        <input type="text" class="form-control" placeholder="Company" value="ApartmentFinder">
                      </div>
                    </div>
                    <br>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Apartment name</label>
                        <input type="text" class="form-control" required placeholder="enter Service Name" name="servname" value="">
                      </div>
                    </div>
                   
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Apartment photo</label>
                        <button class="btn btn-primary">
                        <input type="file" class="form-control btn-primary" required name="profile_pic" value="">Choose PIc<i class="fa fa-upload"></i> </button>
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Apartment Price</label>
                        <input type="text" class="form-control" required placeholder="Enter price of service Name" name="price" value="">
                      </div>
                    </div>
                    
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Apartment location</label>
                        <input type="text" class="form-control" required placeholder="enter Service Name" name="location" value="">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Garage</label>
                        <input type="text" class="form-control" required placeholder="enter Service Name" name="garages" value="">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control" required placeholder="enter Service Name" name="types" value="">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Bathrooms</label>
                        <input type="text" class="form-control" required placeholder="enter Service Name" name="bathrooms" value="">
                      </div>
                    </div>
                   
                  </div>
                 
                  
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round" name="post">Post</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <!--add category form-->
      
      



      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Available apartments</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>serial</th>
                      <th>
                        Apt Id
                      </th>
                      <th>
                       Apt Name
                      </th>
                      <th>
                        Apt price
                      </th>
                      <th>
                        Apt photo
                      </th>
                      <th>
                        Availability
                      </th>
                     
                      
                    </thead>
                    <tbody>
                      <tr>
                        <?php
                        $i = 0;
        if($stmt = $conn->query("SELECT * FROM apartments")){
          while ($row = $stmt->fetch_assoc()) {
            ?>
           <tr style="background-color:white; font-size: 14px;">
                 <td class="serial"><?php echo $i++?></td>
                
                 <td><?php echo $row['id']?></td>
                 <td><?php echo $row['apartment_name']?></td>
                 <td><?php echo $row['apartment_price']?></td>
                 <td><img style="border-radius: 50%;" src="images/<?=$row['apartment_photo'] ?>"width="50px" height="50px" ></td>
                 
                 <td>
                   <?php
                if($row['status']==1){
                  echo "<a class='btn btn-sm btn-success' href='?type=status&operation=deactive&id=".$row['id']."'>booked</a>&nbsp;";
                }else{
                  echo "<a class='btn btn-sm btn-pending' href='?type=status&operation=active&id=".$row['id']."'>In Session</a>&nbsp;";
                }
                echo "<a class='btn btn-sm btn-primary' href='apartmentdata.php?id=".$row['id']."'>Edit</a>&nbsp;";
                
                echo "<a class='btn btn-sm btn-danger' href='?type=delete&id=".$row['id']."'>Delete</a>";
                
                ?>
                 </td>               
                 

                 
                 
                 
              </tr>




          
          <?php
        }
      }

        ?>
                       
                        
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>

      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="https://www.creative-tim.com" target="_blank">ApartmentFinder</a></li>
                <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by ApartmentFinder
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      demo.initGoogleMaps();
    });
  </script>
</body>

</html>