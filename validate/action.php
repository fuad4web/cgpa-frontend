<?php 

    include '../core/init.php';
    $gp_id = $_SESSION['gp_id'];
    $user = $getFromG->userData($gp_id);

    if(isset($_POST['submit'])) {

        $code = implode(',', $_POST['code']);
        $score = implode(',', $_POST['score']);
        $grade = implode(',', $_POST['grade']);
        $unit = implode(',', $_POST['unit']);
        $poin = implode(',', $_POST['poin']);
        $unitpoint = implode(',', $_POST['unitpoint']);
        $gpascore = $_POST['gpascore'];

         if(!empty($code) || !empty($score) || !empty($grade) || !empty($unit) || !empty($poin) || !empty($unitpoint) || !empty($gpascore)) {

            // $courseCodes = $getFromG->checkInput($courseCodes);

            $stu_id = $getFromG->create('student_grades', array('gp_id'=>$gp_id, 'course_code'=>$code, 'course_score'=>$score, 'grade'=>$grade, 'course_unit'=>$unit, 'course_point'=>$poin, 'unit_point'=>$unitpoint, 'gpa_grade'=>$gpascore));

            if($stu_id) {
                echo '<script>alert("Save Successfully");</script>';
			    echo '<script>window.location.href = "/gpform/cgpa.php";</script>';
            } else {
                echo '<script>alert("Not Save");</script>';
            }
            // header('Location: ../'.BASE_URL.'/cgpa.php?suceessfull');
         }
    }

?>
