<?php


session_start();
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "criminal_database";
//connecting to database
$connection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$connection) {
    die("Database connection failed");
}

$email = "";
$password = "";
$confirm_password = "";
$errors = array();

//from register page
if (isset($_POST['register_button'])) {
    $email = $_POST['email_ofuser'];
    $password = $_POST['password_ofuser'];
    $confirm_password = $_POST['Confirmed_password_ofuser'];
    $policemail = $_POST['email_ofpoliceofficer'];
    $policepassword = $_POST['password_ofpoliceofficer'];

    if (empty($policemail)) {
        array_push($errors, "Police Officer Email is Required");
    }
    if (empty($policepassword)) {
        array_push($errors, "Police officer password is Required");
    }
    if (empty($email)) {
        array_push($errors, "Email is Required");
    }
    if (empty($password)) {
        array_push($errors, "Password is Required");
    }
    if ($password != $confirm_password) {
        array_push($errors, "Passwords don't match");
    }
    $sqlqq="SELECT * FROM account WHERE Email='$policemail' AND Password='$policepassword'";
    $result1 = mysqli_query($connection, $sqlqq);
    if (mysqli_num_rows($result1)==0) {
        array_push($errors, "Account of Police Officer Doesn't Exist");
    }

    $sqlq="SELECT * FROM account WHERE Email='$email'";
    $result = mysqli_query($connection, $sqlq);
    
    if (mysqli_num_rows($result)==1) {
        array_push($errors, "Account already exists");
    }
    
    if (count($errors) == 0) {
        $sql = "INSERT INTO account (Email,Password) VALUES ('$email','$password')";
        mysqli_query($connection, $sql);
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "You are now logged in";
        header("location:database.php");
    }
}

//log user in from login page
if (isset($_POST['login_button'])) {
    $email = $_POST['email_ofuser'];
    $password = $_POST['password_ofuser'];


    if (empty($email)) {
        array_push($errors, "Email is Required");
    }
    if (empty($password)) {
        array_push($errors, "Password is Required");
    }

    if (count($errors) == 0) {
        $query = "SELECT * FROM account WHERE Email='$email' AND Password='$password'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are now logged in";
            header("location:database.php");
        } else {
            array_push($errors, "Incorrect Email or Password");
        }
    }
}
//recover password code
if (isset($_POST['send-mail-button'])) {
    $email = $_POST['email_ofuser-recovery'];

    if (empty($email)) {
        array_push($errors, "Email is Required");
    }
    if (count($errors) == 0) {
        $emailquery = "SELECT * FROM account WHERE Email='$email'";
        $result = mysqli_query($connection, $emailquery);
        if (mysqli_num_rows($result) == 1) {
            $subject = "Password Reset";
            $body = "Here is your password recovery link.Click here to reset your password http://localhost/DBMS%20Mini%20project/activate.php?email=$email";
            $sender_email = "From: miniproject5thsemcmrit@gmail.com";
            if (mail($email, $subject, $body, $sender_email)) {
                $_SESSION['msg'] = "Mail has been sent to $email";
                $_SESSION['email'] = $email;
                header("location:login.php");
                echo "mail sent";
            } else {
                echo "Email Sending has Failed";
            }
        } else {
            array_push($errors, "Email doesn't exist");
        }
    }
}
//after mail has been sent then to recover passowrd
if (isset($_POST['password_recover_button'])) {
    if (isset($_GET['email'])) {
        $mailfromlink = $_GET['email'];
        $password1 = $_POST['password_ofuser_recover'];
        $password2 = $_POST['Confirmed_password_ofuser_recover'];


        if (empty($password1) || empty($password2)) {
            array_push($errors, "Passwords are to be filled");
        }
        if ($password1 !== $password2) {
            array_push($errors, "Passwords don't match");
        }

        if (count($errors) == 0) {
            $from_mailquery = "UPDATE account set Password='$password1' WHERE Email='$mailfromlink'";
            $result = mysqli_query($connection, $from_mailquery);
            if ($result) {
                $_SESSION['email'] = $mailfromelink;
                $_SESSION['success'] = "Password has been changed succesfully";
                header("location:login.php");
            } 
        }
     }
     //else{
    //     echo "not working";
    // }
}
//change password inside the database
if (isset($_POST['Change_password_button'])) {
    
        $oldpassword= $_POST['Old_password'];
        $newpassword = $_POST['Change_new_password'];
        $confirmednewpassword = $_POST['Confirmed_change_new_password'];


        if (empty($oldpassword) || empty($newpassword) || empty($confirmednewpassword)) {
            array_push($errors, "Passwords are to be filled");
        }
        if ($newpassword !== $confirmednewpassword) {
            array_push($errors, "New Passwords don't match");
        }
        $mail=$_SESSION['email'];
        $getpassword="SELECT Password FROM account WHERE Email='$mail'";
        $finalpassword = mysqli_query($connection, $getpassword);
        $rows = mysqli_fetch_assoc($finalpassword);
        if($rows['Password'] !== $oldpassword){
            array_push($errors, "Your old password is wrong");
        }

        if (count($errors) == 0) {
            $mail=$_SESSION['email'];
            $changepassquery = "UPDATE account set Password='$newpassword' WHERE Email='$mail'";
            $result = mysqli_query($connection, $changepassquery);
            if ($result) {
                $_SESSION['email'] = $mail;
                $_SESSION['success'] = "Password has been changed succesfully";
                header("location:database.php");
            } 
        }
     }
     //else{
    //     echo "not working";
    // }

