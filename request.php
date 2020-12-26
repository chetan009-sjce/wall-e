<?php 
define('TITLE','Request');
define('PAGE','request');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $aEmail=$_SESSION['aEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}

?>
<div class="col-sm-4">
    <?php
    $sql="SELECT request_id,request_info,reques_desc,requester_date FROM submitrequest_tb";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            echo '<div class="card mt-5 mx-5">';
            echo '<div class="card-header">';
            echo 'Request ID:'.$row['request_id'];
            echo '</div>';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">Request Info:'. $row['request_info'];
            echo '</h5>';
            echo '<p class="card-text">Description: '.$row['reques_desc'];
            echo '</p>';
            echo '<p class="card-text">Request Date: '.$row['requester_date'];
            echo '</p>';
            echo '<div class="float-right">';

            echo '<form action="" method="POST">';
            echo '<input type="hidden" name="id" value='.$row["request_id"].'>';
            echo '<input type="submit" class="btn btn-danger mr-3" value="View" name="view">';
           
            echo '<input type="submit" class="btn btn-secondary" value="Close" name="close">';

            echo '</form>';
           

            echo '</div>';
            echo '</div>';

            echo '</div>';}}?>
</div>
        
        <?php 
if(isset($_REQUEST['view'])){
$sql="SELECT * FROM submitrequest_tb WHERE request_id={$_REQUEST['id']}";
$result=$conn->query($sql);
$row=$result->fetch_assoc();}
if(isset($_REQUEST['close'])){
    $sql="DELETE FROM submitrequest_tb WHERE request_id={$_REQUEST['id']}";
    if($conn->query($sql)==TRUE){
        echo '<meta http-equiv="refresh" content= "0;URL=?closed"/>';
    }else{
        echo "unable to delete";
    }
}
if(isset($_REQUEST['assign'])){
    if(($_REQUEST['request_id']=="") || ($_REQUEST['request_info']=="") ||($_REQUEST['reques_desc']=="")||
    ($_REQUEST['requester_name']=="")||($_REQUEST['requester_add1']=="")||($_REQUEST['requester_add2']=="")||
    ($_REQUEST['requester_city']=="") ||($_REQUEST['requester_state']=="")||
    ($_REQUEST['requester_zip']=="")||($_REQUEST['requester_email']=="")||($_REQUEST['requester_mobile']=="")||($_REQUEST['assign_tech']=="")||($_REQUEST['assign_date']=="")){
        $msg='<div class="alert alert-danger col-sm-6 ml-5 mt-2">Fill all Feilds</div>';
    }else{
        $rid=$_REQUEST['request_id'];
        $rinfo=$_REQUEST['request_info'];
        $rdesc=$_REQUEST['reques_desc'];
        $rname=$_REQUEST['requester_name'];
        $radd1=$_REQUEST['requester_add1'];
        $radd2=$_REQUEST['requester_add2'];
        $rcity=$_REQUEST['requester_city'];
        $rstate=$_REQUEST['requester_state'];
        $rzip= $_REQUEST['requester_zip'];
        $remail=$_REQUEST['requester_email'];
        $rmobile=$_REQUEST['requester_mobile'];
        $rassigntech=$_REQUEST['assign_tech'];
        $rdate=$_REQUEST['assign_date'];
        $sql="INSERT INTO assignwork_tb(request_id,request_info,reques_desc,requester_name,requester_add1,requester_add2,requester_city,requester_state,requester_zip
        ,requester_email,requester_mobile,assign_tech,assign_date) VALUES('$rid','$rinfo','$rdesc','$rname','$radd1','$radd2','$rcity','$rstate','$rzip','$remail','$rmobile','$rassigntech','$rdate')";
        if($conn->query($sql)==TRUE){
            $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2">Work Assigned Succesfully</div>';
        
        }else{
            $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Work Assigned Failed</div>';

        }

    }
}
?>


    





<div class="col-sm-5  mt-5 jumbotron"><!...servive request form>

