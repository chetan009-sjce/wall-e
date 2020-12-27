<?php
define ('TITLE','Submit Request');
define ('PAGE','SubmitRequest');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if($_SESSION['is_login']){
    $rEmail=$_SESSION['rEmail'];
}else{
    echo "<script>location.href='RequesterLogin.php'</script>";
}
if(isset($_REQUEST['submitrequest'])){
    if($_REQUEST['requestinfo']=="" || $_REQUEST['requesdesc']=="" ||  $_REQUEST['requestername']=="" || $_REQUEST['requesteradd1']=="" ||
    $_REQUEST['requesteradd2']=="" || $_REQUEST['requestercity']=="" || $_REQUEST['requesterstate']=="" 
    || $_REQUEST['requesterzip']=="" || $_REQUEST['requesteremail']=="" || $_REQUEST['requestermobile']=="" ||
    $_REQUEST['requesterdate']==""){
        $regmsg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Feilds!</div>';
    }
    else{
        $rinfo=$_REQUEST['requestinfo'];
        $rdesc=$_REQUEST['requesdesc'];
        $rname=$_REQUEST['requestername'];
        $radd1=$_REQUEST['requesteradd1'];
       $radd2= $_REQUEST['requesteradd2'];
        $rcity=$_REQUEST['requestercity'];
       $rstate= $_REQUEST['requesterstate'];
       $rzip= $_REQUEST['requesterzip'];
       $remail= $_REQUEST['requesteremail'];
       $rmobile= $_REQUEST['requestermobile'];
       $rdate= $_REQUEST['requesterdate'];
       $sql= "INSERT INTO submitrequest_tb(request_info,reques_desc,requester_name,requester_add1,requester_add2,requester_city,requester_state,
       requester_zip,requester_email,requester_mobile,requester_date)VALUES('$rinfo','$rdesc','$rname','$radd1','$radd2','$rcity',' $rstate',' $rzip','$remail','$rmobile','$rdate')";
       if($conn->query($sql)==TRUE){
           $genid=mysqli_insert_id($conn);
        $regmsg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Request Submitted Successfully</div>';
        $_SESSION['myid']=$genid;  
        echo "<script>location.href='submitsuccess.php'</script>"; 
    
    }else{
        $regmsg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Unable To Submit Request</div>';
       }


    }}





?>

<div class="col-sm-9 col-md-10 mt-5"><!...servive request form>

<form class="mx-5" action="" method="POST">
    <div class="form-group">
        <label for="inputRequestInfo"class="font-weight-bold pl-2">Request Info</label>
        <input type="text" class="form-control" id="inputRequestInfo" placeholder="Request Info" name="requestinfo">
    </div>
    <div class="form-group">
        <label for="inputRequestInfo"class="font-weight-bold pl-2">Description</label>
        <input type="text" class="form-control" id="inputRequestDescription>" placeholder="Write Description" name="requesdesc">
    </div>
    <div class="form-group">
        <label for="inputName"class="font-weight-bold pl-2">Name</label>
        <input type="text" class="form-control" id="inputName" placeholder="Name" name="requestername">
    </div>

      <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputAddress"class="font-weight-bold pl-2">Address Line 1</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="House No. 123" name="requesteradd1">
    </div>

    <div class="form-group col-md-6">
        <label for="inputAddress"class="font-weight-bold pl-2">Address Line 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Railway Colony" name="requesteradd2">
    </div>
      </div>

      <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputCity"class="font-weight-bold pl-2">City</label>
        <input type="text" class="form-control" id="inputCity"  name="requestercity">
    </div>

    <div class="form-group col-md-4">
        <label for="inputState"class="font-weight-bold pl-2">State</label>
        <input type="text" class="form-control" id="inputState"  name="requesterstate">
    </div>

    <div class="form-group col-md-2">
        <label for="inputState"class="font-weight-bold pl-2">PinCode</label>
        <input type="text" class="form-control" id="inputZip"  name="requesterzip" onkeypress="isInputNumber(event)">
    </div>


      </div>

      <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputEmail"class="font-weight-bold pl-2">Email</label>
        <input type="email" class="form-control" id="inputEmail"  name="requesteremail">
    </div>

    <div class="form-group col-md-2">
        <label for="inputMobile"class="font-weight-bold pl-2">Mobile</label>
        <input type="text" class="form-control" id="inputMobile"  name="requestermobile" onkeypress="isInputNumber(event)">
    </div>

    <div class="form-group col-md-2">
        <label for="inputDate"class="font-weight-bold pl-2">Date</label>
        <input type="date" class="form-control" id="inputDate"  name="requesterdate">
    </div>


</div>
<button type="submit" class="btn btn-danger" name="submitrequest">Submit</button>
<button type="reset" class="btn btn-secondary" >Reset</button>
</form>
<?php if(isset($regmsg)){echo $regmsg;} ?>
</div>

<!..only number>
<script>
    function isInputNumber(evt){
        var ch = String.fromCharCode(evt.which);
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }

    }</script>

<?php
include('includes/footer.php');
?>