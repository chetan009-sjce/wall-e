<?php
define ('TITLE','Change Password');
define ('PAGE','ChangePass');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if($_SESSION['is_login']){
    $rEmail=$_SESSION['rEmail'];
                         }else{  
    echo "<script>location.href='RequesterLogin.php'</script>";
}
$rEmail=$_SESSION['rEmail'];
if(isset($_REQUEST['passupdate'])){
    if($_REQUEST['rPassword']==""){
        $k='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Feilds</div>';
    }else{
    $rpass=$_REQUEST['rPassword'];
    $sql="UPDATE requesterlogin_tb SET r_password='$rpass' WHERE r_email='$rEmail'";
    if($conn->query($sql)==TRUE){
        $k='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
    }else{
        $k='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Unable To Update!</div>';
    }

    }}
   

?>

<div class="col-sm-9 col-md-10"><!...changepass>
<!..profile 2nd column>
    <form class="mx-5 mt-5"  action="" method="POST" class="mx-5"><div class="form-group">
    <div class="form-group">
        <label for="inputEmail" class="font-weight-bold pl-2">Email</label><input type="email" class="form-control"
        name="rEmail" id="inputEmail" value="<?php echo $rEmail; ?>" readonly>
</div>
<div class="form-group">
                    <i class="fas fa-key"></i>
                    <label for="inputnewpass" class="font-weight-bold pl-2">New Password</label>
                    <input type="password" class="form-control" placeholder="Enter New Password" name="rPassword"> 
                </div>
                <button type="submit" class="btn btn-danger mr-4 mt-4" name="passupdate">Update</button>
<button type="reset" class="btn btn-secondary mt-4" >Reset</button>
<?php if(isset($k)) {echo $k;} ?></form>





</div>


<?php
include('includes/footer.php');
?>