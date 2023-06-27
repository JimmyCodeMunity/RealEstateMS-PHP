<?php
@include('userheader.php');
@include 'config.php';

error_reporting(0);

if(isset($_GET['id']) && $_GET['id']!=''){
  $image_required='';
  $id=$_GET['id'];
  $res=mysqli_query($conn,"select * from apartments where id='$id'");
  $check=mysqli_num_rows($res);
  if($check>0){
    $row=mysqli_fetch_assoc($res);
    $serv=$row['apartment_name'];
    $sprice = $row['apartment_price'];
    
  }else{
    header('serv.php');
    die();
  }
}




if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   
   $date = mysqli_real_escape_string($conn, $_POST['date']);
   $email = $_POST['email'];
   $category = $_POST['cat-name'];
   $email = $_POST['email'];
   $service = $_POST['service_name'];
   $price = $_POST['service_price'];


   $select = " SELECT * FROM bookings WHERE service = '$service' && bookdate = '$date'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'you already booked!';
      
     

   }else{
    $insert = "INSERT INTO bookings(username,bookdate,email,Type,service,price) VALUES('$name','$date','$email','$category','$service','$price')";
         mysqli_query($conn, $insert);
         header('location:serv.php');
    
   }

};


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="navbar-top-fixed.css" rel="stylesheet">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="modal modal-signin position-static d-block bg-white-+ py-5" tabindex="-1" role="dialog" id="modalSignin">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Book a house now</h2>
        <a href="serv.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
      </div>

      <div class="modal-body p-5 pt-0">
        <form class="" action="" method="post">
          <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <br>
          <div class="form-floating mb-3">
            <input type="text" name="name" value="<?php echo $_SESSION['username']?>" class="form-control rounded-3" id="floatingInput" required placeholder="">
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="date" name="date" class="form-control rounded-3" id="floatingInput" required placeholder="">
            <label for="floatingInput"> Date</label>
          </div>
          
          <div class="form-floating mb-3">
            <input type="email" value="<?php echo $_SESSION['user_email']?>" name="email" class="form-control rounded-3" id="floatingInput" required placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="cat_name" value="<?php echo $row['apartment_type']?>" class="form-control rounded-3" id="floatingInput" required placeholder="enter contact">
            
            <label for="floatingInput">Type</label>
          </div>

          
          <div class="form-floating mb-3">
            <input type="text" name="service_name" value="<?php echo $serv?>" class="form-control rounded-3" id="floatingInput" required placeholder="enter contact">
            
            <label for="floatingInput">Apartment Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="service_price" value="<?php echo $sprice ?>" class="form-control rounded-3" id="floatingInput" required placeholder="">
            <label for="floatingInput">Price</label>
          </div>
          <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" name="submit" type="submit">Book House</button>
          
          
          
        </form>
      </div>
    </div>
  </div>
</div>


</body>
<style type="text/css">
  body{
    background: url(images/mac.jpg);
    background-position: center;
    background-repeat: none;
    background-size: cover;
  }
</style>
</html>