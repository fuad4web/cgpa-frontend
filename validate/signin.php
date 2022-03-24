<?php 

    include '../core/init.php';

    if(isset($_POST['submit'])) {
        //email and password listed from this post is from the database
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) or !empty($password)) {
            //this is checking it from databse through the class created
            $email = $getFromG->checkInput($email);
            $password = $getFromG->checkInput($password);

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // $error = "Invalid Email Address";
                header("Location: ".BASE_URL."?invalidmailaddress");
            } else {
                if($getFromG->login($email, $password) === false) {
                    // $error = "Login Error";
                    header("Location: ".BASE_URL."?loginerror");
                }
            }
        } else {
            // $error = "Fields Empty";
            header("Location: ".BASE_URL."?fieldsEmpty");
        }
    }
?>
