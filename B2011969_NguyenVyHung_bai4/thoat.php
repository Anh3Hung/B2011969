<?php
session_start();
session_unset();
session_destroy();

setcookie("user",  $row['email'], time() + (86400 / 24), "/");
setcookie("fullname", $row['fullname'], time() + (86400 / 24), "/");
setcookie("id", $row['id'], time() + (86400 / 24), "/");

header("Location:Login.php")
?>