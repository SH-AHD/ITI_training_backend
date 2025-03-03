<?php
session_start();
require_once "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}


if (!isset($_POST['id'])) {
    header("Location: dashboard.php");
    exit();
}

$id = $_POST['id'];


$deleteStmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
$deleteStmt->execute(['id' => $id]);

$_SESSION['success'] = "User deleted successfully!";
header("Location: dashboard.php");
exit();
?>
