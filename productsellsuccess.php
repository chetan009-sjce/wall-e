<?php
session_start(); 
define('TITLE','Success');
/*define('PAGE','sellproduct');*/
include('includes/header.php');
include('../dbconnection.php');
/*session_start();*/
if(isset($_SESSION['is_adminlogin'])){
    $aEmail=$_SESSION['aEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}


$sql="SELECT * FROM customer_tb WHERE custid={$_SESSION['myid']}";
$result=$conn->query($sql);
if($result->num_rows==1){
$row=$result->fetch_assoc();
echo "<div class='ml-5 mt-5'>
<h3 class='text-center'>Customer Bill</h3>
 '<table class='table'>'
 <tbody>
 <tr>
 <th>Customer ID</th>
 <td>".$row['custid']."</td>
 </tr>
 <tr>
 <th>Name</th>
 <td>".$row['cusname']."</td>
 </tr>
 <tr>
 <th>Address</th>
 <td>".$row['custadd']."</td>
 </tr>
 <tr>
 <th>Product</th>
 <td>".$row['cpname']."</td>
 </tr>
 <tr>
 <th>Quantity</th>
 <td>".$row['cpquan']."</td>
 </tr>
 <tr>
 <th>Price each</th>
 <td>".$row['cpeach']."</td>
 </tr>
 <tr>
 <th>Total Cost</th>
 <td>".$row['cptotal']."</td>
 </tr>
 <tr>
 <th>Date</th>
 <td>".$row['cpdate']."</td>
 </tr>
 <tr><td> <form class='d-print-none'><input type='submit' class='btn btn-danger'  value='Print' onClick='window.print()'></form></td>
 <td><form class='d-print-none'><a href='asset.php' class='btn btn-secondary'>Close</a></form></td></tr></tbody>
 </table>
 </div>";
}else{echo "Failed";}
 ?>
 
 <?php include('includes/footer.php'); ?>
 

