<?php 
            
    include '../core/init.php';
    $gp_id = (isset($_POST['gp_id']) ? $_POST['gp_id'] : '');

    if(isset($_POST['studentReg'])) {
        $fullName = $_POST['fullname'];
        $email = $_POST['email'];
        $institution = $_POST['institution'];
        $dept = $_POST['dept'];
        $password = $_POST['password'];

        if(empty($fullName) || empty($email) || empty($institution) || empty($dept) || empty($password)) {
            // $error = "All Fields Empty";
            header('Location: '.BASE_URL.'cgpa.php?fieldsempty');
        } else {
            $fullName = $getFromG->checkInput($fullName);
            $email = $getFromG->checkInput($email);
            $institution = $getFromG->checkInput($institution);
            $dept = $getFromG->checkInput($dept);
            $password = $getFromG->checkInput($password);

            if(strlen($fullName) < 7) {
                // $error = "Name characters too small";
                header('Location: '.BASE_URL.'cgpa.php?leastof7characters');
            } else {
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    // $error = "Invalid Email Address";
                    header('Location: '.BASE_URL.'cgpa.php?mailexisting');
                } else {
                    if($getFromG->checkMail($email) === true) {
                        header('Location: '.BASE_URL.'cgpa.php?mailexisting');
                        // $error = "Email Existing";
                    } else {
                        $gp_id = $getFromG->create('signup', array('fullname'=>$fullName, 'inst_name'=>$institution, 'dept_name'=>$dept, 'email'=>$email, 'pass_word'=>md5($password)));
                        $_SESSION['gp_id'] = $gp_id;
                        header('Location: ../'.cgpa.'');
                    }
                }
            }
        }
    }

?>
