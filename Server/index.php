<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <title>Elder Scrolls Online Personal Information</title>
</head>
<body>
    <div>
        <h1><a href="index.php">Elder Scrolls Online Personal Information</a></h1>
    </div>
    <div>
        <?php
        if (isset($_SESSION['user_id']))
	{
	    echo "Welcome!";
        ?>
            <li><a href="print.php">Lookup</a></li>
	    <li><a href="logout.php">Logout</a></li>
        <?php
        }
	else
	{
        ?>
        <h2>Login</h2>
        <form action="login.php" method="POST">
          <p><input type="text" name="id" placeholder="ID" required></p>
          <p><input type="password" name="password" placeholder="PW" required></p>
	  <p><input type="submit" value="Login"></p>
	</form>
        <h2>Signup</h2>
        <form action="signup.php" method="POST">
          <p><input type="submit" value="Signup"></p>
        <?php
        }
        ?>
    </div>
    <div>
        <h4>DiPoon</h4>
        <p>E-MAIL : 6129876j@naver.com</p>
    </div>
</body>
</html>
