<?php
session_start();
include "db_conn.php";

if(isset($_SESSION['id']) && isset($_SESSION['name'])) {
    if(isset($_GET['id'])) {
        $id = $_SESSION['id'];
        $aid = $_GET['id'];
        $sql = "SELECT * FROM `articles` WHERE author='$id' AND aid='$aid'";
        $result = $conn->query($sql);

        if($row = $result->fetch_assoc()) {
            if($row['author'] == $_SESSION['id']) {
                $sql = "DELETE FROM `articles` WHERE author='$id' AND aid='$aid'";
                if($conn->query($sql) === TRUE) {
                    echo 'Article deleted successfully.';
                    header("Location: home.php");
                } else {
                    echo 'Error deleting article: ' . $conn->error;
                }
            } else {
                echo 'You are not allowed to delete this article.';
            }
        } else {
            echo 'Article not found.';
        }
    } else {
        echo 'Invalid request.';
    }
} else {
    header("Location: /pce_comp_web_programming_lab_anuja-more/index.php");
    exit();
}
?>