//here is the code for adding police officer details
if (isset($_POST['police_details_add_button'])) {
    $officerid= $_POST['officer_id'];
    $officername = $_POST['officer_name'];
    $officerbatchno= $_POST['officer_batch_number'];
    $officerstationID= $_POST['officer_StationID'];
    $OfficerPhoneno= $_POST['Officer_Phone_no'];
    $OfficerRank = $_POST['Officer_Rank'];


    if (empty($officerid)|| empty($officername)|| empty($officerbatchno)|| empty($officerstationID)|| empty($OfficerPhoneno)|| empty($OfficerRank) ) {
        array_push($errors, "All Details are Required");
    }
   
    $checkquery="SELECT `Officer ID`, `Name`, `Batch Number`, `Station ID`, `Phone Number`, `Rank` FROM `police officer's` WHERE `Officer ID`='$officerid'";
    $result109 = mysqli_query($connection, $checkquery);
    if(mysqli_num_rows($result109)==1){
        array_push($errors, "Values already Exists");
    }

    if (count($errors) == 0) {
        $querytoaddpolice = "INSERT INTO `police officer's`(`Officer ID`, `Name`, `Batch Number`, `Station ID`, `Phone Number`, `Rank`) VALUES ('$officerid','$officername','$officerbatchno','$officerstationID','$OfficerPhoneno','$OfficerRank')";
        $result101 = mysqli_query($connection, $querytoaddpolice);
        if ($result101) {
            header("location:police_officers.php");
        }
            
        
    }
}


//here is the code for adding police station details
if (isset($_POST['station_add_button'])) {
    $stationid= $_POST['station_id'];
    $stationname = $_POST['station_name'];
    $stationlocation= $_POST['station_location'];
    


    if (empty($stationid)|| empty($stationname)|| empty($stationlocation))  {
        array_push($errors, "All Details are Required");
    }
   
    $checkquery="SELECT * FROM `police station's` WHERE Station_Id ='$stationid'";
    $result201 = mysqli_query($connection, $checkquery);
    if(mysqli_num_rows($result201)==1){
        array_push($errors, "Values already Exists");
    }

    if (count($errors) == 0) {
        $querytoaddpolicestation = "INSERT INTO `police station's`(`Station_Id`, `Name`, `Location`) VALUES ('$stationid','$stationname','$stationlocation')";
        $result202 = mysqli_query($connection, $querytoaddpolicestation);
        if ($result202) {
            header("location:stations.php");
        }
            
        
    }
}


