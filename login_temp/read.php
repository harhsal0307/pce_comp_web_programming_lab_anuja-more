<?php
session_start();
include "db_conn.php";

if(isset($_SESSION['id']) && isset($_SESSION['name'])) {
    if(isset($_GET['aid'])) {
        $id = $_SESSION['id'];
        $aid = $_GET['aid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="read.css">
</head>
<body>
<?php
	$sql = "SELECT * FROM `comments` WHERE aid = $aid";
	$article = "SELECT * FROM `articles` WHERE aid = $aid";
  $result = $conn->query($sql);
	$resultart = $conn->query($article);
	while($row = $resultart->fetch_assoc()) {
		echo '<div class="article"><p class="title">'.$row['title'].'</p>
		<p class="content">'.$row['content'].'</p>
		<p class="deets">Written by: '.$row['author'].'<span class="time"><span class="marg">On:</span>'.$row['time'].'</span></p>
		</div>
    ';
	}
	while($row = $result->fetch_assoc()) {
		echo '<div class="comment"><p class="content">'.$row['comment'].'</p>
		<p class="by">Commented by- '.$row['author'].'</p></div>
		';
	}
?>
   
</body>
</html>
<?php
} else {
	echo 'Invalid request.';
}
} else {
header("Location: /pce_comp_web_programming_lab_anuja-more/index.php");
exit();
}
?>
