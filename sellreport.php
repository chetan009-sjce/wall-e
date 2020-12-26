<?php 
define('TITLE','Sellreport');
define('PAGE','sellreport');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $aEmail=$_SESSION['aEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}

?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
    <form action="" method="POST" class="d-print-none">
        <div class="form-row">
            <div class="form-group col-md-2">
                <input type="date" class="form-control"
                id="startdate" name="startdate">

            </div><span> to </span>
            <div class="form-group col-md-2">
                <input type="date" class="form-control" id="enddate" name="enddate">

            </div>
            <div class="form-group"><input type="submit" class="btn btn-secondary" name="searchsubmit" value="Search"></div>
        </div>
            </form>
            <?php 
            if(isset($_REQUEST['searchsubmit'])){
                $startdate=$_REQUEST['startdate'];
                $enddate=$_REQUEST['enddate'];
                $sql="SELECT * FROM customer_tb WHERE cpdate BETWEEN '$startdate' AND '$enddate'";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                    echo '<p class="bg-dark text-white p-2 mt-4">Details</p>';
                    echo '<table class="table">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th scope="col">Customer ID</th>';
                    echo '<th scope="col">Customer Name</th>';
                    echo '<th scope="col">Address</th>';
                    echo '<th scope="col">Product</th>';
                    echo '<th scope="col">Quantity</th>';
                    echo '<th scope="col">Price each</th>';
                    echo '<th scope="col">Total</th>';
                    echo '<th scope="col">Date</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while($row=$result->fetch_assoc()){
                        echo '<tr>';
                        echo '<td>'.$row['custid'].'</td>';
                        echo '<td>'.$row['cusname'].'</td>';
                        echo '<td>'.$row['custadd'].'</td>';
                        echo '<td>'.$row['cpname'].'</td>';
                        echo '<td>'.$row['cpquan'].'</td>';
                        echo '<td>'.$row['cpeach'].'</td>';
                        echo '<td>'.$row['cptotal'].'</td>';
                        echo '<td>'.$row['cpdate'].'</td>';
                        echo '</tr>';
                    }
                    echo '<tr>';
                    echo '<td>';
                    echo "<form class='d-print-none'><input type='submit' class='btn btn-danger'  value='Print' onClick='window.print()'></form>";echo '</td>';
                    echo '<td>';
                    echo "<form class='d-print-none'><a href='sellreport.php' class='btn btn-secondary'>Close</a></form>";
                    echo '</td>';
                    echo '</tr>';
                    echo '</tbody>';
                    echo '</table>';
                    
                }else {
                    echo '<div class="alert alert-warning col-sm-6 ml-5 mt-2">No Records Found!!</div>';
                }
            }
?>
</div>
<?php include('includes/footer.php'); ?>