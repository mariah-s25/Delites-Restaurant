<?php
session_start();
session_unset();
session_destroy();
 echo'<span class="itext">Logging out. Please wait!...</span>';
 header("location:index.php");
 ?>