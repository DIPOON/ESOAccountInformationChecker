<?php
  // POST 방식으로 넘어온 id와 password를 저장합니다.
  $Username = $_POST['id'];
  $Password = $_POST['password'];
  // 입력이 불충분하면 알려줍니다.
  if (is_null($Username) || is_null($Password))
  {
      echo '<script> alert("아이디와 패스워드를 입력하세요."); </script>';
  }
  else
  {
      echo '<script> alert("안비었네요."); </script>';
      $Connected = mysqli_connect(host, username, password, databasename);
      $PasswordSQL = "SELECT PW FROM member WHERE ID = '".$Username."';";
      $PasswordResult = mysqli_query($Connected, $PasswordSQL);
      //header('location:'.$_SERVER['HTTP_REFERER']);
      while ($Row = mysqli_fetch_array($PasswordResult))
      {
          $EncryptedPassword = $Row['PW'];
      }
      if (is_null($EncryptedPassword))
      {
	      $NoUserID = 1;
	      echo '<script> alert("아이디가 맞는게 없나본대요 ."); </script>';
      }
      else
      {
	  if(password_verify($Password, $EncryptedPassword))
	  {
	      session_start();
	      $_SESSION['user_id'] = $Username;
	      header('Location: index.php');
	  }
          else
	  {
	      $NoPassword = 1;
	      echo '<script> alert("비밀번호 맞는게 없나본대요 ."); </script>';
              //header('Location: index.php');
	  }
      }
  }
?>
