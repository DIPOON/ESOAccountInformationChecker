<?php
    // 클라이언트로부터 데이터 받아서 데이터베이스에 정리해넣는 프로그램
    $fp = fopen("ESOPIcertification.txt", "r") or die("Opening file fails");
    $host = rtrim(fgets($fp), "\r\n");
    $username = rtrim(fgets($fp), "\r\n");
    $password = rtrim(fgets($fp), "\r\n");
    $databasename = rtrim(fgets($fp), "\r\n");
    fclose($fp);

    $conn = mysqli_connect($host, $username, $password, $databasename);

    $filtered = array(
            'ID' => mysqli_real_escape_string($conn, $_POST['ID']),
            'CharacterID' => mysqli_real_escape_string($conn, $_POST['CharacterID']),
            'CharacterName' => mysqli_real_escape_string($conn, $_POST['CharacterName']),
            'UnassignedSkillPoints' => mysqli_real_escape_string($conn, $_POST['UnassignedSkillPoints'])
    );

    echo $filtered['ID'];
    echo $filtered['CharacterID'];
    echo $filtered['CharacterName'];
    echo $filtered['UnassignedSkillPoints'];

    $sql = "INSERT INTO character_information (ID, CharacterID, CharacterName, UnassignedSkillPoints)
            VALUES (
                  '{$filtered['ID']}',
                  '{$filtered['CharacterID']}',
                  '{$filtered['CharacterName']}',
                  '{$filtered['UnassignedSkillPoints']}'
                  )
            ON DUPLICATE KEY
            UPDATE UnassignedSkillPoints = '{$filtered['UnassignedSkillPoints']}'";
    echo $filtered['ID'];
    $result = mysqli_query($conn, $sql);
    echo $result;
    if($result === false) {
        echo error_log(mysqli_error($conn));
    }
    mysqli_close();
?>