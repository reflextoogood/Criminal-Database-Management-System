<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Criminal Database</title>
  <link rel="stylesheet" href="Css/style.css" />
  <link rel="icon" href="images/Fingerprint.jpg" >
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif&display=swap" rel="stylesheet" />
</head>

<body style="background-color: #181818">
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
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">

              <a class="nav-link" href="http://localhost/DBMS%20Mini%20project/database.php">Database</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Most Wanted
              </a>
              <div id="nav_drop" class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #181818">
                <a class="dropdown-item" href="https://www.fbi.gov/wanted/">Wanted by the FBI</a>
                <a class="dropdown-item" href="https://www.interpol.int/How-we-work/Notices/View-Red-Notices">Wanted by Interpol</a>

                <a class="dropdown-item" href="https://www.usmarshals.gov/investigations/most_wanted/index.html">Wanted by U.S Marshals</a>
              </div>
            </li>
            <!-- <li class="nav-item">
            <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li> -->
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

  <div id="for_slide">
    <div id="slides">
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="6000">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="5"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="6"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="7"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="8"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="9"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="10"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="11"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="12"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="13"></li>
        </ol>

        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/criminal-justice-reform.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block"></div>
          </div>
          <div class="carousel-item">
            <img src="images/image1.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block"></div>
          </div>
          <div class="carousel-item">
            <img src="images/image2.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block"></div>
          </div>
          <div class="carousel-item">
            <img src="images/image3.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block"></div>
          </div>
          <div class="carousel-item">
            <img src="images/image4.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block"></div>
          </div>
          <div class="carousel-item">
            <img src="images/image5.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block"></div>
          </div>
          <div class="carousel-item">
            <img src="images/image6.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block"></div>
          </div>
          <div class="carousel-item">
            <img src="images/image7.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block"></div>
          </div>
          <div class="carousel-item">
            <img src="images/image8.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block"></div>
          </div>
          <div class="carousel-item">
            <img src="images/image9.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block"></div>
          </div>
          <div class="carousel-item">
            <img src="images/image10.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block"></div>
          </div>
          <div class="carousel-item">
            <img src="images/image11.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block"></div>
          </div>
          <div class="carousel-item">
            <img src="images/image12.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block"></div>
          </div>

          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>

    <div style="font-family: 'IBM Plex Serif', serif" class="para1">
      <li>
        <b>What is a Criminal Database?</b>
        <br />
        <hr />
        Crime Scene Database is an online database where we constantly are
        collecting and publishing crime related facts and information from all
        over the internet (currently 284 articles and counting). Here is were
        you can learn everything about the darkest sides of humanity.
      </li>
      <br /><br />
      <li>
        <b>Warning!!</b>
        <br />
        <hr />
        This website was created to be used for educational purposes, not as a
        source of inspiration, so if you have any dark thoughts or feelings of
        any kind we kindly ask you to immediately contact your nearest
        psychologist or psychiatrist to get the help you need.
      </li>
    </div>
  </div>
  <div>
    <br />
    <center>
      <h1 style="color: white; font-family: 'IBM Plex Serif', serif">
        Law Enforcements in India
      </h1>
      <br />
    </center>
    <br />
  </div>

  <div style="font-family: 'IBM Plex Serif', serif" class="card-deck">
    <div style="background-color: #181818" class="card">
      <img style="background-color: white" class="card-img-top" src="images/NCB.png" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">Narcotics Control Bureau</h5>
        <p class="card-text">This is a longer card with</p>
        <p class="card-text">
          <small class="text-muted"></small>
        </p>
      </div>
    </div>
    <div style="background-color: #181818" class="card">
      <img style="background-color: white" class="card-img-top" src="images/ED.png" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">Enforcement Directorate</h5>
        <p class="card-text">This card has</p>
        <p class="card-text">
          <small class="text-muted"></small>
        </p>
      </div>
    </div>
    <div style="background-color: #181818" class="card">
      <img style="background-color: white" class="card-img-top" src="images/CBI.png" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">Central Bureau of Investigation</h5>
        <p class="card-text">This is a wider card with</p>
        <p class="card-text">
          <small class="text-muted"></small>
        </p>
      </div>
    </div>
  </div>
  <div style="font-family: 'IBM Plex Serif', serif" class="card-deck">
    <div style="background-color: #181818" class="card">
      <img style="background-color: white" class="card-img-top" src="images/RAW.png" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">Research and Analysis Wing</h5>
        <p class="card-text">This is a longer card with</p>
        <p class="card-text">
          <small class="text-muted"></small>
        </p>
      </div>
    </div>
    <div style="background-color: #181818" class="card">
      <img style="background-color: white" class="card-img-top" src="images/ib.png" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">Intelligence Bureau</h5>
        <p class="card-text">This card has</p>
        <p class="card-text">
          <small class="text-muted"></small>
        </p>
      </div>
    </div>
    <div style="background-color: #181818" class="card">
      <img style="background-color: white" class="card-img-top" src="images/NIA.png" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">National Investigation Agency</h5>
        <p class="card-text">This is a wider card with</p>
        <p class="card-text">
          <small class="text-muted"></small>
        </p>
      </div>
    </div>
  </div>

  <!-- Site footer -->
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