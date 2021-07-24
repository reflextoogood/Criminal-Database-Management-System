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
              <a class="nav-link" href="http://localhost/DBMS%20Mini%20project/criminals.php">Criminals</a>
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
if (isset($_GET['criminalid'])){
$criminalidfromlink = trim($_GET['criminalid']);
$namefromlink = trim($_GET['name']);
$crimeidfromlink = trim($_GET['crimeid']);
$agefromlink = trim($_GET['age']);
$heightfromlink = trim($_GET['height']);
$weightfromlink = trim($_GET['weight']);
$crimedescfromlink = trim($_GET['crimedesc']);
$addfromlink = trim($_GET['add']);
$statusfromlink = trim($_GET['status']);

}
if (isset($_POST['editcriminalbutton'])) {
    $editcriminalid= trim($_POST['edit_criminalid']);
    $editname = trim($_POST['edit_name']);
    $editcrimeid= trim($_POST['edit_crimeid']);
    $editage= trim($_POST['edit_age']);
    $editheight = trim($_POST['edit_height']);
    $editweight= trim($_POST['edit_weight']);
    $editcrimedesc= trim($_POST['edit_crimedesc']);
    $editaddress = trim($_POST['edit_add']);
    $editstat= trim($_POST['edit_status']);
    
    

if (empty($editcriminalid)|| empty($editname)|| empty($editcrimeid)|| empty($editage)|| empty($editheight)|| empty($editweight)||empty($editcrimedesc)|| empty($editaddress)|| empty($editstat)) {
    array_push($errors, "All Details are Required");
}
if (count($errors) == 0) {
    $querytoaddcase = "UPDATE `criminal's` SET `Criminal ID`='$editcriminalid',`Name`='$editname',`Crime ID`='$editcrimeid',`Age`='$editage',`Height`='$editheight',`Weight`='$editweight',`Crimes Description`='$editcrimedesc',`Address`='$editaddress',`Status`='$editstat' WHERE `Criminal ID`='$criminalidfromlink'";
    $result1002 = mysqli_query($connection, $querytoaddcase);
    if ($result1002) {
        header("location:criminals.php");
    }
}
}
?>


  <div style="margin-top: 120px;margin-bottom: 100px;" class="global-container">
		<div class="card login-form">
			<div class="card-body">
				<h3 class="card-title text-center">Police Officer Details</h3>
				<div class="card-text">
                <form method="post" action="">
						<?php include('errors.php'); ?>
						<!-- to error: add class "has-danger" -->
						<div class="form-group">
							<label for="exampleInputEmail1">Criminal ID</label>
							<input type="text" name="edit_criminalid" value=" <?php echo $criminalidfromlink; ?>" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Name</label>
							<input type="text" name="edit_name" value=" <?php echo $namefromlink; ?>" class="form-control form-control-sm" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
							<label for="exampleInputPassword1">Crime ID</label>
							<input type="text" name="edit_crimeid"  value=" <?php echo $crimeidfromlink; ?>" class="form-control form-control-sm" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
							<label for="exampleInputEmail1">Age</label>
							<input type="text" name="edit_age" value=" <?php echo $agefromlink; ?>" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Height</label>
							<input type="text" name="edit_height" value=" <?php echo $heightfromlink; ?>" class="form-control form-control-sm" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
							<label for="exampleInputPassword1">Weight</label>
							<input type="text" name="edit_weight"  value=" <?php echo $weightfromlink; ?>" class="form-control form-control-sm" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
							<label for="exampleInputEmail1">Crimes Description</label>
							<input type="text" name="edit_crimedesc" value=" <?php echo $crimedescfromlink; ?>" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Address</label>
							<input type="text" name="edit_add" value=" <?php echo $addfromlink; ?>" class="form-control form-control-sm" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
							<label for="exampleInputPassword1">Status</label>
							<input type="text" name="edit_status"  value=" <?php echo $statusfromlink; ?>" class="form-control form-control-sm" id="exampleInputPassword1">
                        </div>
                        
                        
						<button type="submit" name="editcriminalbutton" class="btn btn-primary btn-block">Submit</button>
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