<?php include('server.php');  ?>
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
              <a class="nav-link" href="http://localhost/DBMS%20Mini%20project/database_civilian.php">Database</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="">Cases</a>
            </li>
            
            
        </ul>
        <form class="form-inline my-2 my-lg-0" action="http://localhost/DBMS%20Mini%20project/civilian_cases.php" method="POST">
          <input class="form-control mr-sm-2"  name="search-case_field" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit"  name="search-case_button">
            Search
          </button>
        </form>
    </div>
    </nav>
  </div>
  </div>

  <!-- table containing of police officers -->
  
  <?php

  $casedataquery = "SELECT * FROM `case's` WHERE 1";
  $cases = mysqli_query($connection, $casedataquery);
  ?>
  <div style="padding:50px;margin-top:200px;margin-bottom:200px;">
    <table id="editable_table"class="table table-bordered">
      <thead class="thead-dark" style="background-color: black; color: white;">
        <tr>
          <th scope="col">Case ID</th>
          <th scope="col">Criminal ID</th>
          <th scope="col">Crime ID</th>
          <th scope="col">Description</th>
          <th scope="col">Victim/'s Name</th>
          <th scope="col">Victim/'s Address</th>
          <th scope="col">Sentence</th>
          <th scope="col">Location of Crime</th>
          <th scope="col">Date of Crime</th>
          <th scope="col">Station ID</th>
          
        </tr>
      </thead>

      <?php
      if(isset($_POST['search-case_button'])){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $caserecord = $_POST['search-case_field'];
          if (empty($caserecord)) {
            $msg="Can't be empty field";
            echo "<script type='text/javascript'>alert('$msg');</script>";
          }
          $case_result = mysqli_query($connection, "SELECT * FROM `case's` WHERE `Case ID` LIKE '%$caserecord%' OR `Criminal ID` LIKE '%$caserecord%' OR `Crime ID` LIKE '%$caserecord%' OR `Description` LIKE '%$caserecord%' OR `Victim/s Name` LIKE '%$caserecord%' OR `Victim/s Address` LIKE '%$caserecord%'  OR `Sentence` LIKE '%$caserecord%'  OR `Location of Crime` LIKE '%$caserecord%'  OR `Date of Crime` LIKE '%$caserecord%'  OR `Station ID` LIKE '%$caserecord%'");
          $queryresult=mysqli_num_rows($case_result);
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
          while ($rows0= mysqli_fetch_assoc($case_result)){
            ?>
            <tbody style="background-color: white; color: black;">
          <tr>
            <td><?php echo $rows0['Case ID']; ?></td>  
            <td><?php echo $rows0['Criminal ID']; ?></td>
            <td><?php echo $rows0['Crime ID']; ?></td>
            <td><?php echo $rows0['Description']; ?></td>
            <td><?php echo $rows0['Victim/s Name']; ?></td>
            <td><?php echo $rows0['Victim/s Address']; ?></td>
            <td><?php echo $rows0['Sentence']; ?></td>
            <td><?php echo $rows0['Location of Crime']; ?></td>
            <td><?php echo $rows0['Date of Crime']; ?></td>
            <td><?php echo $rows0['Station ID']; ?></td>
            
          </tr>
        </tbody>
          
          <?php
          }
        }
        }
      }
      else{
      while ($rows = mysqli_fetch_assoc($cases)) {
      ?>

        <tbody style="background-color: white; color: black;">
          <tr>
            <td><?php echo $rows['Case ID']; ?></td>  
            <td><?php echo $rows['Criminal ID']; ?></td>
            <td><?php echo $rows['Crime ID']; ?></td>
            <td><?php echo $rows['Description']; ?></td>
            <td><?php echo $rows['Victim/s Name']; ?></td>
            <td><?php echo $rows['Victim/s Address']; ?></td>
            <td><?php echo $rows['Sentence']; ?></td>
            <td><?php echo $rows['Location of Crime']; ?></td>
            <td><?php echo $rows['Date of Crime']; ?></td>
            <td><?php echo $rows['Station ID']; ?></td>
           
          </tr>
        </tbody>

      <?php
      }
    }
      ?>

    </table>
  </div>

  <!-- end of table containing of police officers -->
  


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