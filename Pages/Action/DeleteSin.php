<?php
$conn =mysqli_connect("localhost","root","","saint_anne");
 
$id = $_GET["id"];
$sqli = "DELETE FROM stockin WHERE StockInId='$id'";
$run=mysqli_query($conn,$sqli);

if( $run == true){
   header("Location:/project%20magement%20system/Pages/Stockin.php");
}else{
   echo"<script>PRODUCT NOT DELETED</script>";
}
?>