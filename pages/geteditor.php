<?php 
include('../functions.php'); 
$arama = $_GET['q'];

$mnotification = "SELECT * FROM editor WHERE name LIKE '%".$arama."%' OR surname LIKE '%".$arama."%'";
$mnot = mysqli_query($vtbaglan, $mnotification);
while($row = mysqli_fetch_assoc($mnot)){
	echo '<a href="#">'.$row["name"].' '.$row["surname"].'</a><br>';
}
?>