//here is the code for adding criminal details
if (isset($_POST['criminal_details_add_button'])) {
    $criminalid= $_POST['criminal_id'];
    $criminalname = $_POST['criminal_name'];
    $crimeid= $_POST['crime_id'];
    $age= $_POST['age'];
    $height = $_POST['height'];
    $weight= $_POST['weight'];
    $crimedesc= $_POST['Crimes_Description'];
    $address = $_POST['Address'];
    $status= $_POST['Status'];
    


    if (empty($criminalid)|| empty($criminalname)|| empty($crimeid)|| empty($age)|| empty($height)|| empty($weight)|| empty($crimedesc)|| empty($address)|| empty($status))  {
        array_push($errors, "All Details are Required");
    }
   
    $checkquery="SELECT * FROM `criminal's` WHERE `Criminal ID` ='$criminalid'";
    $result301 = mysqli_query($connection, $checkquery);
    if(mysqli_num_rows($result301)==1){
        array_push($errors, "Values already Exists");
    }

    if (count($errors) == 0) {
        $querytoaddcriminal = "INSERT INTO `criminal's`(`Criminal ID`, `Name`, `Crime ID`,`Age`, `Height`, `Weight`,`Crimes Description`, `Address`, `Status`) VALUES ('$criminalid','$criminalname','$crimeid','$age','$height','$weight','$crimedesc','$address','$status')";
        $result302 = mysqli_query($connection, $querytoaddcriminal);
        if ($result302) {
            header("location:criminals.php");
        }
            
        
    }
}

//here is the code for adding crime details
if (isset($_POST['crime_details_add_button'])) {
    $crimeid= $_POST['crime_id'];
    $crimecat = $_POST['crime_category'];
    $section= $_POST['Section'];
    
    if (empty($crimeid)|| empty($crimecat)|| empty($section))  {
        array_push($errors, "All Details are Required");
    }
   
    $checkquery="SELECT * FROM `crime's` WHERE `Crime ID` ='$crimeid'";
    $result401 = mysqli_query($connection, $checkquery);
    if(mysqli_num_rows($result401)==1){
        array_push($errors, "Values already Exists");
    }

    if (count($errors) == 0) {
        $querytoaddcrime = "INSERT INTO `crime's`(`Crime ID`, `Crime Category`, `Section`) VALUES ('$crimeid','$crimecat','$section')";
        $result402 = mysqli_query($connection, $querytoaddcrime);
        if ($result402) {
            header("location:crimes.php");
        }
            
        
    }
}

//here is the code for adding case details
if (isset($_POST['case_detailsbutton'])) {
    $caseid= $_POST['case_id'];
    $criminalid = $_POST['criminal_id'];
    $crimeid= $_POST['crime_id'];
    $description= $_POST['description'];
    $victimname = $_POST['victimname'];
    $victimadd= $_POST['victimadd'];
    $sentence= $_POST['sentence'];
    $loc = $_POST['location_crime'];
    $date= $_POST['date'];
    $stationid= $_POST['station_id'];
    


    if (empty($caseid)|| empty($criminalid)|| empty($crimeid)|| empty($description)|| empty($victimname)|| empty($victimadd)|| empty($sentence)|| empty($loc)|| empty($date)|| empty($stationid))  {
        array_push($errors, "All Details are Required");
    }
   
    $checkquery="SELECT * FROM `case's` WHERE `Case ID` ='$caseid'";
    $result501 = mysqli_query($connection, $checkquery);
    if(mysqli_num_rows($result501)==1){
        array_push($errors, "Values already Exists");
    }

    if (count($errors) == 0) {
        $querytoaddcase = "INSERT INTO `case's`(`Case ID`, `Criminal ID`, `Crime ID`,`Description`, `Victim/s Name`, `Victim/s Address`,`Sentence`, `Location of Crime`, `Date of Crime`,`Station ID`) VALUES ('$caseid','$criminalid','$crimeid','$description','$victimname','$victimadd','$sentence','$loc','$date','$stationid')";
        $result502 = mysqli_query($connection, $querytoaddcase);
        if ($result502) {
            header("location:cases.php");
        }
            
        
    }
}






//logout
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header('location:login.php');
}
