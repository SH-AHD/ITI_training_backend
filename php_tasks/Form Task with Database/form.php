


<?php
include "header.php";
require_once "db.php";
session_start();
 ?>
<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger text-center">
        <?= $_SESSION['error']; ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>


<?php 

//$errors = [];
// $emailPattern = "/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/";

$emailPattern = "/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $roomnum = $_POST["roomnum"] ?? '';
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';
    $confirmpassword = $_POST['confirmpassword'] ?? '';

    $errors = []; 

   
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!preg_match($emailPattern, $email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format!";
    }

   
    if (empty($password)) {
        $errors['password'] = "Password is required.";
    } elseif (strlen($password) < 8 || !preg_match("/[^A-Za-z0-9]/", $password)) {
        $errors['password'] = "Password must be at least 8 characters long and include at least one special character.";
    }

    
    if (empty($confirmpassword)) {
        $errors['confirmpassword'] = "Confirm Password is required.";
    } elseif ($confirmpassword !== $password) {
        $errors['confirmpassword'] = "Passwords do not match.";
    }

  
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
    } else {
        unset($_SESSION['errors']); 
        $_SESSION['formData'] = $_POST;
        header("Location: insert.php");
        exit();
    }
}

?>

<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4">User Registration Form</h2>
        <form action="" method="POST"> 

            <!-- First Name -->
            <div class="row mb-3">
                <div class="col">
                    <label for="firstname" class="form-label">First name:</label>
                    <input type="text" class="form-control" name="firstname" value="<?= htmlspecialchars($_POST['firstname'] ?? '') ?>" required>
                    <?php if (isset($errors['firstname'])): ?>
                        <div class="text-danger"><?= $errors['firstname'] ?></div>
                    <?php endif; ?>
                </div>

                <!-- Last Name -->
                <div class="col">
                    <label for="lastname" class="form-label">Last name:</label>
                    <input type="text" class="form-control" name="lastname" value="<?= htmlspecialchars($_POST['lastname'] ?? '') ?>" required>
                    <?php if (isset($errors['lastname'])): ?>
                        <div class="text-danger"><?= $errors['lastname'] ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
                <?php if (isset($errors['email'])): ?>
                    <div class="text-danger"><?= $errors['email'] ?></div>
                <?php endif; ?>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" required>
                <?php if (isset($errors['password'])): ?>
                    <div class="text-danger"><?= $errors['password'] ?></div>
                <?php endif; ?>
            </div>

            <!-- Confirm Password  -->
            <div class="mb-3">
                <label for="confirmpassword" class="form-label">Confirm Password:</label>
                <input type="password" class="form-control" name="confirmpassword" required>
                <?php if (isset($errors['confirmpassword'])): ?>
                    <div class="text-danger"><?= $errors['confirmpassword'] ?></div>
                <?php endif; ?>
            </div>

            <!-- Room number -->
            <div class="mb-3">
                <label for="roomnum" class="form-label">Room number:</label>
                <select class="form-select" name="roomnum" required>
                    <option value="">Select Room number</option>
                    <option value="Application1" <?= ($_POST['roomnum'] ?? '') == 'Application1' ? 'selected' : '' ?>>Application1</option>
                    <option value="Application2" <?= ($_POST['roomnum'] ?? '') == 'Application2' ? 'selected' : '' ?>>Application2</option>
                    <option value="Cloud" <?= ($_POST['roomnum'] ?? '') == 'Cloud' ? 'selected' : '' ?>>Cloud</option>
                </select>
                <?php if (isset($errors['roomnum'])): ?>
                    <div class="text-danger"><?= $errors['roomnum'] ?></div>
                <?php endif; ?>
            </div>

            <!-- Submit Buttons -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4">Submit</button>
                <button type="reset" class="btn btn-secondary px-4">Reset</button>
            </div>

        </form>
    </div>
</div>

<?php include "footer.php"; ?>
