<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <title>IPL 2023</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" typer="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">IPL AUCTION 2023</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

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
<head>
  <title>Player Search</title>
</head>
<body background=background_ipl.jpg>
  <style>
    body {
  background:url('https://www.pixelstalk.net/wp-content/uploads/images5/Aesthetic-Yellow-HD-Wallpaper.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
  <center>
    <h1 style="color:white;" >CSK Previous team</h1>
    <div="container">
      <form action=""method="POST">
          <input type="submit" name="search" placeholder="Search By name"/>
      </form>
      <img src="https://i.pinimg.com/originals/70/52/1b/70521baac89be4d4cb2f223bbf67c974.png" width="600" height="300" align="left">
      <table>
        <tr>
          <th style="color:white;">POS</th>
          <th style="color:white;">Player</th>
          <th style="color:white;">Role</th>
        </tr><br>
        <?php
        $connection = mysqli_connect('localhost','root');
        $db = mysqli_select_db($connection,'ipl_auction');

        if(isset($_POST['search']))
        {
          $query = "SELECT * from csk_team ;";
          $query_run = mysqli_query($connection,$query);
          while($row = mysqli_fetch_array($query_run))
          {
            ?>
            <tr>
              <td style="color:white;"><?php echo $row['POS'] ;?></td>
              <td style="color:white;"><?php echo $row['Player'] ;?></td>
              <td style="color:white;"><?php echo $row['Role'] ;?></td>
            </tr>
            <?php 
          }
        }
        ?>
      </table>
    </div>
  </center>
</body>
</html>