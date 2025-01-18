<?php
session_start();
session_unset();
session_destroy();
header("location:/Project-Magement-System/index.php");

exit();
?>