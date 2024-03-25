<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
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
.form {
background-color: #fff;
display: block;
padding: 1rem;
max-width: 450px;
border-radius: 0.5rem;
box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.5), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

.form-title {
font-size: 1.25rem;
line-height: 1.75rem;
font-weight: 600;
text-align: center;
color: #000;
}

.input-container {
position: relative;
}

.input-container input, .form button {
outline: none;
border: 1px solid #e5e7eb;
margin: 8px 0;
}

.input-container input , textarea{
background-color: #fff;
padding: 1rem;
padding-right: 3rem;
font-size: 0.875rem;
line-height: 1.25rem;
width: 300px;
border-radius: 0.5rem;
box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
}

.submit {
display: block;
padding-top: 0.75rem;
padding-bottom: 0.75rem;
padding-left: 1.25rem;
padding-right: 1.25rem;
background-color: #4F46E5;
color: #ffffff;
font-size: 0.875rem;
line-height: 1.25rem;
font-weight: 500;
width: 100%;
border-radius: 0.5rem;
text-transform: uppercase;
}
textarea{
	font-family: "Times New Roman";
	width: 350px;
	outline: none;
	border: 1px solid #e5e7eb;
	margin: 8px 0;
}
.back{
	position: relative;
	top: -15vh;
	width: 20vw;
	height: 5vh;
	border-radius: 5vw;
	border: none;
	background-color: #4F46E5;
	color: #e5e7eb;
	transition: ease-out 0.25s;
}
.back:hover{
	background-color: #e5e7eb;
	color: #4F46E5;
	font-weight: 600;
	font-size: larger;
	border: 2px solid #4F46E5;
}
</style>
</head>
<body>
	<?php
	$email = $_GET['email'];
	?>
	<form class="form" action="https://formspree.io/f/mpzvjvel" method="POST">
		<p class="form-title">Send Your Message:</p>
		<div class="input-container">
			<?php echo '<input type="email" placeholder="'. $email .'" value="'.$email.'" name="msg">'?>
			<!-- <?php //echo '<input type="email" placeholder="'. $email .'" value="'.$email.'" name="to">'?>
			<input type="email" name="from" id="from"> -->
			<span>
			</span>
		</div>
		<div class="input-container">
			<textarea placeholder="Enter your message" rows="2" columns="50" name="msg"></textarea>
		</div>
		<button type="submit" class="submit">Message</button>
	</form>
	
	<button onclick="home()" class="back">Home</button>
	
</body>
<script>
	function home() {
    window.location.href = "home.php";
  }
</script>
</html>