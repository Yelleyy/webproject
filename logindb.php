<?php 
    session_start();
    include('connect.php');

    $errors = array();

    // Email_User_state == true;

    if (isset($_POST['login_user'])) {
        $Email_User = mysqli_real_escape_string($db, $_POST['Email_User']);
        $Pass_User = mysqli_real_escape_string($db, $_POST['Pass_User']);
        
        // var Email_User = $('#Email_User').val();
        // if (Email_User == '') {
        //     Email_User_state = false;
        //     return;
        // }
        // if (Email_User_state == false || Pass_User_state == false) {
        //     e.preventDefault();
        //     $("#error_msg").text("กรอกข้อมูลให้ครบถ้วน");
        // }

        if (empty($Email_User)) {
            // ("#error_msg").text("กรอกข้อมูลให้ครบถ้วน");
            array_push($errors, "Email_User is required");
        }

        if (empty($Pass_User)) {
            array_push($errors, "Pass_User is required");
        }

        if (count($errors) == 0) {
            // $Pass_User = md5($Pass_User);
            $sql = "SELECT * FROM user WHERE Email_User = '$Email_User' AND Pass_User = '$Pass_User' ";
            $result = mysqli_query($db, $sql);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['Email_User'] = $Email_User;
                $_SESSION['success'] = "Your are now logged in";
                header("location: index.php");
            } else {
                array_push($errors, "Wrong Email_User or Pass_User");
                $_SESSION['error'] = "Wrong Email_User or Pass_User!";
                header("location: login.php");
            }
        } else {
            array_push($errors, "Email_User & Pass_User is required");
            $_SESSION['error'] = "Email_User & Pass_User is required";
            header("location: login.php");
        }
    }

?>