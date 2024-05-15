<?php
$conn =mysqli_connect("localhost","root","","saint_anne");
 
$id = $_GET["id"];
$sqli = "DELETE  FROM product WHERE ProductId='$id'";
$run=mysqli_query($conn,$sqli);

if( $run == true){
   header("Location:/project%20magement%20system/Pages/Products.php");
}else{
   echo"<script>PRODUCT NOT DELETED</script>";
}
?>