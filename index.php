<HTML>
<BODY>
<head>
    <meta charset="utf-8" />
    <title>HTML5</title></head>
<?php echo("<p>Привет</p>");
require_once 'login.php';
    $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if ($connection->connect_error) die($connection->connect_error);

    $query = "SELECT * FROM employeesN";
    $result = $connection->query($query);
    if(!$result) die("Сбой при доступе к базе данных".$connection->error);

    $rows = $result->num_rows;

    for($j=0;$j<$rows;++$j)
    {
      $result->data_seek($j);
      $row = $result->fetch_array(MYSQLI_ASSOC);
        printf("<a href=\"view_content.php?id=%s\">%s %s</a><br>\n", $row["id"], $row["first"], $row["last"]);
    }

    $result->close();
    $connection->close();
    ?>

</BODY></HTML>
