<?php include('server.php');
//If user is not loggged in,they cxannot access this page
if (empty($_SESSION['email'])) {
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criminal Database</title>
  <link rel="stylesheet" href="Css/style.css">
  <link rel="icon" href="images/Fingerprint.jpg" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif&display=swap" rel="stylesheet" />
</head>

<body style="background-color: #181818">
  <!-- /*     from here     */ -->
  <div>
    <div>
      <nav id="navigation_bar" class="navbar navbar-expand-lg navbar-light">
        <a style="border-bottom: #181818" class="navbar-brand" href="#">Criminal Records</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="http://localhost/DBMS%20Mini%20project/homepage.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/DBMS%20Mini%20project/database.php">Database</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Criminals</a>
            </li>
            
            
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Account
              </a>
              <div id="nav_drop" class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #181818">
                <?php if (isset($_SESSION['email'])) : ?>

                  <a class="dropdown-item" href="http://localhost/DBMS%20Mini%20project/database.php?logout='1'">Logout</a>
                <?php endif ?>
                <a class="dropdown-item" href="http://localhost/DBMS%20Mini%20project/ChangePassword_police.php">Change Password</a>
              </div>
            </li> -->
            
        </ul>
        <form class="form-inline my-2 my-lg-0" action="http://localhost/DBMS%20Mini%20project/criminals.php" method="POST">
          <input class="form-control mr-sm-2" name="search-criminal_field"type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search-criminal_button">
            Search
          </button>
        </form>
    </div>
    </nav>
  </div>
  </div>

  <!-- Button -->
  <div style="text-align: center;margin-top:100px;margin-bottom:50px">
  <form method="post"  action="http://localhost/DBMS%20Mini%20project/add_criminal.php">
  
  <button type="submit" class="btn btn-primary">Add Criminal</button>

  </form>
  </div>
  <!-- button done -->
<!-- table containing of police officers -->
  
<?php

if (isset($_POST['delete_criminal'])) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $criminalid = $_POST['id_ofcriminal'];
    if (empty($criminalid)) {
      $msg="Can't be empty field";
      echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    $q1 = mysqli_query($connection, "DELETE FROM `criminal's` WHERE `Criminal ID`='$criminalid'");
  }
}





