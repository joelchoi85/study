<?php
session_start();
session_unset();
session_destroy();

if(!isset($_SESSION['ss_mb_id'])) {
    echo "<script>alert('logout successful'); </script>";
    echo "<script>location.replace('./index.php');</script>";
    exit;
}