<form  action="" method="POST">
    <h5 class="text-center">Assign Work Order Request</h5> 
    <div class="form-group">
        <label for="request_id"class="font-weight-bold pl-2">Request ID</label>
        <input type="text" class="form-control" id="request_id" name="request_id" value="<?php if(isset($row['request_id'])){echo $row['request_id']; }?>" readonly>
    </div>
    <div class="form-group">
        <label for="request_info"class="font-weight-bold pl-2">Request Info</label>
        <input type="text" class="form-control" id="request_info" name="request_info" value="<?php if(isset($row['request_info'])){echo $row['request_info']; }?>"   >
    </div>
    <div class="form-group">
        <label for="reques_desc"class="font-weight-bold pl-2">Description</label>
        <input type="text" class="form-control" id="reques_desc>" value="<?php if(isset($row['reques_desc'])){echo $row['reques_desc']; }?>"  name="reques_desc">
    </div>
    <div class="form-group">
        <label for="requester_name"class="font-weight-bold pl-2">Name</label>
        <input type="text" class="form-control" id="requester_name" value="<?php if(isset($row['requester_name'])){echo $row['requester_name']; }?>"  name="requester_name">
    </div>

      <div class="form-row">
    <div class="form-group col-md-6">
        <label for="requester_add1"class="font-weight-bold pl-2">Address Line 1</label>
        <input type="text" class="form-control" id="requester_add1" value="<?php if(isset($row['requester_add1'])){echo $row['requester_add1']; }?>"  name="requester_add1">
    </div>

    <div class="form-group col-md-6">
        <label for="requester_add2"class="font-weight-bold pl-2">Address Line 2</label>
        <input type="text" class="form-control" id="requester_add2" value="<?php if(isset($row['requester_add2'])){echo $row['requester_add2']; }?>" name="requester_add2">
    </div>
      </div>

      <div class="form-row">
    <div class="form-group col-md-4">
        <label for="requester_city"class="font-weight-bold pl-2">City</label>
        <input type="text" class="form-control" id="requester_city"value="<?php if(isset($row['requester_city'])){echo $row['requester_city']; }?>"   name="requester_city">
    </div>

    <div class="form-group col-md-4">
        <label for="requester_state"class="font-weight-bold pl-2">State</label>
        <input type="text" class="form-control" id="requester_state"value="<?php if(isset($row['requester_state'])){echo $row['requester_state']; }?>"   name="requester_state">
    </div>

    <div class="form-group col-md-2">
        <label for="requester_zip"class="font-weight-bold pl-2">PinCode</label>
        <input type="text" class="form-control" id="requester_zip"  name="requester_zip" value="<?php if(isset($row['requester_zip'])){echo $row['requester_zip']; }?>"onkeypress="isInputNumber(event)">
    </div>


      </div>

      <div class="form-row">
    <div class="form-group col-md-8">
        <label for="requester_email"class="font-weight-bold pl-2">Email</label>
        <input type="email" class="form-control" id="requester_email"  value="<?php if(isset($row['requester_email'])){echo $row['requester_email']; }?>"name="requester_email">
    </div>

    <div class="form-group col-md-4">
        <label for="requester_mobile"class="font-weight-bold pl-2">Mobile</label>
        <input type="text" class="form-control" id="requester_mobile" value="<?php if(isset($row['requester_mobile'])){echo $row['requester_mobile']; }?>" name="requester_mobile" onkeypress="isInputNumber(event)">
    </div></div>
    <div class="form-row">
    <div class="form-group col-md-6">
        <label for="assign_tech"class="font-weight-bold pl-2">Assign to Technician</label>
        <input type="text" class="form-control" id="assign_tech"  name="assign_tech">
    </div>

    <div class="form-group col-md-6">
        <label for="assign_date"class="font-weight-bold pl-2">Date</label>
        <input type="date" class="form-control" id="assign_date"  name="assign_date">
    </div>


</div>
<div class="float-right">
<button type="submit" class="btn btn-success" name="assign">Assign</button>
<button type="reset" class="btn btn-secondary" >Reset</button></div>

</form>
<?php if(isset($msg)){echo $msg;}?>

</div>
<script>
    function isInputNumber(evt){
        var ch = String.fromCharCode(evt.which);
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }

    }</script>

<?php include('includes/footer.php'); ?>