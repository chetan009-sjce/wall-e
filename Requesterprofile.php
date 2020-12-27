<?php
define ('TITLE','Requester Profile');
define ('PAGE','Requesterprofile');
include('../dbconnection.php');
session_start();
if($_SESSION['is_login']){
    $rEmail=$_SESSION['rEmail'];
}else{
    echo "<script>location.href='RequesterLogin.php'</script>";
}
$sql="SELECT r_email, r_name FROM requesterlogin_tb WHERE r_email='$rEmail'";
$result=$conn->query($sql);
if($result->num_rows==1){
    $row=$result->fetch_assoc();
    $rName=$row['r_name'];
}
if(isset($_REQUEST['nameupdate'])){

if($_REQUEST['rName'] == "")
{$k = '<div class="alert alert-danger mt-2 text-center" role="alert">Fill All Feilds!</div>';
} else{
   $rName=$_REQUEST['rName'];
   $sql="UPDATE requesterlogin_tb SET r_name='$rName' WHERE r_email='$rEmail'";
   if($conn->query($sql)==true){
       $k= '<div class="alert alert-info mt-2 text-center" role="alert">Updated Successfully</div>';
   }else{
    $k='<div class="alert alert-danger mt-2 text-center" role="alert">Unable To Update!</div>';
   }

}
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!...Boostsrap>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!...font awesome>
    <link rel="stylesheet" href="../css/all.min.css">

    <title>Profile</title>
    <style>
    .active{
        color:black;
        background-color: white;
    }
    </style>
</head>
<body>

<!..navigation start>
    <nav class="navbar navbar-expand-sm navbar-dark bg-danger flex-md-nowrap p-0 shadow"><a class="navbar-brand col-sm-3 col-md-2 mr-0" href="Requesterprofile.php">
        Wall-e</a> <span class="navbar-text">Your Joy Our Aim...</span>
</nav>
        <!..conataiiner>
        <div class="container-fluid" style="margin-top:40px;">
            <div class="row">
                <nav class="col-sm-2 bg-dark sidebar py-5"><!..sidebar 1st column>
                    <div class="sidebar-sticky"><ul class="nav flex-column">
                        <li class="nav-item"> <a class="nav-link active" href="Requesterprofile.php"><i class="fas fa-user"></i> Profile</a></li>
                        <li class="nav-item"> <a class="nav-link" href="submitrequest.php"><i class="fab fa-accessible-icon"></i> Submit Request</a></li>
                        <li class="nav-item"> <a class="nav-link" href="checkstatus.php"><i class="fas fa-align-center"></i> Service Status</a></li>
                        <li class="nav-item"> <a class="nav-link" href="requestercp.php"><i class="fas fa-key"></i> Change Password</a></li>
                        <li class="nav-item"> <a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
</ul></div></nav><!..end side bar 1st column>

<div class="col-sm-6 mt-5"><!..profile 2nd column>
    <form action="" mehod="POST" class="mx-5"><div class="form-group">
        <label for="inputEmail" class="font-weight-bold pl-2">Email</label><input type="email" class="form-control"
        name="rEmail" id="rEmail" value="<?php echo $rEmail ?>" readonly>
</div>
<div class="form-group"><label for="rName" class="font-weight-bold pl-2">Name</label><input type="text" class="form-control" name="rName" id="rName" value="<?php echo $rName ?>"></div>
 <button type="submit" class="btn btn-danger" name="nameupdate">Update</button>
<?php if(isset($k)) {echo $k;} ?>

</form></div>
</div>



 </div></div><!..conatiner>
        
        <!..js>
        <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>

    