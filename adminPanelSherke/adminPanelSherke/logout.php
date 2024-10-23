<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['login']);
session_destroy();
echo "<script>window.location.href='login.php'</script>";
exit;
