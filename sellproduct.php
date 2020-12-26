<?php 
define('TITLE','Sell Product');
define('PAGE','sellproduct');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $aEmail=$_SESSION['aEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}?>

<div class="col-sm-6 mt-5 mx-3 jumbotron"><h3 class="text-center">Customer Bill Details</h3>
<?php  $_REQUEST['id'];?>
<?php 
if(isset($_REQUEST['issue'])){$sql="SELECT * FROM assets_tb WHERE pid={$_REQUEST['id']}";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

}
if(isset($_REQUEST['psubmit'])){
    if(($_REQUEST['pname']=="") ||($_REQUEST['cadd']=="") ||($_REQUEST['cname']=="") ||($_REQUEST['psc']=="") ||($_REQUEST['totalcost']=="") ||($_REQUEST['pquantity']=="")||($_REQUEST['inputdate']=="") ){
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill all Feilds</div>';
    }else{
        $rid=$_REQUEST['pid'];
        $pava=$_REQUEST['pava']-$_REQUEST['pquantity'];
        $cname=$_REQUEST['cname'];
        $cpname=$_REQUEST['pname'];
        $cadd=$_REQUEST['cadd'];
        $cptotal=$_REQUEST['totalcost'];
        $cpquantity=$_REQUEST['pquantity'];
        $cpeach=$_REQUEST['psc'];
        $cpdate=$_REQUEST['inputdate'];

        $sql="INSERT INTO customer_tb(cusname,custadd,cpname,cpquan,cpeach,cptotal,cpdate) VALUE('$cname','$cadd','$cpname','$cpquantity','$cpeach','$cptotal','$cpdate')";
       
        if($conn->query($sql)==TRUE){
            $genid=mysqli_insert_id($conn);
            session_start();
            $_SESSION['myid']=$genid;
            echo "<script> location.href='productsellsuccess.php'</script>";
        }
        $sqlup="UPDATE assets_tb SET pava='$pava' WHERE pid='$rid'";
        $conn->query($sqlup);
           /* $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2">Added Successfully</div>';

        }else{
            $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to Add</div>';
        }*/
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
    <label for="cname">Customer Name</label>
    <input type="text" class="form-control" name="cname" id="cname" >
</div>
<div class="form-group">
    <label for="cadd">Customer Address</label>
    <input type="text" class="form-control" name="cadd" id="cadd" >
</div>

<div class="form-group">
    <label for="pname">Product Name</label>
    <input type="text" class="form-control" name="pname" id="pname" value="<?php if(isset($row['pname'])){echo $row['pname'];}?>">
</div>
<div class="form-group">
    <label for="pava">Available</label>
    <input type="text" class="form-control" name="pava" id="pava" onkeypress="isInputNumber(event)" value="<?php if(isset($row['pava'])){echo $row['pava'];}?>">
</div>
<div class="form-group">
    <label for="pquantity">Quantity</label>
    <input type="text" class="form-control" name="pquantity" id="pquantity" >
</div>

   <div class="form-group">
    <label for="psc">Price Each</label>
    <input type="text" class="form-control" name="psc" id="psc" onkeypress="isInputNumber(event)" value="<?php if(isset($row['psc'])){echo $row['psc'];}?>">
</div>
<div class="form-group">
    <label for="totalcost">Total Price</label>
    <input type="text" class="form-control" name="totalcost" id="totalcost">
</div><div class="form-group">
    <label for="inputdate">Date</label>
    <input type="date" class="form-control" name="inputdate" id="inputdate" >
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