<?php
session_start();
if(!isset($_SESSION['name'])){
    header("Location: login.php");
}
if($_SESSION['role'] = 'admin'){
    header("Location: admin-dashboard.php");
}elseif($_SESSION['role'] = 'manager'){
    header("Location: manager-dashboard.php");
}else{
    header("Location: user-dashboard.php");
}
?>