<?php
session_start();
require_once '../../db_config.php';

if (!isset($_SESSION['logged_user'])) {
    echo 'Not authorized';
    exit;
}

$mysqli = getDBConnection();
$logged_user_pseudo = $_SESSION['logged_user'];

$stmt = $mysqli->prepare("SELECT avatar FROM users WHERE pseudo = ?");
$stmt->bind_param("s", $logged_user_pseudo);
$stmt->execute();
$result = $stmt->get_result();
echo "putin";

if ($row = $result->fetch_assoc()) {
    $avatarUrl = $row['avatar'];
    if (!empty($avatarUrl)) {
        header('Location: ' . $avatarUrl);
        exit;
    } else {
        header('Location: /path/to/default/avatar.png');
        exit;
    }
} else {
    echo 'User not found';
}

$mysqli->close();
?>
