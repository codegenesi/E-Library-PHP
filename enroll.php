<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    $student_id = intval($_GET['sid']);
    $bookid = intval($_GET['bookid']);

    $sql = "INSERT INTO `enrolled`(`book_id`, `student_id`) VALUES (:bookid, :student_id)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':student_id', $student_id, PDO::PARAM_STR);
    $query->bindParam(':bookid', $bookid, PDO::PARAM_STR);
    $query->execute();
    $_SESSION['msg'] = "Enrollment success. Wait for approval!";
    header('location:my-enrollments.php?sid=') . $student_id;
}
