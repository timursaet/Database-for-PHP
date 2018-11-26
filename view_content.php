<HTML>
<BODY>
<?php
require_once 'login.php';
    $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if ($connection->connect_error) die($connection->connect_error);

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    }
        $query = "SELECT * FROM employeesN WHERE id='$id'";
        $result = $connection->query($query);
        if (!$result) die("Сбой при доступе к базе данных" . $connection->error);

    $rows = $result->num_rows;

    for($j=0;$j<$rows;++$j)
    {
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        printf("First name: %s<br>\n", $row["first"]);
        printf("Last name: %s<br>\n", $row["last"]);
        printf("Address: %s<br>\n", $row["address"]);
        printf("Position: %s<br>\n", $row["position"]);
    }

    $result->close();
    $connection->close();
?>

</BODY></HTML>
