<?php
  // define('BASEPATH', true);
  // include 'createDBase.php';

  // $_SESSION['user'] = '';

  // if(isset($_POST['login'])) {
  //   try {
  //     $dsn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
  //     $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //     $user_login = !empty($_POST['username']) ? ($_POST['username']) :null;
  //     $user_mail = !empty($_POST['email']) ? ($_POST['email']) :null;
  //     $password_Attempt = !empty($_POST['password']) ? ($_POST['password']) :null;

  //     // retrieving from database
  //     $sql = "SELECT username, pass_word FROM signup WHERE username = :username OR email = :username";
  //     $stmt = $pdo->prepare($sql);
  //     $stmt->bindValue('username', $user_login);
  //     $stmt->execute();
  //     $user = $stmt->fetch(PDO::FETCH_ASSOC);
  //     if($user === false) {
  //       header('Location: ../gpa.php?InvalidEmailorPassword');
  //     } else {
  //       // compare passwords
  //       $validPassword = password_verify($password_Attempt, $user['pass_word']);
  //       if($validPassword) {
  //         $_SESSION['user'] = $user_login;
  //         header('Location: ../qjfknjcfbkjs.php');
  //       } else {
  //         header('Location: ../gpa.php');
  //       }
  //     }
  //   } catch(PDOException $e) {
  //     $error = "Error: ".$e->getMessage();
  //     echo "<script>alert('".$error."');</script>";
  //   }
  // }






/*
  if(isset($_POST['login'])) {
    if(empty($_POST['username']) || empty($_POST['password'])) {
      header("location: ../gpa.php?empty");
      exit();
    } else {
      $userName = mysqli_real_escape_string($conn,$_POST['username']);
      $passWord = mysqli_real_escape_string($conn,$_POST['password']);

      $query = " select * from signupg where user_name='".$userName."' or mail_name='".$userName."'";
      $result = mysqli_query($conn,$query);
      if($row = mysqli_fetch_assoc($result)) {
        $password = password_verify($passWord,$row['pass_word']);
        if($password==false) {
          header("location: ../gpa.php?incorrectpassword");
          exit();
        } elseif ($password==true) {
          //after loggin in this will take all the rows in a particular information that the person used
          $_SESSION['id']=$row['id'];
          $_SESSION['user']=$row['user_name'];
          $_SESSION['inst']=$row['inst_name'];
          $_SESSION['dept']=$row['dept_name'];
          $_SESSION['mail']=$row['mail_name'];
          $_SESSION['pass']=$row['pass_word'];

        header("location: ../qjfknjcfbkjs.php?loginsuccessful");
        exit();
        }
      } else {
        header("location: ../gpa.php?invaliduser");
        exit();
      }
    }
  } else {
    header("location: ../gpa.php?dontknow");
    exit();
  }
  */
?>
