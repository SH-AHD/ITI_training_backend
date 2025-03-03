<?php
session_start(); 

include "header.php";
require_once "db.php"; 

$emailPattern = "/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";
    $errors = [];
    $userError = '';

    if (!preg_match($emailPattern, $email)) {
        $errors['email'] = "Invalid email format!";
    }

    if (empty($password)) {
        $errors['password'] = "Password is required!";
    }

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("SELECT id, name, password FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    
                    $_SESSION["user_id"] = $user['id'];
                    $_SESSION["user_name"] = $user['name'];

                    
                    if (isset($_SESSION["user_id"])) {
                        header("Location: dashboard.php");
                        exit();
                    } else {
                        $userError = "Session failed to start!";
                    }
                } else {
                    $errors['password'] = "Wrong Password!";
                }
            } else {
                $userError = "User not found! <a href='./form.php'>Please Register</a>";
            }
        } catch (PDOException $e) {
            $userError = "Database error: " . $e->getMessage();
        }
    }
}
?>

<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4">User Login</h2>
        <form action="" method="post">

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
                <?php if (!empty($errors['email'])): ?>
                    <div class="text-danger"><?= $errors['email'] ?></div>
                <?php endif; ?>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" required>
                <?php if (!empty($errors['password'])): ?>
                    <div class="text-danger"><?= $errors['password'] ?></div>
                <?php endif; ?>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4">Login</button>
            </div>

        </form>
    </div>
</div>

<?php if (!empty($userError)): ?>
    <div class="text-danger text-center mt-3"><?= $userError ?></div>
<?php endif; ?>

<?php include "footer.php"; ?>
