<?php
    $db_host = 'localhost:3308';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'users';

    $con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if(mysqli_connect_error()) {
        exit('Error connecting to database');
        // exit('Error connecting to database', mysqli_connect_error());
    }

    if(!isset($_POST['fullname'], $_POST['uname'], $_POST['email'], $_POST['password1'])) {
        exit('Empty Field(s)');
    }

    if(empty($_POST['fullname'] || $_POST['uname'] || $_POST['email'] || $_POST['password1'])) {
        exit('Values are Emtpy');
    }

    if($stmt = $con->prepare('SELECT id, password FROM register WHERE id = ?')) {
        $stmt->bind_param('s', $_POST['uname']);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0) {
            echo 'Username Already Exists. Try Another One!';
        } else {
            if($stmt = $con->prepare('INSERT INTO register (name, id, email, password) VALUES (?, ?, ?, ?)')) {
                $password = password_hash($_POST['password1'], PASSWORD_DEFAULT);
                $stmt->bind_param('ssss', $_POST['fullname'], $_POST['uname'], $_POST['email'], $password);
                $stmt->execute();
                session_start();
                header("Location: /pce_comp_web_programming_lab_anuja-more/login_temp/home.php");
                // echo 'Successfully Registered';
            } else {
                echo 'Error Occured';
            }
            $stmt->close();
        }
    } else {
        echo 'Error Occured -1';
    }
    $con->close();
?>