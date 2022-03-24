<?php 
    include 'core/init.php';
    if(isset($_SESSION['gp_id'])) {
      header('Location: cgpa.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?=BASE_URL?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate CGPA</title>
    <!-- Font awesome cdn -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <!-- jquery cdn -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
    <!-- Bootsrap CDN -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="file:///C:/xampp/htdocs/shopcart/CGPA/gpform/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="file:///C:/xampp/htdocs/shopcart/CGPA/gpform/js/jquery-3.6.0.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/form.css" />
    <script src="js/jquery-3.6.0.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/stu_reg.css" />
</head>
<body>

    <div class="container">
        <div class="header">
            <h2>Create Account</h2>
        </div>
        <form action="validate/reg.php" method="POST" class="form" id="form">
            <div class="form-control">
                <?php 
                    if(isset($error)) {
                        echo '<div class="error">'.$error.'</div>';
                    }
                ?>
                <!-- <label>Fullname</label> -->
                <input type="text" name="fullname" placeholder="Fullname" id="username" class="text-input correct" required>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <!-- <small>Error Message</small> -->
            </div>
            <div class="form-control">
                <!-- <label>E-mail</label> -->
                <input type="email" name="email" placeholder="e-mail" id="email" class="text-input" required>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <!-- <small>Error Message</small> -->
            </div>
            <div class="form-control">
                <label>Name of Institution</label>
                <select id="custom-select" name="institution" id="inst" class="custom-select instCourse" required>
                <option value=""></option>
                <option value="Abia State University">Abia State University</option>
                <option value="Abubakar Tafawwa Balewa University">Abubakar Tafawwa Balewa University</option>
                <option value="Achievers University, Owo">Achievers University, Owo</option>
                <option value="Adamawa State University">Adamawa State University</option>
                <option value="Abia State University">Abia State University</option>
                <option value="Abubakar Tafawwa Balewa University">Abubakar Tafawwa Balewa University</option>
                <option value="Achievers University, Owo">Achievers University, Owo</option>
                <option value="Adamawa State University">Adamawa State University</option>
                </select>
                <!-- <small>Error Message</small> -->
            </div>
            <div class="form-control">
                <label>Name of Department</label>
                <select id="custom-select" name="dept" id="dept" class="custom-select deptCourse" required>
                <option value=""></option>
                <option value="Computer Science">Computer Science</option>
                <option value="Mechanical Engineer">Mechanical Engineer</option>
                <option value="Civil Engineer">Civil Engineer</option>
                <option value="Data Analyst">Data Analyst</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Mechanical Engineer">Mechanical Engineer</option>
                <option value="Civil Engineer">Civil Engineer</option>
                <option value="Data Analyst">Data Analyst</option>
                </select>
                <!-- <small>Error Message</small> -->
            </div>
            <div class="form-control">
                <!-- <label>Password</label> -->
                <input type="password" name="password" placeholder="Password" id="password" class="text-input" required>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <!-- <small>Error Message</small> -->
            </div>
            <button type="submit" name="studentReg" class="button">Submit</button>
        </form>
        <p class="admin_links">Registered? <span><a href="<?php BASE_URL ?>">Sign In</a></span></p>
    </div>

</body>
</html>
