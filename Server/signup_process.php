<?php
    $conn=mysqli_connect(host, username, password, databasename);
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO member(ID, PW, CreatedDate)
	    VALUES('{$_POST['id']}', '{$hashed_password}', NOW())";
    $result = mysqli_query($conn, $sql);

    if ($result == false)
    {
        echo "Problem in savings";
    }
    else
    {
        header('Location: index.php');
    }
?>
