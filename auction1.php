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
        <a class="nav-link" href="index.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="auction1.php">Auction<span class="sr-only">(current)</span></a>
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

<!DOCTYPE html>
<html>
<head>
	<title>Player Search</title>
</head>
<body>
	<style>
body {
  background-image: url('https://wallpaperaccess.com/full/670445.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
<center>
    <h1 style="color:white;" >Choose your team name:</h1>
    <div="container">
      <form action=""method="POST">
          <select name="TEAMS" id="TEAMS">
              <option value="RCB">RCB</option>
              <option value="CSK">CSK</option>
              <option value="KKR">KKR</option>
              <option value="MI">MI</option>
              <option value="GT">GT</option>
              <option value="GT">DC</option>
              <option value="LSG">LSG</option>
              <option value="SH">SH</option>
              <option value="PK">PK</option>
          </select>
          <input type="text" name="name" placeholder="Enter your team name"/>
          <input type="submit" name="search" placeholder="Search By name"/>
      </form>
        <?php
        $connection = mysqli_connect('localhost','root');
        $db = mysqli_select_db($connection,'ipl_auction');

        if(isset($_POST['search']))
        {
          $name = $_POST['name'];
          $query = "create table $name (POS int primary key, Player varchar(20), Mat int, Inns int, Amount bigint)";
          $query_run = mysqli_query($connection,$query);
          if($query_run)
        {
          echo "Team table create";
        }
        else{
            echo "failed:";
            }
        }
        ?>
    </div>
</center>
<br><br>
<center>
    <h1 style="color:white;" >Search for player by name</h1>
    <h2 style="color:white;">Batsmen</h2>

    <div="container">
      <form action=""method="POST">
          <input type="text" name="name" placeholder="Enter player name"/>
          <input type="submit" name="search1" placeholder="Search By name"/>
          <input type="text" name="name1" placeholder="Enter your team name"/>
          <input type="text" name="name2" placeholder="Enter player name"/>
          <input type="text" name="name9" placeholder="Enter player amount"/>
          <input type="submit" name="search2" placeholder="add player to team"/>
      </form>
      <table>
        <tr>
          <th style="color:white;">POS</th>
          <th style="color:white;">Player</th>
          <th style="color:white;">Mat</th>
          <th style="color:white;">Inns</th>
          <th style="color:white;">Amount</th>
        </tr><br>
        <?php
        $connection = mysqli_connect('localhost','root');
        $db = mysqli_select_db($connection,'ipl_auction');
        if(isset($_POST['search1']))
        {
          $pname = $_POST['name'];
          $tname = $_POST['name1'];
          $query = "select POS,Player,Mat,Inns,Amount from `batting_stats___ipl_2022` where Player = '$pname'";
          $query_run = mysqli_query($connection,$query);
          while($row = mysqli_fetch_array($query_run))
          {
            ?>
            <tr>
              <td style="color:white;"><?php echo $row['POS'] ;?></td>
              <td style="color:white;"><?php echo $row['Player'] ;?></td>
              <td style="color:white;"><?php echo $row['Mat'] ;?></td>
              <td style="color:white;"><?php echo $row['Inns'] ;?></td>
              <td style="color:white;"><?php echo $row['Amount'] ;?></td>
            </tr>
            <?php 
            $POS=$row['POS'];
            $Player=$row['Player'];
            $Mat=$row['Mat'];
            $Inns=$row['Inns'];
            $Amount=$row['Amount'];
          }
        }
           if(isset($_POST['search2']))
           {
              $pname1 = $_POST['name2'];
              //echo $pname;
              $tname = $_POST['name1'];
              //echo $tname;
              $amt=$_POST['name9'];
              //$query = "select POS,Player,Mat,Inns from batting_stats___ipl_2022 where Player = '$pname'";
              $query = "SELECT * FROM `batting_stats___ipl_2022` where `Player` = '$pname1'";
              $query_run = mysqli_query($connection,$query);
              $row = mysqli_fetch_array($query_run, MYSQLI_NUM);
              $sql="INSERT INTO $tname (`POS`, `Player`, `Mat`, `Inns`, `Amount`) VALUES ($row[0],'$row[1]',$row[2],$row[3],$row[14])";
              $query_run1 = mysqli_query($connection,$sql);
              if($query_run1)
              {
                echo "Team table updated";
              }
              else{
                 echo "failed:";
              }
              $query1="delete from `batting_stats___ipl_2022` where `Player` = '$pname1'";
              $query_run2 = mysqli_query($connection,$query1);
              $query2="update $tname set Amount = '$amt' where player = '$pname1'";
              $query_run3 = mysqli_query($connection,$query2);
              if($query_run3)
              {
                echo "Team table updated";
              }
              else{
                 echo "failed:";
              }              
           }  
        ?>
      </table>
    </div>
    <br><br>
    <h2 style="color:white;">Bowler</h2>

    <form action=""method="POST">
          <input type="text" name="name" placeholder="Enter player name"/>
          <input type="submit" name="search9" placeholder="Search By name"/>
          <input type="text" name="name10" placeholder="Enter your team name"/>
          <input type="text" name="name11" placeholder="Enter player name"/>
          <input type="text" name="name4" placeholder="Enter player amount"/>
          <input type="submit" name="search3" placeholder="add player to team"/>
      </form>
      <table>
        <tr>
          <th style="color:white;">POS</th>
          <th style="color:white;">Player</th>
          <th style="color:white;">Mat</th>
          <th style="color:white;">Inns</th>
          <th style="color:white;">Amount</th>
        </tr><br>
        <?php
        $connection = mysqli_connect('localhost','root');
        $db = mysqli_select_db($connection,'ipl_auction');
        if(isset($_POST['search9']))
        {
          $pname = $_POST['name'];
          $tname = $_POST['name10'];
          $query = "select POS,Player,Mat,Inns,Amount from bowling_stats___ipl_2022_1 where Player = '$pname'";
          $query_run = mysqli_query($connection,$query);
          while($row = mysqli_fetch_array($query_run))
          {
            ?>
            <tr>
              <td style="color:white;"><?php echo $row['POS'] ;?></td>
              <td style="color:white;"><?php echo $row['Player'] ;?></td>
              <td style="color:white;"><?php echo $row['Mat'] ;?></td>
              <td style="color:white;"><?php echo $row['Inns'] ;?></td>
              <td style="color:white;"><?php echo $row['Amount'] ;?></td>

            </tr>
            <?php 
            $POS=$row['POS'];
            $Player=$row['Player'];
            $Mat=$row['Mat'];
            $Inns=$row['Inns'];
            $Amount=$row['Amount'];
          }
        }
           if(isset($_POST['search3']))
           {
              $pname2 = $_POST['name11'];
              //echo $pname;
              $tname2 = $_POST['name10'];
              $amt1=$_POST['name4'];
              //$query = "select POS,Player,Mat,Inns from batting_stats___ipl_2022 where Player = '$pname'";
              $query = "SELECT * FROM `bowling_stats___ipl_2022_1` where `Player` = '$pname2'";
              $query_run = mysqli_query($connection,$query);
              echo "query executed\n";
              $row = mysqli_fetch_array($query_run, MYSQLI_NUM);
               $sql="INSERT INTO $tname2 (`POS`, `Player`, `Mat`, `Inns`) VALUES ($row[0],'$row[1]',$row[2],$row[3])";
              $query_run1 = mysqli_query($connection,$sql);
              $query1="delete from `bowling_stats___ipl_2022_1` where `Player` = '$pname2'";
              $query_run2 = mysqli_query($connection,$query1);
              $query2="update $tname2 set Amount = '$amt1' where player = '$pname2'";
              $query_run3 = mysqli_query($connection,$query2);
              if($query_run1)
              {
                echo "Team table updated";
              }
              else{
                 echo "failed:";
              }              
           }  
        ?>
      </table>
    </div>
</center>
<br><br>
<center>
    <h1 style="color:white;" >Displaying your team</h1>
    

    <div="container">
      <form action=""method="POST">
         <input type="text" name="name7" placeholder="Enter your team name"/>
          <input type="submit" name="search7" placeholder="Search By name"/>

      </form>
      <table>
        <tr>
          <th style="color:white;">POS</th>
          <th style="color:white;">Player</th>
          <th style="color:white;">Mat</th>
          <th style="color:white;">Inns</th>
          <th style="color:white;">Amount</th>
        </tr><br>
        <?php
        $connection = mysqli_connect('localhost','root');
        $db = mysqli_select_db($connection,'ipl_auction');

        if(isset($_POST['search7']))
        { 
          $tname = $_POST['name7'];
          $query = "SELECT * from `$tname`";

          $query_run = mysqli_query($connection,$query);
          while($row = mysqli_fetch_array($query_run))
          {
            ?>
            <tr>
              <td style="color:white;"><?php echo $row['POS'] ;?></td>
              <td style="color:white;"><?php echo $row['Player'] ;?></td>
              <td style="color:white;"><?php echo $row['Mat'] ;?></td>
              <td style="color:white;"><?php echo $row['Inns'] ;?></td>
              <td style="color:white;"><?php echo $row['Amount'] ;?></td>
            </tr>
            <?php 
          }
        }
        ?>
      </table>
    </div>
  </center>
  <center>
  <h1 style="color:white;" >Find average amount player sold for</h1>
    <h2 style="color:white;">Retrieve</h2>

    <div="container">
      <form action=""method="POST">
          <input type="text" name="name10" placeholder="Enter player name"/>
          <input type="submit" name="search10" placeholder="Search By name"/>
      </form>
      <table>
        <tr>
          <th style="color:white;">Player</th>
          <th style="color:white;">Role</th>
          <th style="color:white;">Avg Amount</th>
          <th style="color:white;">Team</th>
          <th style="color:white;">Year</th>
          <th style="color:white;">Origin</th>
        </tr><br>
        <?php
        $connection = mysqli_connect('localhost','root');
        $db = mysqli_select_db($connection,'ipl_auction');

        if(isset($_POST['search10']))
        {
          $name10 = $_POST['name10'];
          $query = "select Player,Role,avg(Amount) as amount,Team,Year,Origin from iplplayerauctiondata where player = '$name10'";
          $query_run = mysqli_query($connection,$query);
          while($row = mysqli_fetch_array($query_run))
          {
            ?>
            <tr>
              <td style="color:white;"><?php echo $row['Player'] ;?></td>
              <td style="color:white;"><?php echo $row['Role'] ;?></td>
              <td style="color:white;"><?php echo $row['amount'] ;?></td>
              <td style="color:white;"><?php echo $row['Team'] ;?></td>
              <td style="color:white;"><?php echo $row['Year'] ;?></td>
              <td style="color:white;"><?php echo $row['Origin'] ;?></td>
            </tr>
            <?php 
          }
        }
        ?>
      </table>
    </div>
  </center> 