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

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute(['id' => $id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $roomnum = $_POST['roomnum'] ?? '';

    $updateStmt = $pdo->prepare("UPDATE users SET name = :name, email = :email, roomnum = :roomnum WHERE id = :id");
    $updateStmt->execute([
        'name' => $name,
        'email' => $email,
        'roomnum' => $roomnum,
        'id' => $id
    ]);

    $_SESSION['success'] = "User updated successfully!";
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="text-center fw-bold">Edit User</h3>
                    <form action="edit.php" method="POST">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">

                        <div class="mb-3">
                            <label class="form-label">Name:</label>
                            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user['name']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email:</label>
                            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Room Number:</label>
                            <select name="roomnum" class="form-select">
                                <option value="Application1" <?= $user['roomnum'] == 'Application1' ? 'selected' : '' ?>>Application1</option>
                                <option value="Application2" <?= $user['roomnum'] == 'Application2' ? 'selected' : '' ?>>Application2</option>
                                <option value="Cloud" <?= $user['roomnum'] == 'Cloud' ? 'selected' : '' ?>>Cloud</option>
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <a href="dashboard.php" class="btn btn-outline-secondary">Back to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<footer class="text-center mt-5 py-3 bg-light shadow-sm">
    <small>Copyright © ITI & All rights reserved.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
