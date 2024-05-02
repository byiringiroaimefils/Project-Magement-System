<?php 
session_start();
session_unset();
if(session_destroy()){
  header("location:/project magement system/index.php");
}
?>