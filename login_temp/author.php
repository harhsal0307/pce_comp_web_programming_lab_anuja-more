<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<style>
	body{
		height: 100vh;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		/* overflow: hidden; */
	}
	.container {
		display: flex;
		flex-direction: column;
		width: 40vw;
		height: 80vh;
		border: 2px solid silver;
		padding-left: 2vw;	
		padding-top: 4vh;
		border-radius: 2vw;
		cursor: pointer;
		transition: ease-in-out 0.25s;
	}
	.container:hover{
		scale: 1.02;
		box-shadow: 5px 6px 10px rgba(0,0,0, 0.5);
	}
	.image, .details, .buttons{
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.details, .buttons {
		flex-direction: column;
	}
	.details h1, .articles h2{
		margin: 0;
	}
	.articles p {
		margin: 10px 0;
	}
	img {
		width: 10vw;
		height: 20vh;
		border: 2px solid grey ;
		border-radius: 60vh;
		transition: ease-out 0.5s;
	}
	img:hover{
		box-shadow: 5px 6px 10px rgba(0,0,0, 0.5);
		scale: 1.05;
	}
	button, a {
		width: 20vw;
		height: 5vh;
		margin: 10px 0;
		font-family: "Times New Roman";
		font-size: 3vh;
		border-radius: 2vw;
		cursor: pointer;
		transition: ease-in 0.25s;
	}
	button:hover, a:hover{
    background-color: #e91e63;
    color: white;
  }
	a {
		width: 20vw;
		color: black;
		text-decoration: none;
	}
</style>
<body>
<?php
session_start();
include "db_conn.php";

if(isset($_SESSION['id']) && isset($_SESSION['name'])) {
    if(isset($_GET['id'])) {
        $author_id = $_GET['id'];
				// echo $author_id;
        $sql = "SELECT * FROM `register` WHERE id='$author_id'";
        $result = $conn->query($sql);
				echo '<div class="container">';
        if($row = $result->fetch_assoc()) {
						echo '<div class="author-details">';
						echo '<div class="image"><img src="doctor.png"></div>';
            echo '<div class="details"><h1>'.$row['name'].'</h1>';
            echo '<p>'.$row['email'].'</p>';
						$email = $row['email'];
						echo '</div></div>';

            $sql = "SELECT * FROM `articles` WHERE author='$author_id'";
            $result = $conn->query($sql);

            while($article = $result->fetch_assoc()) {
                echo '<div class="articles">';
                echo '<h2>'.$article['title'].'</h2>';
                echo '<p>'.$article['content'].'</p>';
                echo '</div>';
            }
						
						?>
							<div class="buttons">
							<button onclick="home()">Home</button>
						<?php
							echo '<div class = "button"><button><a href="msg.php?email='.$email.'">Message</a></button></div>'; 
						?>
							</div>
						<?php
						echo'</div>';
        } else {
            echo 'Author not found.';
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
<script>
	function home(){
		window.location.href = "home.php";
	}
</script>
</html>

