<?php 
    // session_start();
    include('connect.php');

    // $db = mysqli_connect('localhost', 'root', '', 'cn');

    if (isset($_POST['Tel_User_check'])) {
        $Tel_User = $_POST['Tel_User'];
        $sql = "SELECT * FROM user WHERE Tel_User = '$Tel_User' ";
        $results = mysqli_query($db, $sql);
        if (mysqli_num_rows($results) > 0) {
            echo 'taken';
        } else {
            echo 'not_taken';
        }
        exit();
    }

    if (isset($_POST['Email_User_check'])) {
        $Email_User = $_POST['Email_User'];
        $sql = "SELECT * FROM user WHERE Email_User = '$Email_User' ";
        $results = mysqli_query($db, $sql);
        if (mysqli_num_rows($results) > 0) {
            echo 'taken';
        } else {
            echo 'not_taken';
        }
        exit();
    }

    if (isset($_POST['save'])) {
        $Tel_User = $_POST['Tel_User'];
        $Email_User = $_POST['Email_User'];
        $Pass_User = $_POST['Pass_User'];
        $Name_User = $_POST['Name_User'];
        $sql = "SELECT * FROM user WHERE Tel_User = '$Tel_User' ";
        $results = mysqli_query($db, $sql);
        if (mysqli_num_rows($results) > 0) {
            echo "exists";
            exit();
        } else {
            $query = "INSERT INTO user (Name_User,Tel_User, Email_User, Pass_User) VALUES ('$Name_User','$Tel_User', '$Email_User', '".md5($Pass_User)."')";
            $results = mysqli_query($db, $query);
            echo 'Saved';
            exit();
        }
    }


?>