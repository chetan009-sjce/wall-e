<?php 
define('TITLE','Add Product');
define('PAGE','addproduct');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $aEmail=$_SESSION['aEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}
if(isset($_REQUEST['psubmit'])){
    if(($_REQUEST['pname']=="") ||($_REQUEST['pava']=="") ||($_REQUEST['psc']=="") ||($_REQUEST['ptotal']=="")||($_REQUEST['poc']=="") ){
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill all Feilds</div>';
    }else{
        $rname=$_REQUEST['pname'];
        $rava=$_REQUEST['pava'];
        $rtotal=$_REQUEST['ptotal'];
        $roc=$_REQUEST['poc'];
        $rsc=$_REQUEST['psc'];

        $sql="INSERT INTO assets_tb(pname,pava,ptotal,poc,psc) VALUES('$rname',' $rava',' $rtotal','$roc','$rsc')";
       
        if($conn->query($sql)==TRUE){
            $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2">Added Successfully</div>';

        }else{
            $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to Add</div>';
        }
    }
}
?>
<div class="col-sm-6 mt-5 mx-3 jumbotron"><h3 class="text-center">Add New Product</h3>
<form action="" method="POST"><div class="form-group">
<div class="form-group">
    <label for="pname">Product Name</label>
    <input type="text" class="form-control" name="pname" id="pname">
</div>
<div class="form-group">
    <label for="pdop">Date Of Purchase</label>
    <input type="date" class="form-control" name="pdop" id="pdop">
</div>
<div class="form-group">
    <label for="pava">Available</label>
    <input type="text" class="form-control" name="pava" id="pava" onkeypress="isInputNumber(event)">
</div>
<div class="form-group">
    <label for="ptotal">Total</label>
    <input type="text" class="form-control" name="ptotal" id="ptotal"  onkeypress="isInputNumber(event)"></div>
    <div class="form-group">
    <label for="poc">Original Cost</label>
    <input type="text" class="form-control" name="poc" id="poc" onkeypress="isInputNumber(event)">
</div><div class="form-group">
    <label for="psc">Selling Cost</label>
    <input type="text" class="form-control" name="psc" id="psc" onkeypress="isInputNumber(event)">
</div>
    <div class="text-center"><button type="submit" class="btn btn-danger" id="psubmit" name="psubmit">Submit</button>
<a href="asset.php" class="btn btn-secondary">Close</a>
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