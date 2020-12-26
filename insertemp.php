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
if(isset($_REQUEST['empupdate'])){
    if(($_REQUEST['empcity']=="") ||($_REQUEST['empemail']=="") ||($_REQUEST['empmobile']=="")||($_REQUEST['empname']=="") ){
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill all Feilds</div>';
    }else{
        $rid=$_REQUEST['empcity'];
        $rname=$_REQUEST['empname'];
        $remail=$_REQUEST['empemail'];
        $rmobile=$_REQUEST['empmobile'];

        $sql="INSERT INTO technician_tb(empcity,empname,empemail,empmobile) VALUES(' $rid',' $rname',' $remail','$rmobile')";
       
        if($conn->query($sql)==TRUE){
            $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2">Added Successfully</div>';

        }else{
            $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to Add</div>';
        }
    }
}

?>
<div class="col-sm-6 mt-5 mx-3 jumbotron"><h3 class="text-center">Add New Technician</h3>
<form action="" method="POST"><div class="form-group">
<div class="form-group">
    <label for="empname">Name</label>
    <input type="text" class="form-control" name="empname" id="empname">
</div>
<div class="form-group">
    <label for="empcity">City</label>
    <input type="text" class="form-control" name="empcity" id="empcity">
</div>
<div class="form-group">
    <label for="empmobile">Mobile</label>
    <input type="text" class="form-control" name="empmobile" id="empmobile" onkeypress="isInputNumber(event)">
</div>
<div class="form-group">
    <label for="empemail">Email</label>
    <input type="email" class="form-control" name="empemail" id="empemail" ></div>
    
    <div class="text-center"><button type="submit" class="btn btn-danger" id="empupdate" name="empupdate">Submit</button>
<a href="technician.php" class="btn btn-secondary">Close</a>
</div>

<?php if(isset($msg)){echo $msg;}?></form>
</div>
<!..only number>
<script>
    function isInputNumber(evt){
        var ch = String.fromCharCode(evt.which);
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }

    }</script>
<?php include('includes/footer.php'); ?>