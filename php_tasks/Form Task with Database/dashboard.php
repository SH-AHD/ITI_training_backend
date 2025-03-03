<?php  
session_start();
require_once "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>



<div class="container mt-5">
    <div class="text-center">
        <h2 class="fw-bold">Welcome, <?php echo htmlspecialchars($_SESSION["user_name"]); ?>!</h2>
    </div>

   
    <div class="table-responsive mt-4">
        <table class="table table-bordered table-striped text-center shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Room</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM users");
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                foreach ($users as $user) {
                    echo "<tr>
                        <td>{$user['id']}</td>
                        <td>{$user['name']}</td>
                        <td>{$user['email']}</td>
                        <td>{$user['roomnum']}</td>
                        <td>
                            <form action='edit.php' method='POST' class='d-inline'>
                                <input type='hidden' name='id' value='{$user['id']}'>
                                <button type='submit' class='btn btn-warning btn-sm'>Edit</button>
                            </form>
                            <form action='delete.php' method='POST' class='d-inline'>
                                <input type='hidden' name='id' value='{$user['id']}'>
                                <button type='submit' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</button>
                            </form>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

   
    <div class="text-center mt-4">
        <a href="logout.php" class="btn btn-outline-danger">Logout</a>
    </div>
</div>


<footer class="text-center mt-5 py-3 bg-light shadow-sm">
    <small>Copyright © ITI & All rights reserved.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
