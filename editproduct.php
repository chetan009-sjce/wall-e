<?php 
define('TITLE','Edit Product');
define('PAGE','editproduct');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $aEmail=$_SESSION['aEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}?>
<div class="col-sm-6 mt-5 mx-3 jumbotron"><h3 class="text-center">Update Product Details</h3>
<?php  $_REQUEST['id'];?>
<?php 
if(isset($_REQUEST['edit'])){$sql="SELECT * FROM assets_tb WHERE pid={$_REQUEST['id']}";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

}
if(isset($_REQUEST['psubmit'])){
    if(($_REQUEST['pname']=="") ||($_REQUEST['pava']=="") ||($_REQUEST['psc']=="") ||($_REQUEST['ptotal']=="")||($_REQUEST['poc']=="") ){
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill all Feilds</div>';
    }else{
        $rid=$_REQUEST['pid'];
        $rname=$_REQUEST['pname'];
        $rava=$_REQUEST['pava'];
        $rtotal=$_REQUEST['ptotal'];
        $roc=$_REQUEST['poc'];
        $rsc=$_REQUEST['psc'];

        $sql="UPDATE assets_tb SET pid='$rid',pname='$rname',pava='$rava',ptotal='$rtotal',poc='$roc',psc='$rsc' WHERE pid='$rid'";
       
        if($conn->query($sql)==TRUE){
            $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2">Added Successfully</div>';

        }else{
            $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to Add</div>';
        }
    }
}
?>

<form action="" method="POST"><div class="form-group">
<div class="form-group">
    <label for="pid">Product ID</label>
    <input type="text" class="form-control" name="pid" id="pid"
    value="<?php if(isset($row['pid'])){echo $row['pid'];}?>"readonly>
</div>
<div class="form-group">
    <label for="pname">Product Name</label>
    <input type="text" class="form-control" name="pname" id="pname" value="<?php if(isset($row['pname'])){echo $row['pname'];}?>">
</div>
<div class="form-group">
    <label for="pdop">Date Of Purchase</label>
    <input type="date" class="form-control" name="pdop" id="pdop" value="<?php if(isset($row['pdop'])){echo $row['pdop'];}?>">
</div>
<div class="form-group">
    <label for="pava">Available</label>
    <input type="text" class="form-control" name="pava" id="pava" onkeypress="isInputNumber(event)" value="<?php if(isset($row['pava'])){echo $row['pava'];}?>">
</div>
<div class="form-group">
    <label for="ptotal">Total</label>
    <input type="text" class="form-control" name="ptotal" id="ptotal"  onkeypress="isInputNumber(event)" value="<?php if(isset($row['ptotal'])){echo $row['ptotal'];}?>"></div>
    <div class="form-group">
    <label for="poc">Original Cost</label>
    <input type="text" class="form-control" name="poc" id="poc" onkeypress="isInputNumber(event)" value="<?php if(isset($row['poc'])){echo $row['poc'];}?>">
</div><div class="form-group">
    <label for="psc">Selling Cost</label>
    <input type="text" class="form-control" name="psc" id="psc" onkeypress="isInputNumber(event)" value="<?php if(isset($row['psc'])){echo $row['psc'];}?>">
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