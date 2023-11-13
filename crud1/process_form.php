<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Rest of your PHP code goes here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    // Perform database insertion
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=crud1", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "INSERT INTO students (name, email, phone, course) VALUES (:name, :email, :phone, :course)";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':course', $course, PDO::PARAM_STR);

        $stmt->execute();

        echo "Student added successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $pdo = null; // Close connection
}
?>
