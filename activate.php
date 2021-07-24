<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criminal Database</title>
    <link rel="stylesheet" href="Css/style.css">
    <link rel="icon" href="images/Fingerprint.jpg" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
</head>

<body style="background-color: #181818">

<div style="margin-top: 140px;margin-bottom: 100px;" class="global-container">
    <div class="card login-form">
      <div class="card-body">
        <h3 class="card-title text-center">Change your Password</h3>
        <div class="card-text">

          <!--
			<div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
          <form method="post" action="">
            
            <?php include('errors.php'); ?>
            <!-- to error: add class "has-danger" -->
            
            <div class="form-group">
              <label for="exampleInputPassword1">Password<span style="color: red;"> *</span></label>
              <!-- <a href="#" style="float:right;font-size:12px;">Forgot password?</a> -->
              <input type="password" name="password_ofuser_recover" class="form-control form-control-sm" id="exampleInputPassword1">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Confirm Password<span style="color: red;"> *</span></label>
              <!-- <a href="C:\xampp\htdocs\DBMS Mini project\login.php" style="float:right;font-size:12px;">Already have an account?</a> -->
              <input type="password" name="Confirmed_password_ofuser_recover" class="form-control form-control-sm" id="exampleInputPassword1">
            </div>
            <button type="submit" name="password_recover_button" class="btn btn-primary btn-block">Submit</button>

            <!-- <div class="sign-up">
					Don't have an account? <a href="#">Create One</a>
				</div> -->
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
                <a href="https://en.wikipedia.org/wiki/Category:Crimes"
                  >Assault and battery</a
                >
              </li>
              <li>
                <a href="https://en.wikipedia.org/wiki/Category:Crimes"
                  >Arson</a
                >
              </li>
              <li>
                <a href="https://en.wikipedia.org/wiki/Category:Crimes"
                  >Child Abuse</a
                >
              </li>
              <li>
                <a href="https://en.wikipedia.org/wiki/Category:Crimes"
                  >Domestic Abuse</a
                >
              </li>
              <li>
                <a href="https://en.wikipedia.org/wiki/Category:Crimes"
                  >Kidnapping</a
                >
              </li>
              <li>
                <a href="https://en.wikipedia.org/wiki/Category:Crimes"
                  >Rape and Statutory Rape</a
                >
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