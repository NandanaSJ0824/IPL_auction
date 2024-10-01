<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>IPL 2023</title>
  <link rel="stylesheet" typer="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand">IPL AUCTION 2023</a>
 

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="auction1.php">Auction</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dataretrieval.php">Player info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
         <a class="nav-link" href="teams.php">Teams</a>
      </li>
    </ul>
  </div>
</nav>


<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://circleofcricket.com/post_image/post_image_0f63f61.JPG" width="1200" height="900">
    </div>
    <div class="carousel-item">
      <img src="https://crickettimes.com/wp-content/uploads/2021/02/IPL-2021-complete-squads.jpg" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="https://www.deccanherald.com/sites/dh/files/gallery_images/2022/03/25/Lead.png" width="1100" height="700">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></sspan>
  </a>
</div>

<section class = "my-5">
	<div class="py-5">
<h2 class="text-center"> Auction </h2>
</div>

<div class="container-fluid">
<div class="row">
	<div class="col-lg-6 col-md-6 col-12">
		<img src="img/4.jpg" class="img-fluid">
		<img src="img/3.jpg" class="img-fluid">
</div>
<div class="col-lg-6 col-md-6 col-12">
		<h2> Ipl Auction 2023</h2>
		<p class="py-3">This website is being built for easy auctioning system. Every team can access the data of the player and its information. Every team will be able to run simulation of auction using this website. Gives you direct insight into real IPL Auction</p>
</div>
</div>
</div>
</section>


<section class = "my-5">
  <div class="py-5">
<h2 class="text-center"> User Details</h2>
</div>
<div class="w-50 m-auto">
  <form action=""method="POST">
    <div class="form-group">
      <label>Username</label>
      <input type="text" name="user" autocomplte="off"class="form-control">
    </div>
     <div class="form-group">
      <label>Email ID</label>
      <input type="text" name="email" autocomplte="off"class="form-control">
    </div>
     <div class="form-group">
      <label>Mobile Number</label>
      <input type="text" name="mobile" autocomplte="off"class="form-control">
    </div>
     <div class="form-group">
      <label>id</label>
      <input type="text" name="id" autocomplte="off"class="form-control">
    </div>
    <input type="submit" name="search1" placeholder="Search By name"/>
    </form>
     <table>
        <tr>
          <th style="color:white;">verify</th>
        </tr>
   <?php
      $con = mysqli_connect('localhost','root');
      $db = mysqli_select_db($con,'ipl_auction');
      if($con){
      echo "Connection successfull\n";
      }else{
            echo "Connection Failed\n";
      }
      mysqli_select_db($con,'ipl_auction');
      if(isset($_POST['search1']))
      {
        $name = $_POST['user'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $id = $_POST['id'];
        $query="INSERT INTO `userinfodata` (`user`, `email`, `mobile`, `id`) VALUES ('$name','$email','$mobile','$id');";
        $result = mysqli_query($con,$query);
        
        if($result)
        {
          echo "     Registration Successfully\n";
        }
        else{
            echo "     failed\n";
        }
        $q = "SELECT `verify` from `userinfodata` where `id`=$id";

        $r = mysqli_query($con,$q);
         while($row = mysqli_fetch_array($r))
          {
            ?>
            <tr>
              <td style="color:black;"><?php echo $row['verify'] ;?></td>
            </tr>
             <?php 
          }
           echo "If not verified... invalid entry!\t register again\n";
      }

    ?>
    <table>
        <tr>
          <th style="color:white;">verify</th>
        </tr>
        <?php
        $connection = mysqli_connect('localhost','root');
        $db = mysqli_select_db($connection,'ipl_auction');

        if(isset($_POST['search1']))
        { 
          $query = "SELECT `verify` from `userinfodata` where `verify`='$id'";
          $query_run = mysqli_query($connection,$query);
          while($row = mysqli_fetch_array($query_run))
          {
            ?>
            <tr>
              <td style="color:black;"><?php echo $row['verify'] ;?></td>
            </tr>
             <?php 
          }
        }
        ?>
    </table>      
    <br><a href="auction1.php" class="btn btn-outline-success">Lets Auction</a>
</div>
</section>



<footer>
  <p class="p-3 bg-dark text-white text-center">@IPLAuctionSystem</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 