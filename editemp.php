<?php 
define('TITLE','Update Technician');
define('PAGE','technician');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $aEmail=$_SESSION['aEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}

?>
<div class="col-sm-6 mt-5 mx-3 jumbotron"><h3 class="text-center">Update Technician Details</h3>
<?php  $_REQUEST['id'];?>
<?php 
if(isset($_REQUEST['edit'])){$sql="SELECT * FROM technician_tb WHERE empid={$_REQUEST['id']}";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

}
if(isset($_REQUEST['empupdate'])){
    if(($_REQUEST['empname']=="") ||($_REQUEST['empemail']=="")||($_REQUEST['empcity']=="")||($_REQUEST['empmobile']=="") ){
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill all Feilds</div>';
    }else{
        $rid=$_REQUEST['empid'];
        $rname=$_REQUEST['empname'];
        $ecity=$_REQUEST['empcity'];
        $rmobile=$_REQUEST['empmobile'];
        $remail=$_REQUEST['empemail'];
        $sql="UPDATE technician_tb SET empid='$rid',empname='$rname',empcity='$ecity',empmobile='$rmobile',empemail='$remail' WHERE empid='$rid'";
        if($conn->query($sql)==TRUE){
            $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully</div>';

        }else{
            $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to update</div>';
        }
    }
}
?>
<form action="" method="POST"><div class="form-group">
    <label for="empid">Emp ID</label>
    <input type="text" class="form-control" name="empid" id="empid" value="<?php if(isset($row['empid'])){echo $row['empid'];}?>"readonly>
</div>
<div class="form-group">
    <label for="empname">Name</label>
    <input type="text" class="form-control" name="empname" id="empname" value="<?php if(isset($row['empname'])){echo $row['empname'];}?>">
</div>
<div class="form-group">
    <label for="empcity">City</label>
    <input type="text" class="form-control" name="empcity" id="empcity" value="<?php if(isset($row['empcity'])){echo $row['empcity'];}?>">
</div>
<div class="form-group">
    <label for="empmobile">Mobile</label>
    <input type="text" class="form-control" name="empmobile" id="empmobile" value="<?php if(isset($row['empmobile'])){echo $row['empmobile'];}?>" onkeypress="isInputNumber(event)">
</div>
<div class="form-group">
    <label for="empemail">Email</label>
    <input type="email" class="form-control" name="empemail" id="empemail" value="<?php if(isset($row['empemail'])){echo $row['empemail'];}?>">
</div>
<div class="text-center"><button type="submit" class="btn btn-danger" id="empupdate" name="empupdate">Update</button>
<a href="technician.php" class="btn btn-secondary">Close</a>
</div>




<?php if(isset($msg)){echo $msg;}?>

</form>


</div><!..only number>
<script>
    function isInputNumber(evt){
        var ch = String.fromCharCode(evt.which);
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }

    }</script>

<?php include('includes/footer.php'); ?>