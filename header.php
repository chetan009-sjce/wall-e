
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!...Boostsrap>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!...font awesome>
    <link rel="stylesheet" href="../css/all.min.css">

    <title><?php echo TITLE ?></title>
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
                <nav class="col-sm-2 bg-dark sidebar py-5 d-print-none"><!..sidebar 1st column>
                    <div class="sidebar-sticky"><ul class="nav flex-column">
                        <li class="nav-item"> <a class="nav-link <?php if(PAGE=='Requesterprofile'){echo 'active';} ?>" href="Requesterprofile.php"><i class="fas fa-user"></i> Profile</a></li>
                        <li class="nav-item"> <a class="nav-link  <?php if(PAGE=='SubmitRequest'){echo 'active';} ?>" href="submitrequest.php"><i class="fab fa-accessible-icon"></i> Submit Request</a></li>
                        <li class="nav-item"> <a class="nav-link  <?php if(PAGE=='CheckStatus'){echo 'active';} ?>" href="checkstatus.php"><i class="fas fa-align-center"></i> Service Status</a></li>
                        <li class="nav-item"> <a class="nav-link  <?php if(PAGE=='ChangePass'){echo 'active';} ?>" href="requestercp.php"><i class="fas fa-key"></i> Change Password</a></li>
                        <li class="nav-item"> <a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
</ul></div></nav><!..end side bar 1st column>


    