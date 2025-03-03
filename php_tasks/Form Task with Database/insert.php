<?php
session_start();
require_once "db.php";

if (!isset($_SESSION['formData'])) {
    header("Location: form.php");
    exit();
}

$firstname = trim($_SESSION['formData']['firstname']);
$lastname = trim($_SESSION['formData']['lastname']);
$email = strtolower(trim($_SESSION['formData']['email'])); 
$password = trim($_SESSION['formData']['password']);
$roomnum = trim($_SESSION['formData']['roomnum']);

$name = $firstname . " " . $lastname; 

try {
    
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);

    if ($stmt->fetch()) {
        $_SESSION['error'] = "Email is already registered! Try another one.";
        header("Location: form.php");
        exit();
    }

  
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, roomnum) VALUES (:name, :email, :password, :roomnum)");
    $stmt->execute([
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'roomnum' => $roomnum,
    ]);

  
    $_SESSION['success'] = "Registration Successful! Please log in.";
    unset($_SESSION['formData']);

    header("Location: login.php");
    exit();
} catch (PDOException $e) {
    if ($e->getCode() == 23000) { // Handle duplicate email error (Integrity constraint violation)
        $_SESSION['error'] = "Email is already registered! Try another one.";
        header("Location: form.php");
        exit();
    } else {
        $_SESSION['error'] = "Database Error: " . $e->getMessage();
        header("Location: form.php");
        exit();
    }
}
?>
