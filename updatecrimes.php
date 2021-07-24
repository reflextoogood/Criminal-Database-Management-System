<?php include('server.php');?>
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
              <a class="nav-link" href="http://localhost/DBMS%20Mini%20project/crimes.php">Crimes</a>
            </li>
            
            
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            Search
          </button>
        </form>
    </div>
    </nav>
  </div>
  </div>

<?php   
if (isset($_GET['Crimeid'])){
$crimeidfromlink = trim($_GET['Crimeid']);
$crimecatfromlink = trim($_GET['crimecat']);
$secfromlink = trim($_GET['sec']);

}
if (isset($_POST['editcrimebutton'])) {
    $editcrimeid= trim($_POST['edit_crimeid']);
    $editcrimecat = trim($_POST['edit_crimecat']);
    $editsec= trim($_POST['edit_sec']);
    
    

if (empty($editcrimeid)|| empty($editcrimecat)|| empty($editsec)) {
    array_push($errors, "All Details are Required");
}
if (count($errors) == 0) {
    $querytoaddcase = "UPDATE `crime's` SET `Crime ID`='$editcrimeid',`Crime Category`='$editcrimecat',`Section`='$editsec' WHERE `Crime ID`='$crimeidfromlink'";
    $result902 = mysqli_query($connection, $querytoaddcase);
    if ($result902) {
        header("location:crimes.php");
    }
}
}
?>


  <div style="margin-top: 120px;margin-bottom: 100px;" class="global-container">
		<div class="card login-form">
			<div class="card-body">
				<h3 class="card-title text-center">Crime Details</h3>
				<div class="card-text">
                <form method="post" action="">
						<?php include('errors.php'); ?>
						<!-- to error: add class "has-danger" -->
						<div class="form-group">
							<label for="exampleInputEmail1">Crime ID</label>
							<input type="text" name="edit_crimeid" value=" <?php echo $crimeidfromlink; ?>" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Crime Category</label>
							<input type="text" name="edit_crimecat" value=" <?php echo $crimecatfromlink; ?>" class="form-control form-control-sm" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
							<label for="exampleInputPassword1">Section</label>
							<input type="text" name="edit_sec"  value=" <?php echo $secfromlink; ?>" class="form-control form-control-sm" id="exampleInputPassword1">
                        </div>
                        
                        
						<button type="submit" name="editcrimebutton" class="btn btn-primary btn-block">Submit</button>
                    </form>
				</div>
			</div>
		</div>
	</div>

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