<?php
$conn =mysqli_connect("localhost","root","","saint_anne");
 
$id = $_GET["id"];
$sqli = "DELETE FROM stockin_product WHERE product_id='$id'";
$run=mysqli_query($conn,$sqli);

if( $run == true){
   header("Location:Product.php");
}else{
   echo"<script>PRODUCT NOT DELETED</script>";
}
?>