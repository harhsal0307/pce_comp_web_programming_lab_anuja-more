<?php
session_start();
include "db_conn.php";


        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['data'];
        $aid = $_GET['id'];
        $sql = "SELECT * FROM `articles` WHERE author = '$id' AND aid = '$aid'";
        $result = $conn->query($sql);

        if($row = $result->fetch_assoc()) {
            if($row['author'] == $_SESSION['id']) {
                // The user is allowed to edit this article

                $sql = "UPDATE `articles` SET title='$title', content='$content' WHERE author='$id' AND aid = '$aid'";
                if($conn->query($sql) === TRUE) {
                    echo 'Article updated successfully.';
                    header("Location: home.php");
                } else {
                    echo 'Error updating article: ' . $conn->error;
                }
            } else {
                echo 'You are not allowed to edit this article.';
            }
        } else {
            echo 'Article not found.';
        }

    // header("Location: /pce_comp_web_programming_lab_anuja-more/index.php");
    exit();

?>
