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
              <a class="nav-link" href="http://localhost/DBMS%20Mini%20project/cases.php">Cases</a>
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
if (isset($_GET['caseid'])){
$caseidfromlink = trim($_GET['caseid']);
$criminalidfromlink = trim($_GET['criminalid']);
$crimeidfromlink = trim($_GET['crimeid']);
$descfromlink = trim($_GET['desc']);
$victimnamefromlink = trim($_GET['vicname']);
$victimaddfromlink = trim($_GET['vicadd']);
$sentencefromlink = trim($_GET['sentence']);
$locationfromlink = trim($_GET['loc']);
$docfromlink = trim($_GET['doc']);
$SIfromlink = trim($_GET['SI']);
}
if (isset($_POST['editcase_detailsbutton'])) {
    $editcaseid= trim($_POST['editcase_id']);
    $editcriminalid = trim($_POST['editcriminal_id']);
    $editcrimeid= trim($_POST['editcrime_id']);
    $editdescription= trim($_POST['editdescription']);
    $editvictimname = trim($_POST['editvictimname']);
    $editvictimadd= trim($_POST['editvictimadd']);
    $editsentence= trim($_POST['editsentence']);
    $editloc = trim($_POST['editlocation_crime']);
    $editdate= trim($_POST['editdate']);
    $editstationid= trim($_POST['editstation_id']);

if (empty($editcaseid)|| empty($editcriminalid)|| empty($editcrimeid)|| empty($editdescription)|| empty($editvictimname)|| empty($editvictimadd)|| empty($editsentence)|| empty($editloc)|| empty($editdate)|| empty($editstationid))  {
    array_push($errors, "All Details are Required");
}
if (count($errors) == 0) {
    $querytoaddcase = "UPDATE `case's` SET `Case ID`='$editcaseid',`Criminal ID`='$editcriminalid',`Crime ID`='$editcrimeid',`Description`='$editdescription',`Victim/s Name`='$editvictimname',`Victim/s Address`='$editvictimadd',`Sentence`='$editsentence',`Location of Crime`='$editloc',`Date of Crime`='$editdate',`Station ID`='$editstationid' WHERE `Case ID`='$caseidfromlink'";
    $result602 = mysqli_query($connection, $querytoaddcase);
    if ($result602) {
        header("location:cases.php");
    }
}
}
?>


  <div style="margin-top: 120px;margin-bottom: 100px;" class="global-container">
		<div class="card login-form">
			<div class="card-body">
				<h3 class="card-title text-center">Case Details</h3>
				<div class="card-text">
                <form method="post" action="">
						<?php include('errors.php'); ?>
						<!-- to error: add class "has-danger" -->
						<div class="form-group">
							<label for="exampleInputEmail1">Case ID</label>
							<input type="text" name="editcase_id" value=" <?php echo $caseidfromlink; ?>" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Criminal ID</label>
							<input type="text" name="editcriminal_id" value=" <?php echo $criminalidfromlink; ?>" class="form-control form-control-sm" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
							<label for="exampleInputPassword1">Crime ID</label>
							<input type="text" name="editcrime_id"  value=" <?php echo $crimeidfromlink; ?>" class="form-control form-control-sm" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
							<label for="exampleInputPassword1">Description</label>
							<input type="text" name="editdescription"  value=" <?php echo $descfromlink; ?>" class="form-control form-control-sm" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
							<label for="exampleInputPassword1">Victim/s Name</label>
							<input type="text" name="editvictimname"  value=" <?php echo $victimnamefromlink; ?>" class="form-control form-control-sm" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
							<label for="exampleInputPassword1">Victim/s Address</label>
							<input type="text" name="editvictimadd"  value=" <?php echo $victimaddfromlink; ?>" class="form-control form-control-sm" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
							<label for="exampleInputPassword1">Sentence</label>
							<input type="text" name="editsentence"  value=" <?php echo $sentencefromlink; ?>" class="form-control form-control-sm" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
							<label for="exampleInputPassword1">Location of Crime</label>
							<input type="text" name="editlocation_crime"  value=" <?php echo $locationfromlink; ?>" class="form-control form-control-sm" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
							<label for="exampleInputPassword1">Date of Crime</label>
							<input type="date" name="editdate"  value=" <?php echo $docfromlink; ?>" class="form-control form-control-sm" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
							<label for="exampleInputPassword1">Station ID</label>
							<input type="text" name="editstation_id"  value=" <?php echo $SIfromlink; ?>" class="form-control form-control-sm" id="exampleInputPassword1">
						</div>
						<button type="submit" name="editcase_detailsbutton" class="btn btn-primary btn-block">Submit</button>
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