<?php

$host='localhost';
$db_name='userdb';
$username='root';
$password='####';

try {
    $pdo = new PDO("mysql:host=$host; dbname=$db_name;charset=utf8", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    try {
        $create_table = "CREATE TABLE IF NOT EXISTS users (id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY , 
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL,
            roomnum VARCHAR(255) NOT NULL)";
        $pdo->exec($create_table);
       // echo "<br/>" . " table created successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage() . "<br/>";
    }

    

    // try {
    //             $insertData = "ALTER TABLE users ADD CONSTRAINT unique_email UNIQUE (email)";
            
    //             echo "<br/>". "unique_email successfully";
        
    //         } catch (PDOException $e) {
    //             echo "Error: " . $e->getMessage() . "<br/>";
    //         }
    
    // try {
    //         $insertData = "INSERT INTO users (name , email , password ,roomnum ) VALUES (:name , :email, :password , :roomnum)";
    //         $stmt = $pdo->prepare($insertData);
    //         $stmt->execute(["name"=>"john" , "email"=>"john@example.com" , "password"=>"123456789" , 'roomnum'=>"Cloud"]);
           
    //         echo "<br/>". " Data  inserted successfully";
    
    //     } catch (PDOException $e) {
    //         echo "Error: " . $e->getMessage() . "<br/>";
    //     }


} catch (PDOException $e) {
    echo $e->getMessage();
}