$criminaldataquery = "SELECT * FROM `criminal's` WHERE 1";
$criminals = mysqli_query($connection, $criminaldataquery);
?>
<div style="padding:50px;">
  <table id="editable_table"class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white;">
      <tr>
        <th scope="col">Criminal ID</th>
        <th scope="col">Name</th>
        <th scope="col">Crime ID</th>
        <th scope="col">Age</th>
        <th scope="col">Height</th>
        <th scope="col">Weight</th>
        <th scope="col">Crimes Description</th>
        <th scope="col">Address</th>
        <th scope="col">Status</th>
        <th scope="col"></th>
      </tr>
    </thead>

    <?php
    if(isset($_POST['search-criminal_button'])){
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $criminalrecord = $_POST['search-criminal_field'];
        if (empty($criminalrecord)) {
          $msg="Can't be empty field";
          echo "<script type='text/javascript'>alert('$msg');</script>";
        }
        $criminal_result = mysqli_query($connection, "SELECT * FROM `criminal's` WHERE `Criminal ID` LIKE '%$criminalrecord%' OR `Name` LIKE '%$criminalrecord%' OR `Crime ID` LIKE '%$criminalrecord%' OR `Age` LIKE '%$criminalrecord%' OR `Height` LIKE '%$criminalrecord%' OR `Weight` LIKE '%$criminalrecord%' OR `Crimes Description` LIKE '%$criminalrecord%' OR `Address` LIKE '%$criminalrecord%' OR `Status` LIKE '%$criminalrecord%'");
        $queryresult=mysqli_num_rows($criminal_result);
          if($queryresult == 0 ){
            ?>
            <tbody style="background-color: white; color: black;">
          <tr>
            <td><?php echo " No Results Found" ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            
          </tr>
        </tbody>
        <?php
          }
          else{
            if($queryresult == 1){
              ?>
              <p style="color: white;">We found <?php echo $queryresult?> result !!!!</p>
            <?php
            }
            else{
              ?>
            <p style="color: white;">We found <?php echo $queryresult?> results !!!!</p>
        <?php
            }
        while ($rows0=mysqli_fetch_assoc($criminal_result)){
        ?>
        <tbody style="background-color: white; color: black;">
        <tr>
          <td><?php echo $rows0['Criminal ID']; ?></td>
          <td><?php echo $rows0['Name']; ?></td>
          <td><?php echo $rows0['Crime ID']; ?></td>
          <td><?php echo $rows0['Age']; ?></td>
          <td><?php echo $rows0['Height']; ?></td>
          <td><?php echo $rows0['Weight']; ?></td>
          <td><?php echo $rows0['Crimes Description']; ?></td>
          <td><?php echo $rows0['Address']; ?></td>
          <td><?php echo $rows0['Status']; ?></td>
          <td><form method="post"  action="http://localhost/DBMS%20Mini%20project/updatecriminals.php?criminalid=<?php echo $rows0['Criminal ID']; ?>&name=<?php echo $rows0['Name']; ?>&crimeid=<?php echo $rows0['Crime ID']; ?>&age=<?php echo $rows0['Age']; ?>&height=<?php echo $rows0['Height']; ?>&weight=<?php echo $rows0['Weight']; ?>&crimedesc=<?php echo $rows0['Crimes Description']; ?>&add=<?php echo $rows0['Address']; ?>&status=<?php echo $rows0['Status']; ?> ">
              <button style="margin-bottom: 0px;margin-top:0px;" name="delete1" type="submit" class="btn btn-success">Edit</button>
              </form>
          </td>
        </tr>
      </tbody>
        <?php
        }
      }
      }
    }
    else{
      while ($rows = mysqli_fetch_assoc($criminals)) {
    ?>

      <tbody style="background-color: white; color: black;">
        <tr>
          <td><?php echo $rows['Criminal ID']; ?></td>
          <td><?php echo $rows['Name']; ?></td>
          <td><?php echo $rows['Crime ID']; ?></td>
          <td><?php echo $rows['Age']; ?></td>
          <td><?php echo $rows['Height']; ?></td>
          <td><?php echo $rows['Weight']; ?></td>
          <td><?php echo $rows['Crimes Description']; ?></td>
          <td><?php echo $rows['Address']; ?></td>
          <td><?php echo $rows['Status']; ?></td>
          <td><form method="post"  action="http://localhost/DBMS%20Mini%20project/updatecriminals.php?criminalid=<?php echo $rows['Criminal ID']; ?>&name=<?php echo $rows['Name']; ?>&crimeid=<?php echo $rows['Crime ID']; ?>&age=<?php echo $rows['Age']; ?>&height=<?php echo $rows['Height']; ?>&weight=<?php echo $rows['Weight']; ?>&crimedesc=<?php echo $rows['Crimes Description']; ?>&add=<?php echo $rows['Address']; ?>&status=<?php echo $rows['Status']; ?> ">
              <button style="margin-bottom: 0px;margin-top:0px;" name="delete" type="submit" class="btn btn-success">Edit</button>
              </form>
          </td>
        </tr>
      </tbody>

    <?php
    }
  }
    ?>

  </table>
</div>

<!-- end of table containing of police officers -->
<!-- Button -->
<div style="text-align: center;">
  <form method="post">
    <input style="margin:0 auto;" type="text" class="form-control w-25" id="formGroupExampleInput" name="id_ofcriminal" placeholder="Criminal ID">
    
 
  <button style="margin-bottom: 50px;" name="delete_criminal" type="submit" class="btn btn-danger">Delete Criminal</button>
  </form>
</div>


<!-- button done -->


<footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>About</h6>
          <p class="text-justify">
            Crime Database <i>DO NOT COMMIT ANY CRIMES</i> Although there are
            many different kinds of crimes, criminal acts can generally be
            divided into four primary categories: personal crimes, property
            crimes, inchoate crimes, statutory crimes, and financial crimes.
          </p>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Categories</h6>
          <ul class="footer-links">
            <li>
              <a href="https://en.wikipedia.org/wiki/Category:Crimes">Assault and battery</a>
            </li>
            <li>
              <a href="https://en.wikipedia.org/wiki/Category:Crimes">Arson</a>
            </li>
            <li>
              <a href="https://en.wikipedia.org/wiki/Category:Crimes">Child Abuse</a>
            </li>
            <li>
              <a href="https://en.wikipedia.org/wiki/Category:Crimes">Domestic Abuse</a>
            </li>
            <li>
              <a href="https://en.wikipedia.org/wiki/Category:Crimes">Kidnapping</a>
            </li>
            <li>
              <a href="https://en.wikipedia.org/wiki/Category:Crimes">Rape and Statutory Rape</a>
            </li>
          </ul>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Quick Links</h6>
          <ul class="footer-links">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">Contribute</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Sitemap</a></li>
          </ul>
        </div>
      </div>
      <hr />
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">
            Copyright &copy; 2020 All Rights Reserved by
            <a href="#">Deepak Vellanki</a>.
          </p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li>
              <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
            </li>
            <li>
              <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
              <a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a>
            </li>
            <li>
              <a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>

</html>