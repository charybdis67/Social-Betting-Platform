<?php
require_once('../functions.php');
$league =$_POST['league'];
$mbn =$_POST['mbn'];
$team1 =$_POST['team1'];
$team2 =$_POST['team2'];
$sport_type =$_POST['sport_type'];
$date = date('Y-m-d H:i:s');

$sql = "INSERT INTO bet(league,mbn,team1,team2,createdate,sport_type) VALUES ('".$league."','".$mbn."','".$team1."','".$team2."','".$date."','".$sport_type."')";
mysqli_query($vtbaglan,$sql);

echo 'ok';
?>