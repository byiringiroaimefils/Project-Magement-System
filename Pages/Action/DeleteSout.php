<?php
$conn =mysqli_connect("localhost","root","","saint_anne");
 
$id = $_GET["id"];
$sqli = "DELETE FROM stockout WHERE StockOutId='$id'";
$run=mysqli_query($conn,$sqli);

if( $run == true){
   header("Location:/Project-Magement-System/Pages/Stockout.php");
}else{
   echo"<script>PRODUCT NOT DELETED</script>";
}
?>