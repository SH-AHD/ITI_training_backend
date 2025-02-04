
 <?php 

$gender = $_POST['gender'];
$title = ($gender == 'male') ? 'Mr.' : 'Miss';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST["address"];
$country = $_POST["country"];
$email = $_POST["email"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center text-primary">Form Submission</h2>

            <div class="alert alert-success mt-3">
                <p><strong>Name:</strong> <?= $firstname ?> <?= $lastname ?></p>
                <p><strong>Address:</strong> <?= $address ?></p>
                <p><strong>Email:</strong> <?= $email ?></p>
                <p class="fw-bold">Thank you for filling out the form, <?= $title ?> <?= $firstname ?> <?= $lastname ?>.</p>
            </div>
        </div>

        <?php 
        // Save data to file
        $filename = "customer.txt";
        $file = fopen($filename, 'a');
        $data = "$firstname|$lastname|$address|$email|$gender|$country\n";
        fwrite($file, $data);
        fclose($file);
        ?>

        <div class="card shadow-lg p-4 mt-4">
            <h3 class="text-center text-secondary">Customer Records</h3>
            <table class="table table-bordered table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Country</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $lines = file($filename, FILE_IGNORE_NEW_LINES);
                    foreach ($lines as $index => $line) {
                        list($firstname, $lastname, $address, $email, $gender, $country) = explode("|", $line);
                        echo "<tr>
                                <td>$firstname</td>
                                <td>$lastname</td>
                                <td>$address</td>
                                <td>$email</td>
                                <td>$gender</td>
                                <td>$country</td>        
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
