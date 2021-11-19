<?php 
    session_start();
    include('connect2.php');

    $errors = array();

    if (isset($_POST['login_user'])) {
        $Email_User = mysqli_real_escape_string($db, $_POST['Email_User']);
        $Pass_User = mysqli_real_escape_string($db, $_POST['Pass_User']);
        if (count($errors) == 0) {
            $query = "SELECT * FROM user WHERE Email_User = '$Email_User' AND Pass_User = '$Pass_User' ";
            $result = mysqli_query($db, $query);
            if (mysqli_num_rows($result) == 1) {
                $_SESSION['email'] = $Email_User;
                $row = mysqli_fetch_array($result);
                if($row["Level"]=="admin"){
                    Header("Location: listuser.php");
                }
                else if($row["Level"]=="member"){
                    header("location: index.php");
                    setcookie("login","yes",time()+3600*24);
                }
                
            } 
            else {
                array_push($errors, "อีเมล์หรือรหัสผ่านผิดพลาด กรุณากรอกใหม่");
                $_SESSION['error'] = "อีเมล์หรือรหัสผ่านผิดพลาด กรุณากรอกใหม่";
                header("location: login.php");
            }
        }
    }
?>