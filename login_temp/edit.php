<?php
session_start();
include "db_conn.php";

if(isset($_SESSION['id']) && isset($_SESSION['name'])) {
    if(isset($_GET['id'])) {
        $id = $_SESSION['id'];
        $aid = $_GET['id'];
        // echo $aid;
        $sql = "SELECT * FROM `articles` WHERE author='$id' AND aid='$aid'";
        $result = $conn->query($sql);

        if($row = $result->fetch_assoc()) {
            if($row['author'] == $_SESSION['id']) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Article</title>
    <style>
        body{
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            vertical-align: middle;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container{
            border: 2px solid silver;
            width: 40vw;
            height: 48vh;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            border-radius: 2vw;
            box-shadow: 15px 15px 10px rgba(59, 130, 246, 0.8);
        }
        .container h1{
            margin: 0;
        }
        .container form{
            position: relative;
            left: -8vw;
        }
        input, textarea, button{
            font-family: 'Times New Roman', Times, serif;
            font-size: medium;
            height: 4vh;
            width: 12vw;
            margin: 6px 0;
            outline: none;
            border: none;
            border-bottom: 2px solid rgba(59, 130, 246, 0.3); 
            transition: ease-in 0.5s;   
        }
        textarea {
            height: 8vh;
            width: 20vw;
        }
        
        input:focus, textarea:focus{
            scale: 1.03;
            box-shadow: 5px 10px 10px rgba(59, 130, 246, 0.6);
        } 
        label {
            font-weight: bolder;
        }
        input[type="submit"], button{
            display: block;
            font-weight: bold;
            color: whitesmoke;
            background-color: rgba(59, 130, 246, 1);
            border: none;
            width: 10vw;
            height: 5vh;
            border-radius: 2vw;
            transition: ease-in-out 0.25s;
            cursor: pointer;
        }
        input[type="submit"]:hover, button:hover{
            background-color: white;
            color: rgba(59, 130, 246, 1);
            border: 1px solid rgba(59, 130, 246, 1);
        }
    </style>
</head>
<body>
<?php
                echo '
                    <div class = "container">
                    <h1>Article Updation</h1>
                    <form action="update.php?id='.$aid.'" method="POST">
                    <input type="hidden" name="id" value="'.$id.'">
                    <label for="title">Title:</label><br>
                    <span><input type="text" id="title" name="title" value="'.$row['title'].'"></span><br>
                    <label for="content">Update Article Content:</label><br>
                    <textarea id="data" name="data">'.$row['content'].'</textarea>
                    <input type="submit" value="Update">
                    <div class = "button"><button href="home.php">Home</button></div>
                </form>
                
                </div>';
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
</body>
</html>