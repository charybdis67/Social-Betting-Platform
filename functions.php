<?php
error_reporting(0);
session_start();
include('config.php');
$passwordsecure="";
$version = "0.1";
function cookie_secure($data) {
	$enc_data=openssl_encrypt($data,"AES-128-ECB",$passwordsecure);
	$enc_data = str_replace(array(' ','	','\n','\r'),'',$enc_data);
	return($enc_data);
}
function cookie_secure_dec($data) {
	$enc_data_dec=openssl_decrypt($data,"AES-128-ECB",$passwordsecure);
	$enc_data_dec = str_replace(array(' ','	','\n','\r','\t','\'','\"'),'',$enc_data_dec);
	return($enc_data_dec);
}
function iflogin() {
	include('config.php');
	$useridlog = cookie_secure_dec($_COOKIE['ucvkp']);
	$mloginsql = "SELECT * FROM vk_users WHERE userid=".$useridlog."";
	$mlogin = mysqli_query($vtbaglan, $mloginsql);
	if(mysqli_num_rows($mlogin) > 0){
		return(true);	
	}else{
		return(false);	
	}
}
function ifwriter() {
	include('config.php');
	$useridlog = cookie_secure_dec($_COOKIE['ucvkw']);
	$mloginsql = "SELECT * FROM vk_falcilar WHERE id=".$useridlog."";
	$mlogin = mysqli_query($vtbaglan, $mloginsql);
	if(mysqli_num_rows($mlogin) > 0){
		return(true);	
	}else{
		return(false);	
	}
}
function ifadmin() {
	include('config.php');
	$adminmail = cookie_secure_dec($_COOKIE['ucvka']);
	if($adminmail == $yonetim_admin){
		return(true);	
	}else{
		return(false);	
	}
}

function writer_all($data){
	include('config.php');
	if($data != ""){
		$desc = "ORDER BY ".$data." desc";
	}else{
		$desc ="";
	}
	$mloginsql = "SELECT * FROM vk_falcilar ".$desc."";
	$mlogin = mysqli_query($vtbaglan, $mloginsql);
	return($mlogin);
}
function writer_info($data, $id){
	include('config.php');
	$mloginsql = "SELECT * FROM vk_falcilar WHERE id=".$id."";
	$mlogin = mysqli_query($vtbaglan, $mloginsql);
	$row = mysqli_fetch_array($mlogin);
	return($row[$data]);
}
function writer_info_panel(){
	include('config.php');
	$useridlog = cookie_secure_dec($_COOKIE['ucvkw']);
	$mloginsql = "SELECT * FROM vk_falcilar WHERE id=".$useridlog."";
	$mlogin = mysqli_query($vtbaglan, $mloginsql);
	$rowspecall = mysqli_fetch_assoc($mlogin);
	return($rowspecall);
}
function get_ip_address() {
    if (!empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED']))
        return $_SERVER['HTTP_X_FORWARDED'];
    if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
        return $_SERVER['HTTP_FORWARDED_FOR'];
    if (!empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED']))
        return $_SERVER['HTTP_FORWARDED'];
    return $_SERVER['REMOTE_ADDR'];
}
function vk_redirect($url) {
    return header("Location: {$url}");
}
function lastpage(){
	$lastpagefind = $_SERVER['REQUEST_URI'];
	if(strstr($lastpagefind, '?')){
		$lastpageexp = explode("?", $lastpagefind);
		$lastpage = $lastpageexp[0];
	}else{
		$lastpage = $lastpagefind;
	}
	return($lastpage);
}
function timeConvert ( $zaman ){
	$zaman =  strtotime($zaman);
	$zaman_farki = time() - $zaman;
	$saniye = $zaman_farki;
	$dakika = round($zaman_farki/60);
	$saat = round($zaman_farki/3600);
	$gun = round($zaman_farki/86400);
	$hafta = round($zaman_farki/604800);
	$ay = round($zaman_farki/2419200);
	$yil = round($zaman_farki/29030400);
	if( $saniye < 60 ){
		if ($saniye == 0){
			return "Az Önce";
		} else {
			return $saniye .' Saniye Önce';
		}
	} else if ( $dakika < 60 ){
		return $dakika .' Dakika Önce';
	} else if ( $saat < 24 ){
		return $saat.' Saat Önce';
	} else if ( $gun < 7 ){
		return $gun .' Gün Önce';
	} else if ( $hafta < 4 ){
		return $hafta.' Hafta Önce';
	} else if ( $ay < 12 ){
		return $ay .' Ay Önce';
	} else {
		return $yil.' Yıl Önce';
	}
}
function turkcetarih_formati($format, $datetime = 'now'){
    $z = date("$format", strtotime($datetime));
    $gun_dizi = array(
        'Monday'    => 'Pazartesi',
        'Tuesday'   => 'Salı',
        'Wednesday' => 'Çarşamba',
        'Thursday'  => 'Perşembe',
        'Friday'    => 'Cuma',
        'Saturday'  => 'Cumartesi',
        'Sunday'    => 'Pazar',
        'January'   => 'Ocak',
        'February'  => 'Şubat',
        'March'     => 'Mart',
        'April'     => 'Nisan',
        'May'       => 'Mayıs',
        'June'      => 'Haziran',
        'July'      => 'Temmuz',
        'August'    => 'Ağustos',
        'September' => 'Eylül',
        'October'   => 'Ekim',
        'November'  => 'Kasım',
        'December'  => 'Aralık',
        'Mon'       => 'Pts',
        'Tue'       => 'Sal',
        'Wed'       => 'Çar',
        'Thu'       => 'Per',
        'Fri'       => 'Cum',
        'Sat'       => 'Cts',
        'Sun'       => 'Paz',
        'Jan'       => 'Oca',
        'Feb'       => 'Şub',
        'Mar'       => 'Mar',
        'Apr'       => 'Nis',
        'Jun'       => 'Haz',
        'Jul'       => 'Tem',
        'Aug'       => 'Ağu',
        'Sep'       => 'Eyl',
        'Oct'       => 'Eki',
        'Nov'       => 'Kas',
        'Dec'       => 'Ara',
    );
    foreach($gun_dizi as $en => $tr){
        $z = str_replace($en, $tr, $z);
    }
    if(strpos($z, 'Mayıs') !== false && strpos($format, 'F') === false) $z = str_replace('Mayıs', 'May', $z);
    return $z;
}
function guvenlik($gelen){
    $giden = addslashes($gelen);
    $giden = htmlspecialchars($giden);
    $giden = strip_tags($giden);
    return $giden;
}
if (is_array($_POST ) && count($_POST )) {
	foreach ($_POST as $key => $value) {
		$_POST[$key] = guvenlik($value);
	}
}