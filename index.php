<?php 
    include 'core/init.php';
    if(isset($_SESSION['gp_id'])) {
      header('Location: cgpa.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Calculation of CGPA Calculator made easy</title>
      <!-- Font awesome cdn -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <!-- jquery cdn -->
      <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
      <script src="../js/jquery-3.6.0.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="css/login.css" />
  </head>
    <body>
      <div class="login-page">
        <div class="form">
          <form class="login-form" action="validate/signin.php" method="POST">
          <?php 
            // if(isset($error)) {
            //   echo '<div class="error">'.$error.'</div>';
            // }
          ?>
            <input type="text" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <button type="submit" name="submit">Login</button>
            <p class="message">Not Registered?&nbsp;&nbsp;<a href="register">Register</a></p>
          </form>
        </div>
      </div>
        <script>
          // $(document).ready(function() {
          //   setInterval(function() {
          //     $('.message').load('stu_reg.php');
          //   }, 1000);
          // });
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    </body>
</html>
