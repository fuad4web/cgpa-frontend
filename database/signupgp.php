<?php
/*
    define('BASEPATH', true);
    include 'createDBase.php';
    //include_once 'database/signupgp.php';

  if(isset($_POST['signup'])) {
    try {
      $dsn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
      $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $username = $_POST['username'];
      $inst_name = $_POST['instname'];
      $dept_name = $_POST['deptname'];
      $email = $_POST['email'];
      $pass_word = $_POST['password'];

      //$pass_word = password_hash($pass_word, PASSWORD_BCRYPT, array("cost" => 12));
      $pass_word = password_hash($pass_word, PASSWORD_DEFAULT, array("cost" => 12));
      $sql = "SELECT COUNT(email) AS num FROM signup WHERE email = :email";
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':email', $email);
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
       if($row['num'] > 0) {
         echo '<script>alert("Mail already exist");</script>';
       } else {
         $stmt = $dsn->prepare("INSERT INTO signup (username, inst_name, dept_name, email, pass_word) VALUES (
           :username, :inst_name, :dept_name, :email, :pass_word
         )");
         $stmt->bindParam(':username', $username);
         $stmt->bindParam(':inst_name', $inst_name);
         $stmt->bindParam(':dept_name', $dept_name);
         $stmt->bindParam(':email', $email);
         $stmt->bindParam(':pass_word', $pass_word);

         if($stmt->execute()) {
           echo "<script>alert('Registration Successful');</script>";
           header('Location: ../qjfknjcfbkjs.php');
         } else {
           $error = "Error: ".$e->getMessage();
           echo "<script>alert('".$error."');</script>";
           //header('Location: ../qjfknjcfbkjs.php');
         }
       }
    } catch(PDOException $e) {
          $error = "Error: ".$e->getMessage();
          echo "<script>alert('".$error."');</script>";
    }
  }


*/



/*
  if(isset($_POST['signup'])) {
    if(empty($_POST['username']) || empty($_POST['instname']) || empty($_POST['deptname']) || empty($_POST['email']) || empty($_POST['password'])) {
      header("location: ../gpa.php?empty");
      exit();
    } else {
      $user = mysqli_real_escape_string($conn,$_POST['username']);
      $inst = mysqli_real_escape_string($conn,$_POST['instname']);
      $dept = mysqli_real_escape_string($conn,$_POST['deptname']);
      $mail = mysqli_real_escape_string($conn,$_POST['email']);
      $password = mysqli_real_escape_string($conn,$_POST['password']);

      if(!preg_match("/^[a-zA-Z]*$/",$user) || !preg_match("/^[a-zA-Z]*$/",$inst) || !preg_match("/^[a-zA-Z]*$/",$dept) || $user === $password) {
        header("location: ../gpa.php?invalid");
        exit();
      } else {
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
          header("location: ../gpa.php?invalidemail");
          exit();
        } else {
          // we check whether the username input is equal to the one in database
          $query = " select * from signupg where user_name='".$user."'";
          $result = mysqli_query($conn,$query);
          if(mysqli_fetch_assoc($result)) {
            header("location: ../gpa.php?usertaken");
            exit();
          } else {
            $query = " select * from signupg where mail_name='".$mail."'";
            $result = mysqli_query($conn,$query);
            if(mysqli_fetch_assoc($result)) {
              header("location: ../gpa.php?emailtaken");
              exit();
            } else {
              //$hash = password_hash($password, PASSWORD_DEFAULT);
              $query = " insert into signupg (user_name,inst_name,dept_name,mail_name,pass_word) values ('$user', '$inst', '$dept', '$mail', '$password')";
              $result = mysqli_query($conn,$query);
              header("location: ../qjfknjcfbkjs.php?signupsuccessful");
              exit();
            }
          }
        }
      }
    }
  } else {
    header("location: ../gpa.php?unknownlink");
    exit();
  }
  */
  ?>
