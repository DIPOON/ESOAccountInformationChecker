<?php
    $fp = fopen("certification.txt", "r") or die("Opening file fails");
    $host = rtrim(fgets($fp), "\r\n");
    $username = rtrim(fgets($fp), "\r\n");
    $password = rtrim(fgets($fp), "\r\n");
    $databasename = rtrim(fgets($fp), "\r\n");
    fclose($fp);

    $conn = mysqli_connect($host, $username, $password, $databasename);

    $filtered = array(
            'name' => mysqli_real_escape_string($conn, $_POST['name']),
            'rank' => mysqli_real_escape_string($conn, $_POST['rank']),
            'basic' => mysqli_real_escape_string($conn, $_POST['basic']),
            'extra' => mysqli_real_escape_string($conn, $_POST['extra'])
    );

    $sql = "INSERT INTO PayManagement (name, powerrank, basicpay, plus)
          VALUES (
                  '{$filtered['name']}',
                  '{$filtered['rank']}',
                  '{$filtered['basic']}',
                  '{$filtered['extra']}'
                  )";
    $result = mysqli_query($conn, $sql);
    if($result === false) {
        echo error_log(mysqli_error($conn));
    }
    mysqli_close();
?>