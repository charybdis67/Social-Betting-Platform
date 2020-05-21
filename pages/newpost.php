<?php
require_once('../functions.php');
$content =$_POST['content'];
$post_type =$_POST['post_type'];
$userid =$_POST['userid'];
$date = date('Y-m-d H:i:s');

$sql = "INSERT INTO post(content,post_type,createdate,user_id) VALUES ('".$content."','".$post_type."','".$date."','".$userid."')";
mysqli_query($vtbaglan,$sql);

echo 'ok';
?>