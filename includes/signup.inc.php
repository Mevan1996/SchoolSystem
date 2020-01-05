<?php
if(isset($_POST['submit'])){
  include_once 'dbh.inc.php';
  $first=mysqli_real_escape_string($conn,$_POST['first']);
  $last=mysqli_real_escape_string($conn,$_POST['last']);
  $email=mysqli_real_escape_string($conn,$_POST['email']);
  $password=mysqli_real_escape_string($conn,$_POST['pwd']);
  $repwd=mysqli_real_escape_string($conn,$_POST['repwd']);
  $uid=mysqli_real_escape_string($conn,$_POST['uid']);
  $gender=mysqli_real_escape_string($conn,$_POST['gender']);
  $age=mysqli_real_escape_string($conn,$_POST['age']);
  $dob=mysqli_real_escape_string($conn,$_POST['dob']);
  $role=mysqli_real_escape_string($conn,$_POST['role']);
  if(empty($first)||empty($last)||empty($email)||empty($password)||empty($uid)||empty($dob)||empty($role)||empty($age)||empty($gender)){
      header("Location: ../signup.php?signup=empty");
      exit();
  }
  else{
      if(!preg_match("/^[a-zA-Z]*$/",$first)||!preg_match("/^[a-zA-Z]*$/",$last)){
          header("Location: ../signup.php?signup=invalid");
          exit();
      }
      else{
          if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
              header("Location: ../signup.php?signup=invalidemail");
              exit();
          }
          else{
              if($repwd!=$password){
                  header("Location: ../signup.php?signup=passwordsdonotmatch");
                  exit();
              }
              else{
                  $sql="SELECT*FROM users WHERE user_uid='$uid'";
                  $result=mysqli_query($conn,$sql);
                  $resultCheck=mysqli_num_rows($result);
                  if($resultCheck>0){
                      header("Location: ../signup.php?signup=usertaken");
                      exit();
                  }
                  else{
                      $hashedPwd=password_hash($password,PASSWORD_DEFAULT);
                      $sql="INSERT INTO users (user_first,user_last,user_email,user_uid,user_pwd,user_age,user_gender,user_dob,user_role) VALUES ('$first','$last','$email','$uid','$hashedPwd','$age','$gender','$dob','$role');";
                      $result=mysqli_query($conn,$sql);
                      header("Location: ../signup.php?signup=success");
                      exit();
                  }
              }
          }

      }

  }
}
else{
    header("Location: ../signup.php");
    exit();
}