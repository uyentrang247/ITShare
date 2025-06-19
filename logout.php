<?php
session_start();
session_unset();
session_destroy();
setcookie("username", "", time() - 3600, "/"); // Xoá cookie

header("Location: dondangky.php");
exit();
?>
