<?php
  session_start();
  include "db_conn.php";

  if(isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  }

  $username = validate($_POST['username']);
  $password = validate($_POST['password']);
  // hash problem occurs here 

  if(empty($username)) {
    header("Location: index.php?error=Username is Required!");
    exit();
  } else if(empty($password)) {
    header("Location: index.php?error=Password is Required!");
    exit();
  }

    $sql = "SELECT * FROM register WHERE id=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

  // $sql = "SELECT * FROM register WHERE id='$username' AND password='$password'";
  // $result = mysqli_query($conn, $sql);

  /*if(mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if($row['id'] === $username && $row['password'] === $password) {
  */
  if($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    //proper hashed comparison
    //username need not be checked again as it is checked already in the query, but can add additional outer if stmt if double username checking is required
    if(password_verify($password, $row['password'])) {
      echo 'Logged In';
      $_SESSION['id'] = $row['id'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['email'] = $row['email'];
      echo "Session ID: " . $_SESSION['id']; // Add this line for debugging
      echo "Session Name: " . $_SESSION['name']; // Add this line for debugging

      echo "Number of rows: " . $result->num_rows;
      header("Location: home.php");
      exit();
    } else {
      header("Location: login_pg.php?error=Incorrect User Name or Password");
      exit();
    }
  } else {
    echo "Number of rows: " . $result->num_rows;
    header("Location: index.php");
    exit();
  }
?>  
