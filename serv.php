<?php
@include('userheader.php');
$collect = "SELECT * FROM apartments ORDER BY id desc limit 1";
$result = mysqli_query($conn,$collect);
	$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ApartmentFinder|property</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body class="text-center">
	<div class="container">
		
		<?php
				
				$query_command = "SELECT * FROM apartments ORDER BY id desc";

      $query_res = $conn->query($query_command);
          if ($query_res->num_rows > 0){  
          	$a=0;          
              while($row = $query_res->fetch_assoc()){
						$a++;
						
						?>
					
						

				 <div class="album py-5 bg-light">
    <div class="container">


          <div class="card shadow-lg">
          	<div class="col">
		
           

            <div class="card-body">
                <img src="admin/dashboard/images/<?=$row['apartment_photo'] ?>" alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a" style="color: black;background-color: white;">rent | <?php echo $row['apartment_price'] ?></span>
                    </div>
                    
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                    	<h2 class="card-title-a">
                      <a href="#" style="color: black;"><?php echo $row['apartment_name'] ?>
                        </a>
                    </h2>
                      <li>
                        <h4 class="card-info-title">Location</h4>
                        <span><?php echo $row['apartment_location']?>
                          
                        </span>
                      </li>
                      
                      <li>
                        <h4 class="card-info-title">Bathrooms</h4>
                        <span><?php echo $row['bathrooms']?></span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Garages</h4>
                        <span><?php echo $row['garages'] ?></span>
                      </li>
                      <div class="btn-group">
                <?php echo "<a class='btn btn-lg btn-outline-primary' href='book.php?id=".$row['id']."'>Book</a>&nbsp;";?>

                </div>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
					<?php
				}
			}

				?>
				
			</div>

		</div>

	</div> <?php @include('footer.php')?>
	</div>

</body>
<style type="text/css">
	body{
		margin-top: 5rem;
	}
	.card-body{
		border-radius: 10px;
	}
</style>
</html>