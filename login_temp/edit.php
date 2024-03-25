<?php
session_start();
include "db_conn.php";

if(isset($_SESSION['id']) && isset($_SESSION['name'])) {
    if(isset($_GET['id'])) {
        $id = $_SESSION['id'];
        $aid = $_GET['id'];
        echo $aid;
        $sql = "SELECT * FROM `articles` WHERE author='$id' AND aid='$aid'";
        $result = $conn->query($sql);

        if($row = $result->fetch_assoc()) {
            if($row['author'] == $_SESSION['id']) {
                echo '<form action="update.php?id='.$aid.'" method="POST">
                    <input type="hidden" name="id" value="'.$id.'">
                    <label for="title">Title:</label><br>
                    <input type="text" id="title" name="title" value="'.$row['title'].'"><br>
                    <label for="content">Update Article Content:</label><br>
                    <textarea id="data" name="data">'.$row['content'].'</textarea>
                    <input type="submit" value="Update">
                </form>';
            } else {
                echo 'You are not allowed to edit this article.';
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
