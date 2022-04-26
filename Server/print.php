<?php
    $fp = fopen("ESOPIcertification.txt", "r") or die("Opening file fails");
    $host = rtrim(fgets($fp), "\r\n");
    $username = rtrim(fgets($fp), "\r\n");
    $password = rtrim(fgets($fp), "\r\n");
    $databasename = rtrim(fgets($fp), "\r\n");
    fclose($fp);

    $conn = mysqli_connect($host, $username, $password, $databasename);
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>Elder Scrolls Online Personal Information</title>
</head>
<body>
        <div>
                <h1><a href="index.php">Elder Scrolls Online Personal Information</a></h1>
        </div>
        <div>
                <table>
                        <thead>
                                <tr>
                                        <th>CharacterID</th><th>CharacterName</th><th>GeneralSkillPoints</th>
                                </tr>
                        </thead>
                        <tbody>
                        <?php
                                $sql = "SELECT * FROM character_information";
                                $result = mysqli_query($conn, $sql);
                                while( $row = mysqli_fetch_array($result)) {
                                        $filtered = array(
                                                'CharacterID' => htmlspecialchars($row['CharacterID']),
                                                'CharacterName' => htmlspecialchars($row['CharacterName']),
                                                'UnassignedSkillPoints' => htmlspecialchars($row['UnassignedSkillPoints'])
                                        );
                        ?>
                        <tr>
                                <td><?= $filtered['CharacterID'] ?></td>
                                <td><?= $filtered['CharacterName'] ?></td>
                                <td><?= $filtered['UnassignedSkillPoints'] ?></td>
                        </tr>
                        <?php
                                }
                        ?>
                </table>
        </div>
        <div>
                <h4>DiPoon</h4>
                <p>E-MAIL : 6129876j@naver.com</p>
        </div>
</body>
</html>