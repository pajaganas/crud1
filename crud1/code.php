<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student'])) {
    $student_id = $_POST['delete_student'];

    try {
        $stmt = $con->prepare("DELETE FROM students WHERE id = ?");
        $stmt->execute([$student_id]);

        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: index.php");
        exit(0);
    } catch (PDOException $e) {
        $_SESSION['message'] = "Error deleting student: " . $e->getMessage();
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_student'])) {
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    try {
        $stmt = $con->prepare("UPDATE students SET name=?, email=?, phone=?, course=? WHERE id=?");
        $stmt->execute([$name, $email, $phone, $course, $student_id]);

        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: index.php");
        exit(0);
    } catch (PDOException $e) {
        $_SESSION['message'] = "Error updating student: " . $e->getMessage();
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['save_student'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    try {
        $stmt = $con->prepare("INSERT INTO students (name, email, phone, course) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $phone, $course]);

        $_SESSION['message'] = "Student Created Successfully";
        header("Location: student-create.php");
        exit(0);
    } catch (PDOException $e) {
        $_SESSION['message'] = "Error creating student: " . $e->getMessage();
        header("Location: student-create.php");
        exit(0);
    }
}
?>
