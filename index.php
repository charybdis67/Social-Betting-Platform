<?php 
include('functions.php');

$page = '';
$page = $_GET['sayfa'];
if($page == ''){ $page = 'anasayfa';}

if($page=="user"){include('pages/user.php');}
elseif($page=="editor"){include('pages/editor.php');}
elseif($page=="admin"){include('pages/admin.php');}

else{include('pages/user.php');}

mysqli_close($vtbaglan);

?>